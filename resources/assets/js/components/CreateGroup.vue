<template>
    <div class="group--create">
        <div class="form-group" v-if=" ! isgroup">
            <label for="">Hoe wil je je groep noemen?</label> <br>
            <input type="text" v-model="title" placeholder="Vul hier een title voor je groep in" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Welk soort organisatie vertegenwoordig je zelf tijdens deze scan?</label> <br>
            <select v-model="instantie" class="form-control" placeholder="kies een instantie">
              <option v-for="instantie in instantiemodels" :value="instantie"> {{ instantie.title }} </option>
            </select>
        </div>

        <div class="form-group" v-if=" ! isgroup">
            <label for="">Voor welke gemeentes wordt deze groep gemaakt?</label> <br>
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
                <button @click="saveGroup()" class="btn btn-primary btn--fullwidth">Maak de groep aan</button>
            </div>
        </div>
            
    </div>


</template>

<script>

    export default {


        props: [
            'instantiemodels',
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

            saveGroup: function() {
                var home = this;
                axios.post('/api/group', {
                    title: this.title,
                    instantie: this.instantie,
                    districts: this.selecteddistricts,
                })
            },

        }
    }
</script>
