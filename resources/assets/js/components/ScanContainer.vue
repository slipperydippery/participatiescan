<template>
    <div class="root">
        {{ store.workscan.title }}
        {{ scan }}
        <theme-section
            v-for="theme in scanmodel.themes"
            :theme="theme"
            :key="theme.id"
        >
        </theme-section>

    </div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
            'scan',
            'scanmodel',
        ],

        data() {
            return {
                store,
                answers: [],
            }
        },

        mounted() {
            this.getAnswers();
            store.workscan = this.scan;
        },

        ready() {   
        },

        computed: {

        },

        methods: {
            getAnswers: function() {
                var home = this;
                axios.get('/api/scan/' + home.scan.id + '/answers')
                    .then(function(response){
                        home.answers = response.data;
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },
        }
    }
</script>
