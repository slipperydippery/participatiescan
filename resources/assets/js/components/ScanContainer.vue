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
            store.loggedin = this.loggedin ? this.loggedin : false;
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
            this.$on('updateHintsModal', function(value){
                this.updateHintsModal();
            })
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
                    if(store.activequestion >= 6) {
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
                this.updateHintsModal();
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
                this.updateHintsModal();
            },

            updateHintsModal: function () {
                console.log('updating hints');
                var showsModalHints = store.loggedin ? store.loggedin.hints : true;
                if(store.activequestion == 1) {
                    store.hintsmodal.active = showsModalHints;
                    store.hintsmodal.messages = [
                        'Als je een vraag hebt ingevuld, zie je dat in het menu onderin. Via het menu onderin kun je ook versneld door de scan bladeren.',
                        'Je kunt altijd direct naar je dashboard via het icoon bovenin. Als je tussentijds stop worden je vragen opgeslagen.'
                    ];
                } else if (store.activequestion == 6 ) {
                    store.hintsmodal.active = showsModalHints;
                    store.hintsmodal.messages = [
                        'Dit zijn de scores van de deelnemers. Bespreek met elkaar wat Bespreek met elkaar wat er uit springt en/of overe welke onderwerpen sterk van mening wordt verschilt.  In het volgende scherm kunnen de belangrijkste twee of drie verbeterpunten worden benoemd.'
                    ];
                } else if (store.activequestion == 7) {
                    store.hintsmodal.active = showsModalHints;
                    store.hintsmodal.messages = [
                        'Licht hier eventueel toe wat de concrete analyse of actie is, waartoe door de deelnemers aan de sessie is besloten. Deze komen verderop automatisch terug in de concept verbeteragenda.'
                    ];
                }
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
