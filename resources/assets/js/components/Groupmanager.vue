<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 page--head">
                <h2 v-if=" ! titleedit " @click=" toggleTitle ">{{ group.title }}</h2>
                <input type="text" v-else v-model="group.title" @keyup.enter=" toggleTitle " v-on-click-outside=" toggleTitle ">
                <h3>Dit is het overzicht van je groep</h3>
            </div>
            <div class="col-sm-12">
                <p>postcode arbeidsregio</p>
                <h4>mensen die aan je group meedoen:</h4>
                <div class="" v-for="scan in group.scans" @click="scan.user.echo = 'testerino'">
                    {{ scan.user.name }}
                </div>
                <p>Hallo, waarom nodig je geen mensen uit?</p>
            </div>
        </div>
    </div>
</template>

<script>
    import { mixin as onClickOutside } from 'vue-on-click-outside'

    export default {
        mixins: [onClickOutside],

        props: [
            'workgroup',
        ],
        data() {
            return {
                titleedit: false,
                group: {},
                scans: []
            }
        },

        mounted() {
            this.getGroup()
        },

        methods: {
            toggleTitle: function () {
                this.titleedit = ! this.titleedit;
            },

            getGroup: function () {
                var home = this;
                axios.get('/api/group/' + home.workgroup.id + '/show')
                    .then(function(response){
                        console.log(response.data);
                        home.group = response.data;
                        // console.log(home.group);
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },

            getUsers: function () {
                this.workscans.forEach(function(scan) {
                    axios.get('/api/scan/' + scan.id + '/user')
                        .then(function(response){
                            scan.user = response.data;
                        })
                        .catch(function(error){
                        })
                });
                this.scans = this.workscans;
            },
        }
    }
</script>
