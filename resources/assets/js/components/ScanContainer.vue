<template>
    <div class="scan--container">
        <div class="row">
            <div class="col-sm-12">
                <span class="breadcrumb">Arbeidsregio...</span>
                <h1 class="section--title" v-if="typeof store.scan.group !== 'undefined'"> {{ store.scan.group.title }} </h1>                    
                <h1 class="section--title" v-else> {{ store.scan.title }} </h1>                    
            </div>
        </div>

        <theme-section
            v-for="theme in scanmodel.themes"
            :theme="theme"
            :key="theme.id"
            v-if="store.scan.activetheme == theme.id"
        >
        </theme-section>

        <scan-progress
            :scanmodel="scanmodel"
        >
        </scan-progress>

        <div class="prev-next-nav">
            <a href="#" class="btn prev-next-nav--prev" @click=" previousQuestion ">
                << vorige pagina
            </a>
            <a href="#" class="btn prev-next-nav--next"  @click=" nextQuestion " >
                volgende pagina >>
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
            this.$on('updatescan', function(value){
                this.getScan();
            });
            this.$on('storescan', function(value){
                this.storeScan();
            });
        },

        ready() {   
        },

        computed: {
        },

        methods: {
            getScan: function() {
                var home = this;
                axios.get('/api/scan/' + home.workscan.id )
                    .then(function(response){
                        store.scan = response.data;
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },

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

            nextQuestion: function () {
                if(this.store.scan.activequestion < 6) {
                    this.store.scan.activequestion ++;
                    if(this.store.scan.activequestion == 6) {
                        this.getScan();
                    }
                } else if (this.store.scan.activetheme == 3) {
                } else {
                    this.store.scan.activequestion = 0;
                    this.store.scan.activetheme ++;
                }
                this.storeScan();
            },

            previousQuestion: function () {
                if(this.store.scan.activequestion > 0) {
                    this.store.scan.activequestion --;
                } else if (this.store.scan.activetheme > 1) {
                    this.store.scan.activetheme --;
                    this.store.scan.activequestion = 6;
                } else {
                    window.location.href = '/scan/2/algemeenbeeldresultaten';
                }
                this.storeScan();
            },

            storeScan: function() {
                axios.post('/api/scan/' + this.store.scan.id, {
                    scan: store.scan
                })
                .then( response => {
                    this.getScan();
                } )
                .catch( e => {
                    this.errors.push( e )
                })
            }
        }
    }
</script>
