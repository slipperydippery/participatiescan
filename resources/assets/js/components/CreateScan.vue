<template>
    <div class="scan--create">
        <div class="form-group">
            <label for="">Wil je je scan aan een groep koppelen?</label> <br>
            <input type="checkbox" v-model="isgroup">
        </div>

        <div class="form-group" v-if="isgroup">
            <label for="">Aan welke groep wil je je scan koppelen</label> <br>
            <select v-model="instantie" class="form-control" placeholder="kies een instantie">
              <option selected="selectedgroup" disabled value="">Kies een groep</option>
              <option v-for="grouop in groups"> {{ group.title }} </option>
            </select>
        </div>

        <div class="form-group" v-if=" ! isgroup">
            <label for="">Hoe wil je je scan noemen?</label> <br>
            <input type="text" v-model="title" placeholder="Vul hier een title voor je scan in" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Welk soort organisatie vertegenwoordig je?</label> <br>
            <select v-model="instantie" class="form-control" placeholder="kies een instantie">
              <option v-for="instantie in instantiemodels" :value="instantie"> {{ instantie.title }} </option>
            </select>
        </div>

        <div class="form-group" v-if=" ! isgroup">
            <label for="">Voor welke gemeentes?</label> <br>
            <input type="text" v-model="districtsearch" class="form-control" placeholder="Zoek je gemeente">
            <div class="row resultstable--row" v-if="! isgroup">
                <div class="col-sm-12">
                    <div class="infoblock" v-if="selecteddistricts.length || districtsearch != '' ">
                        <span v-if=" ! selecteddistricts.length">Klik op een gemeente om het aan je lijst toe te voegen</span>
                        <span v-if=" selecteddistricts.length ">Je kan meer dan meer dan 1 gemeente kiezen</span> <br>
                        <span
                            v-for="district in selecteddistricts"
                            @click="removeDistrictFromSelection(district)"
                            class="clickable selectable selectable--active"    
                        >
                            {{ district.title }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="row resultstable--row" v-if="! isgroup">
                <div class="col-sm-12">
                    <span 
                        v-for="district in filteredAndSortedDistricts" 
                        @click="addDistrictToSelection(district)"
                        class="clickable selectable selectable--passive"
                    > 
                        {{ district.title }} 
                    </span>
                </div>
            </div>
        </div>
        <div class="row resultstable--row">
            <div class="col-sm-12">
                <button @click="saveScan()" class="btn btn-primary btn--fullwidth">Save scan</button>
            </div>
        </div>
            
    </div>


</template>

<script>

    export default {


        props: [
            'instantiemodels',
            'groups',
            'alldistricts'
        ],

        data() {
            return {
                isgroup: false,
                selectedgroup: {},
                title: '',
                instantie: {},
                selecteddistricts: [],
                districtsearch: '',
            }
        },

        mounted() {
        },

        ready() {   
        },

        computed: {
            filtereddistricts: function () {
                var filteredarray = [];
                var home = this;
                if(home.districtsearch != ''){
                    this.alldistricts.forEach(function(thisdistrict){
                        if(thisdistrict.title.toLowerCase().includes(home.districtsearch.toLowerCase())) {
                            filteredarray.push(thisdistrict);
                        } 
                    })
                }
                return filteredarray;
            },

            filteredAndSortedDistricts: function() {
                function compare(a, b) {
                    if (a.title < b.title){
                        return -1;
                    }
                    if (a.title > b.title){
                        return 1;
                    }
                    return 0;
                }

                return this.filtereddistricts.sort(compare);
            }
        },

        methods: {
            sortDistricts: function(thisarray) {
                function compare(a, b) {
                    if (a.title < b.title){
                        return -1;
                    }
                    if (a.title > b.title){
                        return 1;
                    }
                    return 0;
                }
                return thisarray.sort(compare);
            },

            addDistrictToSelection: function(thisdistrict) {
                this.selecteddistricts.push(thisdistrict);
                this.sortDistricts(this.selecteddistricts);
                this.alldistricts.splice(this.alldistricts.indexOf(thisdistrict), 1);
                this.filtereddistricts.splice(this.filtereddistricts.indexOf(thisdistrict), 1);
                this.$forceUpdate();
            },

            removeDistrictFromSelection: function(thisdistrict) {
                this.alldistricts.push(thisdistrict);
                this.filtereddistricts.push(thisdistrict);
                this.sortDistricts(this.filtereddistricts); 
                this.selecteddistricts.splice(this.selecteddistricts.indexOf(thisdistrict), 1);
                this.$forceUpdate();
            },

            saveScan: function() {
                var home = this;
                axios.post('/api/scan', {
                    isgroup: this.isgroup,
                    selectedgroup: this.selectedgroup,
                    title: this.title,
                    instantie: this.instantie,
                    districts: this.selecteddistricts,
                })
            },

        }
    }
</script>
