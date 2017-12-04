<template>
    <div class="scan--container">
        <div class="row">
            <div class="col-sm-12">
                <span class="breadcrumb">Arbeidsregio...</span>
                <h1 class="section--title" v-if="store.scan.group_id"> {{ store.scan.group.title }} </h1>                    
                <h1 class="section--title" v-else> {{ store.scan.title }} </h1>                    
            </div>
        </div>

        <theme-section
            v-for="theme in scanmodel.themes"
            :theme="theme"
            :key="theme.id"
            v-if=" Math.ceil(store.scan.activequestion / 5) == theme.id "
        >
        </theme-section>

        <scan-progress
            :scanmodel="scanmodel"
        >
        </scan-progress>

        <div class="prev-next-nav">

            <a href="#" class="btn prev-next-nav--prev">
                << vorige scherm
            </a>
            <a href=" # " class="btn prev-next-nav--next">
                volgende scherm >>
            </a>
        </div>
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
