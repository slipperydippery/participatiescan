<template>
    <div class="scan--container">
        <measure-theme-section
            v-for="theme in scanmodel.themes"
            :theme="theme"
            :groupusers="groupusers"
            :key="theme.id"
            v-if="store.activetheme == theme.id"
        >
        </measure-theme-section>


        <div class="prev-next-nav">
            <a href="#" class="btn prev-next-nav--prev" @click=" previousQuestion ">
                << vorige pagina
            </a>
            <a href="#" class="btn prev-next-nav--next"  @click=" nextQuestion " >
                volgende pagina >>
            </a>
        </div>
        <measure-progress
            :scanmodel="scanmodel"
        >
        </measure-progress>
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
                groupusers: [],
            }
        },

        mounted() {
            store.loggedin = this.loggedin ? true : false;
            store.scan = this.workscan;
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
                if(store.loggedin) {
                    var home = this;
                    axios.get('/api/group/' + groupid)
                        .then(function(response){
                            home.store.group = response.data;
                            home.getGroupUsers(groupid);
                        })
                        .catch(function(error){
                            console.log(error)
                        })
                }
            },

            getGroupUsers: function(groupid) {
                var home = this;
                axios.get('/api/group/' + groupid +'/users')
                    .then(function(response){
                        home.groupusers = response.data;
                    })
                    .catch(function(error){
                        console.log(error)
                    })
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

        }
    }
</script>
