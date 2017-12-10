<template>
	<div class="groupmanager">  
		<div class="row page--head">
			<div class="col-sm-12">
				<h2 v-if=" ! titleedit " @click=" titleedit = ! titleedit " class="hidden--container clickable">{{ group.title }} <img src="/img/editicon.svg" alt="" class="icon icon--edit hidden--item"></h2>
				<input type="text" v-else v-model="group.title" @keyup.enter=" toggleTitle " v-on-click-outside=" toggleTitle ">
				<p v-if="district.districtmodel != null && ! districtedit" @click=" districtedit = ! districtedit " class="hidden--container clickable"><span>arbeidsmarktregio: </span>{{ district.districtmodel.title }} <img src="/img/editicon.svg" alt="" class="icon icon--edit hidden--item"></p>
				<select v-else v-model="selecteddistrict" @blur=" districtedit = ! districtedit " @change="updateDistrict">
					<option v-for="district in districtmodels" :value="district"> {{ district.title }} </option>
				</select>
			</div>
			<div class="col-sm-12"> 
				<h3>Jij bent beheerder van deze groepsscan. Hieronder zie je een overzicht van alle deelnemers die aan jouw scan meedoen. </h3>
			</div>
		</div>
		<div class="row content--page">   
			<div class="col-sm-12">
				<section class="infoblock">
					<div class="row">   
						<div class="col-sm-12"> 
							<h4>mensen die aan je groep meedoen:</h4>
						</div>
					</div>
					<div class="row">   
						<div class="col-sm-12"> 
							<div class="row row--table" v-for="scan in group.scans">
								<div class="col-sm-3"> <span class="emphasis">{{ scan.user.name }}</span> </div>
								<div class="col-sm-3"> {{ scan.user.email }} </div>
								<div class="col-sm-3"> {{ scan.instantie.instantiemodel.title }} </div>
								<div class="col-sm-2"> {{ answerCount(scan) }}/15 </div>
								<div class="col-sm-1"> 
									<span class="clickable warning" @click=" confirm(scan) " v-if="group.owner.id != scan.id">X</span>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="infoblock"> 
					<div class="row">  
						<div class="col-sm-12"> 
							<h4 v-if="grouprequests.length">mensen die aan je groep willen meedoen: </h4>
						</div>
					</div>        
					<div class="row">   
						<div class="col-sm-12"> 
							<div class="row row--table" v-for="grouprequest in grouprequests">
								<div class="col-sm-3">
									{{ grouprequest.scan.user.name }}
								</div>
								<div class="col-sm-3">
									{{ grouprequest.scan.user.email }}
								</div>
								<div class="col-sm-4">
									{{ grouprequest.scan.instantie.instantiemodel.title }}
								</div>
								<div class="col-sm-1">
									<span class="clickable accept" @click="acceptGrouprequest(grouprequest)">accepteren</span>
								</div>
								<div class="col-sm-1">
									<span class="clickable deny" @click="denyGrouprequest(grouprequest)">verwijderen</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a :href="'/scan/' + group.owner.id" class="btn">Start scan</a>
				<a href="#" class="btn btn--delete" @click="deletegroup">X <span class="hovershow">verwijder deze group</span></a>
			</div>
			<div class="confirm--container" v-if="confirmdeleteuserbox" v-on-click-outside="canceldeleteuser"> 
				<div class="confirm">
					<p>Weet je zeker dat je <strong>{{ confirmscan.user.name }}</strong> uit de groep wilt verwijderen?</p>
					<button @click="confirmdeleteuser">Ja</button>
					<button @click="canceldeleteuser" class="btn--delete">Nee</button>
				</div>
			</div>
			<div class="confirm--container" v-if="confirmdeletegroupbox" v-on-click-outside="canceldeletegroup"> 
				<div class="confirm">
					<p>Weet je zeker dat je je groep {{ group.title }} wilt verwijderen?</p>
					<button @click="confirmdeletegroup">Ja</button>
					<button @click="canceldeletegroup">Nee</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { mixin as onClickOutside } from 'vue-on-click-outside';

	export default {
		mixins: [onClickOutside],

		props: [
			'workgroup',
			'districtmodels',
		],
		data() {
			return {
				titleedit: false,
				districtedit: false,
				confirmdeleteuserbox: false,
				confirmdeletegroupbox: false,
				confirmscan: {},
				group: { owner: {} },
				grouprequests: [],
				scans: [],
				district: { districtmodel: null },
				selecteddistrict: {},
			}
		},

		mounted() {
			this.getGroup();
			this.getGrouprequests();
		},

		computed: {
		},

		methods: {
			toggleTitle: function () {
				if(this.titleedit) {
					this.updateGroup();
				}
				this.titleedit = ! this.titleedit;
			},

			updateDistrict: function () {
				var home = this;

				axios.patch('/api/district/' + this.group.district.id, {
						district: home.selecteddistrict
					})
					.then(function(response){
						home.getGroup();
					})
					.catch(function(error){
						console.log(error)
					})

			},

			updateGroup: function () {   
				var home = this;
				axios.patch('/api/group/' + this.group.id, {
						group: home.group
					})
					.then( response =>{} )
					.catch( e => {
						this.errors.push( e )
				} )
			},

			getGroup: function () {
				var home = this;
				axios.get('/api/group/' + home.workgroup.id )
					.then(function(response){
						home.group = response.data;
						home.getDistrict();
					})
					.catch(function(error){
						console.log(error);
					})
			},

			getGrouprequests: function () {
				var home = this;
				axios.get('/api/grouprequest/' + home.workgroup.id)
					.then(function(response){
						home.grouprequests = response.data;
					})
					.catch(function(error){
						console.log(error)
					})
			},

			getDistrict: function() {
				var home = this;
				axios.get('/api/group/' + home.workgroup.id + '/getdistrict')
					.then(function(response){
						home.district = response.data;
					})
					.catch(function(error){
						console.log(error)
					})
			},

			acceptGrouprequest: function (grouprequest) {
				var home = this;
				// home.group.scans.push(grouprequest.scan);
				axios.get('/api/grouprequest/' + grouprequest.id + '/accept')
					.then(function(response){
						home.grouprequests.splice(home.grouprequests.indexOf(grouprequest), 1);
						home.getGroup();
					})
					.catch(function(error){
						console.log(error);
					})
			},

			denyGrouprequest: function (grouprequest) {
				var home = this;    
				axios.get('/api/grouprequest/' + grouprequest.id + '/deny')
					.then(function(response){
						home.grouprequests.splice(home.grouprequests.indexOf(grouprequest), 1);
					})
					.catch(function(error){
						console.log(error);
					})
			},

			answerCount: function (scan) {
				var answercount = 0;
				scan.answers.forEach(function(answer){
					if(answer.answer != null){
						answercount ++;
					}
				});
				return answercount;
			},

			deletegroup: function() {
				this.confirmdeletegroupbox = true;
			},

			canceldeletegroup: function() {
				this.confirmdeletegroupbox = false;
			},

			confirmdeletegroup: function () {
				window.location.href = '/group/' + this.group.id + '/delete';
			},

			confirm: function (scan) {
				this.confirmscan = scan;
				this.confirmdeleteuserbox = true;
			},

			canceldeleteuser: function() {
				this.confirmscan = {};
				this.confirmdeleteuserbox = false;
			},

			confirmdeleteuser: function () {
				var home = this;
				home.group.scans.splice(home.group.scans.indexOf(home.confirmscan), 1);
				axios.get('/api/group/' + this.group.id + '/removescan/' + this.confirmscan.id)
					.then(function(response){
					})
					.catch(function(error){
						console.log(error);
					})
				this.confirmdeleteuserbox = false;  
			},
		}
	}
</script>
