<template>
	<section class="infoblock">
		<div class="row">   
			<div class="col-sm-12 clickable" > 
				<h4>Vergelijk scans met {{ scan.title }} </h4>
			</div>
		</div>
		<div class="row" >   
			<div class="col-sm-12"> 
				<div class="row row--table" v-for="scan in scan.compares">
					<div class="col-sm-3"> <span class="emphasis">{{ scan.user.name }}</span> </div>
					<div class="col-sm-3"> {{ scan.user.email }} </div>
					<div class="col-sm-3"> {{ scan.instantie.title }} </div>
					<div class="col-sm-2"> {{ answerCount(scan) }}/15 </div>
					<div class="col-sm-1"> 
						<span class="clickable accept" @click=" confirm(scan) ">&#10004;</span>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<h4 @click="activateCompare" class="clickable">+ voeg een scan toe aan je vergelijking</h4>
				<div class="addcompare" v-if="addcompareactive">
					<select v-model="districtfilter"  @change="filterScans">
						<option value="">--filter hier op gemeente--</option>
						<option v-for="district in districts" :value="district"> {{ district.title }} </option>
					</select>
					<div class="row row--table" v-for="scan in filteredscans">
						<div class="col-sm-3"> <span class="emphasis">{{ scan.user.name }}</span> </div>
						<div class="col-sm-3"> <span v-for="district in scan.districts"> {{ district.title }} </span></div>
						<div class="col-sm-3"> {{ scan.instantie.title }} </div>
						<div class="col-sm-2"> {{ answerCount(scan) }}/15 </div>
						<div class="col-sm-1"> 
							<span class="clickable warning" @click=" addCompare(scan) " >&#10006;</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12" v-if="scan.compares.length">
				<a :href="'/scan/' + scan.id + '/results'" class="btn">Start vergelijking</a>
			</div>
			<div class="confirm--container" v-if="confirmremovecomparebox" v-on-click-outside="cancelremovecompare"> 
				<div class="confirm">
					<p>Weet je zeker dat je <strong>{{ confirmscan.user.name }}</strong> uit de vergelijking wilt verwijderen?</p>
					<button @click="confirmremovecompare">Ja</button>
					<button @click="cancelremovecompare" class="btn--delete">Nee</button>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	import { mixin as onClickOutside } from 'vue-on-click-outside';

	export default {
		mixins: [onClickOutside],

		props: [
			'scan',
			'allscans',
			'districts'
		],
		data() {
			return {
				active: false,
				addcompareactive: false,
				confirmremovecomparebox: false,
				districtfilter: "",
				filteredscans: [],
				confirmscan: {},
			}
		},

		mounted() {
		},

		computed: {
		},

		methods: {
			activateCompare: function() {
				this.filteredscans =  this.allscans.slice();
				this.active = ! this.active;
				this.addcompareactive = ! this.addcompareactive;
				this.filterScans();
			},

			addCompare: function (scan) {
				this.scan.compares.push(scan);
				this.filteredscans.splice(this.filteredscans.indexOf(scan), 1);
				var home = this;
				axios.post('/api/compares', {
						scan: home.scan,
						compare: scan
					})
					.then(function(response){

					})
					.catch(function(error){
						console.log(error);
					})
			},

			confirm: function (scan) {
				this.confirmscan = scan;
				this.confirmremovecomparebox = true;
			},

			cancelremovecompare: function() {
				this.confirmscan = {};
				this.confirmremovecomparebox = false;
			},

			confirmremovecompare: function () {
				var home = this;
				this.scan.compares.splice(this.scan.compares.indexOf(home.confirmscan), 1);
				this.filteredscans.push(home.confirmscan);
				axios.get('/api/compare/' + home.confirmscan.id + '/scan/' + home.scan.id)
					.then(function(response){
					})
					.catch(function(error){
						console.log(error);
					})
				this.confirmremovecomparebox = false;  
			},

			filterScans: function () {
				var home = this;
				home.filteredscans = [];
				if(home.districtfilter == ""){
					home.filteredscans =  home.allscans.slice();
				} else {
					home.allscans.filter(function (scan) {
						scan.districts.forEach(function(district){
							if(district.id == home.districtfilter.id)
							{
								home.filteredscans.push(scan);
							}
						})
					})
				}
				home.filteredscans.forEach(function(scan){
					if(scan.id == home.scan.id) {
						home.filteredscans.splice(home.filteredscans.indexOf(scan), 1);
					}
				})
				home.filteredscans.forEach(function(scan){
					home.scan.compares.forEach(function(compares){
						if(scan.id == compares.id) {
							home.filteredscans.splice(home.filteredscans.indexOf(scan), 1);
						}
					})
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
		}
	}
</script>
