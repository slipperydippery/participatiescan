<template>
    <div class="scan--container">
        <theme-section
            v-for="theme in scanmodel.themes"
            :theme="theme"
            :key="theme.id"
            v-if="store.activetheme == theme.id"
        >
        </theme-section>

        <div class="confirm--container" v-if=" finished">
            <div class="confirm">
                <button class="alert topright" @click="finished = false">&#10006;</button>
                <span class="page--clarification">
                    Dank je voor het uitvoeren van de testscan!
                </span> <br>
                <p>Met een account kun je jouw scanresultaten opslaan en vergelijken met een groep of andere deelnemers aan de scan.</p>
                <button @click="goRegister">Maak een account aan</button>
                <button @click="goHome">Terug naar de homepagina</button>
            </div>
        </div>

        <div class="prev-next-nav">
            <a href="#" class="btn prev-next-nav--prev" @click=" previousQuestion ">
                << vorige pagina
            </a>
            <a href="#" class="btn prev-next-nav--next"  @click=" nextQuestion " >
                volgende pagina >>
            </a>
        </div>
        <scan-progress
            :scanmodel="scanmodel"
            :workscan="workscan"
            :page="'show'"
        >
        </scan-progress>
    </div>

</template>

<script>
    import {store} from '../app.js';

    export default {


        props: [
            'workscan',
            'scanmodel',
            'loggedin'
        ],

        data() {
            return {
                store,
                answers: [],
                finished: false,
            }
        },

        mounted() {
            this.getAnswers();
            store.scan = this.workscan;
            store.loggedin = this.loggedin ? true : false;
            if(store.scan.group_id) {
                store.isgroup = true;
                this.getGroup(this.workscan.group_id);
            }
            this.$on('getscan', function(value){
                this.getScan();
            });
            this.$on('storescan', function(value){
                this.storeScan();
            });
            this.$on('getanswers', function(value){
                this.getAnswers();
            });
            this.$on('getgroup', function(value){
                this.getGroup(store.group.id);
            });
        },

        ready() {   
        },

        computed: {
        },

        methods: {
            getScan: function() {
                if(store.loggedin) {
                    var home = this;
                    axios.get('/api/scan/' + home.workscan.id )
                        .then(function(response){
                            console.log('getting scan');
                            store.scan = response.data;
                        })
                        .catch(function(error){
                            console.log(error)
                        })
                }
            },

            getAnswers: function() {
                var home = this;
                axios.get('/api/scan/' + home.workscan.id + '/answers')
                    .then(function(response){
                        home.answers = response.data;
                        console.log('getting answers');
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },

            getGroup: function(groupid) {
                if(store.loggedin) {
                    var home = this;
                    axios.get('/api/group/' + groupid)
                        .then(function(response){
                            store.group = response.data;
                            console.log('getting group');
                        })
                        .catch(function(error){
                            console.log(error)
                        })
                }
            },

            getCompares: function(groupid) {
                if(store.loggedin) {
                    var home = this;
                    axios.get('/api/compare/scan/' + groupid)
                        .then(function(response){
                            store.compares = response.data;
                        })
                        .catch(function(error){
                            console.log(error)
                        })
                }
            },

            nextQuestion: function () {
                if(store.activequestion < 7) {
                    store.activequestion ++;
                    if(store.activequestion == 6) {
                        this.getScan();
                    }
                } else if (store.activetheme == 3) {
                    if(! store.loggedin) {
                        this.finished = true;
                    } else {
                        window.location.href = '/scan/' +  store.scan.id + '/showmeasures';
                    }
                } else {
                    store.activequestion = 0;
                    store.activetheme ++;
                }
                this.storeScan();
            },

            previousQuestion: function () {
                if(store.activequestion > 0) {
                    store.activequestion --;
                } else if (store.activetheme > 1) {
                    store.activetheme --;
                    store.activequestion = 7;
                } else {
                    window.location.href = '/scan/' + store.scan.id + '/algemeenbeeldresultaten';
                }
                this.storeScan();
            },

            storeScan: function() {
                if(store.loggedin) {
                    axios.post('/api/scan/' + store.scan.id, {
                        scan: store.scan
                    })
                    .then( response => {
                        this.getScan();
                    } )
                    .catch( e => {
                        this.errors.push( e )
                    })
                }
            },

            goRegister: function() {
                window.location.href = '/register';
            },

            goHome: function() {
                window.location.href = '/';
            }

        }
    }
</script>
