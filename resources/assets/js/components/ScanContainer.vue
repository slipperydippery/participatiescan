<template>
    <div class="root">
        <h1>{{ store.scan.title }}</h1>
        <scan-progress
            :scanmodel="scanmodel"
        >
        </scan-progress>

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
            'workscan',
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
            store.scan = this.workscan;
        },

        ready() {   
        },

        computed: {

        },

        methods: {
            getAnswers: function() {
                var home = this;
                axios.get('/api/scan/' + home.workscan.id + '/answers')
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
