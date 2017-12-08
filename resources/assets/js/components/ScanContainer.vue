<template>
    <div class="scan--container">
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
            'loggedin'
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
            store.loggedin = this.loggedin ? true : false;
            if(store.scan.group_id) {
                console.log( store.scan.group_id);
                store.isgroup = true;
                this.getGroup(this.workscan.group_id);
            }
            this.$on('getscan', function(value){
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
                if(store.loggedin) {
                    var home = this;
                    axios.get('/api/scan/' + home.workscan.id )
                        .then(function(response){
                            home.store.scan = response.data;
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
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },

            getGroup: function(groupid) {
                console.log('getting group');
                var home = this;
                axios.get('/api/group/' + groupid)
                    .then(function(response){
                        home.store.group = response.data;
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },

            nextQuestion: function () {
                if(store.scan.activequestion < 7) {
                    store.scan.activequestion ++;
                    if(store.scan.activequestion == 6) {
                        this.getScan();
                    }
                } else if (store.scan.activetheme == 3) {
                } else {
                    store.scan.activequestion = 0;
                    store.scan.activetheme ++;
                }
                this.storeScan();
            },

            previousQuestion: function () {
                if(store.scan.activequestion > 0) {
                    store.scan.activequestion --;
                } else if (store.scan.activetheme > 1) {
                    store.scan.activetheme --;
                    store.scan.activequestion = 7;
                } else {
                    window.location.href = '/scan/2/algemeenbeeldresultaten';
                }
                this.storeScan();
            },

            storeScan: function() {
                console.log('storing scan...');
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
        }
    }
</script>
