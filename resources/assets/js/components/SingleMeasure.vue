<template>
    <div class="col-sm-12 resultstable">
        <div class="row resultstable--row resultstable--row--head">
            <div class="col-sm-12" > {{ question.title }} </div>
        </div>
        <div class="measures">
            <div class="measures--group">
                <div class="row resultstable--row">
                    <div class="col-sm-2">Actiepunten</div>
                    <div class="col-sm-10">
                        <textarea  
                            v-if="store.isgroup && store.group.measures"
                            class="form-control" 
                            placeholder="Actie Omschrijving"
                            rows="6"
                            v-model="store.group.measures[findMeasure(question.id)].measure"
                            @blur="updateMeasure(store.group.measures[findMeasure(question.id)])"
                        >
                        </textarea>
                        <textarea  
                            v-else
                            class="form-control" 
                            placeholder="Actie Omschrijving"
                            rows="6"
                            v-model="store.scan.measures[findMeasure(question.id)].measure"
                            @blur="updateMeasure(store.scan.measures[findMeasure(question.id)])"
                        >
                        </textarea>
                    </div>
                </div>
                <div class="row resultstable--row" v-if="store.isgroup">
                    <div class="col-sm-2">
                        Betrokkenen
                    </div>
                    <div class="col-sm-10">
                        <span v-for="user in groupusers"> {{ user.name }} </span>         
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
            'question',
            'groupusers',
            'measure'
        ],

        data() {
            return {
                store,
                actions: [],
                activeusers: [],
            }
        },

        mounted() {
        },

        computed: {

        },

        methods: {
            findMeasure: function(questionid) {
                var returnmeasure = {};
                var home = this;
                if( ! store.isgroup) {
                    this.store.scan.measures.forEach(function(thismeasure) {
                        if(thismeasure.question_id == questionid) {
                            returnmeasure = store.scan.measures.indexOf(thismeasure);
                        }
                    }) 
                } else {
                    this.store.group.measures.forEach(function(thismeasure){
                        if(thismeasure.question_id == questionid) {
                            returnmeasure = home.store.group.measures.indexOf(thismeasure);
                        }
                    })
                }
                return returnmeasure;
            },

            updateMeasure: function (thismeasure) {
                axios.patch('/api/measure/' + thismeasure.id, {
                    measure: thismeasure
                    })
                    .then(function(response){

                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            },

            storeMeasure: function (measure) {
                var home = this;
                axios.patch('/api/measure/' + measure.id, {
                    measure: measure
                })
                .then(function(response) {

                })
                .catch(function(error) {
                    console.log(error)
                })
            },



        }
    }
</script>
