<template>
	<div class="groupmanager">  
		<div class="row page--head">
			<div class="col-sm-12">
				<h2>Hier kan je een scan vergelijken </h2>
				<p class=" "></p>

			</div>
		</div>
		<div class="row content--page">   
			<div class="col-sm-12">
				<comparescan 
					:scan="scan"
					:allscans="allscans"
					:districts="districts"
					v-for="scan in scans"	
					:key="scan.id"
				>
				</comparescan>
				
			</div>
		</div>
	</div>
</template>

<script>
	import { mixin as onClickOutside } from 'vue-on-click-outside';

	export default {
		mixins: [onClickOutside],

		props: [
			'user',
			'districts'
		],
		data() {
			return {
				scans: [],
				allscans: [],
			}
		},

		mounted() {
			this.getScans();
			this.getAllScans();
		},

		computed: {
		},

		methods: {
			getScans: function() {
				var home = this;
				axios.get('/api/scan/user/' + home.user.id)
					.then(function(response){
						home.scans = response.data;
					})
					.catch(function(error){
						console.log(error)
					})
			},

			getAllScans: function () {
				var home = this;
				axios.get('/api/scan')
					.then(function(response){
						home.allscans = response.data;
					})
					.catch(function(error){
						console.log(error);
					})
			}
		}
	}
</script>
