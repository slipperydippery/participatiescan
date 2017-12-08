<template>
    <div class="row">
        <div class="col-sm-12 page--head">
            <h2 v-if=" ! titleedit " @click=" titleedit = ! titleedit " class="hidden--container">{{ group.title }} <img src="/img/editicon.svg" alt="" class="icon icon--edit hidden--item"></h2>
            <input type="text" v-else v-model="group.title" @keyup.enter=" toggleTitle " v-on-click-outside=" toggleTitle ">
            <h3>Dit is het overzicht van je groep</h3>
        </div>
        <div class="col-sm-12">
            <p v-if="district.districtmodel != 'null'">{{ district.districtmodel.title }}</p>
            <h4>mensen die aan je group meedoen:</h4>
                <div class="row row--table" v-for="scan in group.scans">
                    <div class="col-sm-3"> {{ scan.user.name }} </div>
                    <div class="col-sm-3"> {{ scan.user.email }} </div>
                    <div class="col-sm-3"> {{ scan.instantie.instantiemodel.title }} </div>
                    <div class="col-sm-2"> {{ answerCount(scan) }}/15 </div>
                    <div class="col-sm-1"> 
                        <span class="clickable" @click=" confirm(scan) ">X</span>
                    </div>
                </div>
                <div class="confirm--container" v-if="confirmdeletebox"> 
                    <div class="confirm" v-on-click-outside=" canceldelete ">
                        <p>Weet je zeker dat je <strong>{{ confirmscan.user.name }}</strong> uit de groep wilt verwijderen?</p>
                        <button @click="confirmdelete">Ja</button>
                        <button @click="canceldelete">Nee</button>
                    </div>
                </div>

            <h4 v-if="group.grouprequests.length">mensen die aan je groep willen meedoen: </h4>
            <div class="row row--table" v-for="grouprequest in group.grouprequests">
                <div class="col-sm-3">
                    {{ grouprequest.scan.user.name }}
                </div>
                <div class="col-sm-7">
                    {{ grouprequest.scan.user.email }}
                </div>
                <div class="col-sm-1">
                    <span class="clickable accept" @click="acceptGrouprequest(grouprequest)">accepteren</span>
                </div>
                <div class="col-sm-1">
                    <span class="clickable deny" @click="denyGrouprequest(grouprequest)">verwijderen</span>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mixin as onClickOutside } from 'vue-on-click-outside';

    export default {
        mixins: [onClickOutside],

        props: [
            'workgroup',
        ],
        data() {
            return {
                titleedit: false,
                confirmdeletebox: false,
                confirmscan: {},
                group: { grouprequests: [] },
                scans: [],
                grouprequests: [],
                district: { districtmodel: null }
            }
        },

        mounted() {
            this.getGroup();
        },

        computed: {
        },

        methods: {
            toggleTitle: function () {
                if(this.titleedit) {
                    this.updateGroup();
                }
                this.titleedit = ! this.titleedit;
            },

            updateGroup: function () {   
                var home = this;
                axios.patch('/api/group/' + this.group.id, {
                        group: home.group
                    })
                    .then( response =>{} )
                    .catch( e => {
                        this.errors.push( e )
                } )
            },

            getGroup: function () {
                var home = this;
                axios.get('/api/group/' + home.workgroup.id )
                    .then(function(response){
                        home.group = response.data;
                        home.getDistrict();
                    })
                    .catch(function(error){
                        console.log(error);
                    })
            },

            getDistrict: function() {
                var home = this;
                axios.get('/api/group/' + home.workgroup.id + '/getdistrict')
                    .then(function(response){
                        home.district = response.data;
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },

            acceptGrouprequest: function (grouprequest) {
                var home = this;
                // home.group.scans.push(grouprequest.scan);
                axios.get('/api/grouprequest/' + grouprequest.id + '/accept')
                    .then(function(response){
                        home.group.grouprequests.splice(home.group.grouprequests.indexOf(grouprequest), 1);
                        home.getGroup();
                    })
                    .catch(function(error){
                        console.log(error);
                    })
            },

            denyGrouprequest: function (grouprequest) {
                var home = this;    
                axios.get('/api/grouprequest/' + grouprequest.id + '/deny')
                    .then(function(response){
                        home.group.grouprequests.splice(home.group.grouprequests.indexOf(grouprequest), 1);
                    })
                    .catch(function(error){
                        console.log(error);
                    })
            },

            answerCount: function (scan) {
                var answercount = 0;
                scan.answers.forEach(function(answer){
                    if(answer.answer != null){
                        answercount ++;
                    }
                });
                return answercount;
            },

            confirm: function (scan) {
                this.confirmscan = scan;
                this.confirmdeletebox = true;
            },

            canceldelete: function() {
                this.confirmscan = {};
                this.confirmdeletebox = false;
            },

            confirmdelete: function () {
                var home = this;
                home.group.scans.splice(home.group.scans.indexOf(home.confirmscan), 1);
                axios.get('/api/group/' + this.group.id + '/removescan/' + this.confirmscan.id)
                    .then(function(response){
                    })
                    .catch(function(error){
                        console.log(error);
                    })
                this.confirmdeletebox = false;  
            },
        }
    }
</script>
