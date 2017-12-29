<template>
	<div class="hintsmodal" v-if="store.hintsmodal.active" @click.self="store.hintsmodal.active = false">
		<div class="hintscontainer infoblock">
			<a href="#" class="close" @click="active = false">
				X
			</a>
			<h4>Hints</h4>
			<ul>
				<li class="hint" v-for="message in store.hintsmodal.messages">
					{{ message }}
				</li>
				
			</ul>
			<div class="nomorehints clearfix" v-if="store.hintsmodal.loggedin">
				<span class="btn btn--small right" @click="noMoreHints()">Hints uitzetten</span>
			</div>
			
		</div>
	</div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'active',
        	'messages',
        	'loggedin'
        ],

        data() {
            return {
		        store,
            }
        },

        mounted() {
        	store.hintsmodal.active = this.active;
        	store.hintsmodal.loggedin = this.loggedin;
        	store.hintsmodal.messages = this.messages.slice(0);
        },

        ready() {   
        },

        computed: {
        },

        methods: {
        	noMoreHints: function() {
        		var home = this;
        		axios.get('/api/user/' + home.loggedin.id + '/nomorehints')
        			.then(function(response){
        				home.active = false;
        			})
        			.catch(function(error){
        				console.log(error)
        			})
        	}


        }
    }
</script>