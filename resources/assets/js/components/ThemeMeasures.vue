<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="page--title"><span class="theme--head--number">Thema {{ theme.id }}:</span> <span class="theme--head--title">{{ theme.title }}</span></h2>
                <span class="page--clarification">Dit zijn de antwoorden van alle deelnemers</span>
            </div>
        </div>
        <div class="row content--page">
            <div class="col-sm-12 resultstable">
                <div class="row resultstable--row resultstable--row--head">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2" v-for="question in theme.questions"> {{ question.title }} </div>
                </div>
                <div class="row resultstable--row resultstable--row--average">
                    <div class="col-sm-2">Gemiddeld</div>
                    <div class="col-sm-2" v-for="question in theme.questions"> 
                        <div class="resultslider">
                            <div class="resultslider--result"
                                :style="{ width: cssPercent(questionAverage(question.id)) }"
                            >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="measures">
                    <div class="measures--group">
                        <div class="row resultstable--row">
                            <div class="col-sm-2">Actiepunten</div>
                            <div class="col-sm-2" v-for="question in theme.questions">
                                <input type="checkbox" id="checkbox" :checked="isActiveMeasure(question.id)" @click="toggleActiveMeasure(question.id)">
                            </div>
                        </div>
                        <div class="row resultstable--row">
                            <div class="col-sm-2">Aantekeningen</div>
                            <div class="col-sm-2" v-for="question in theme.questions">
                                <textarea  
                                    class="form-control" 
                                    placeholder="Actie Omschrijving"
                                    rows="6"
                                    v-model="store.scan.group.measures[findMeasure(question.id)].measure"
                                    @blur="updateMeasure(store.scan.group.measures[findMeasure(question.id)])"
                                >
                                </textarea>
                            </div>
                        </div>
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
            'theme'
        ],

        data() {
            return {
                store,
                actions: [],
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
                if(typeof this.store.scan.group == 'undefined') {
                    this.store.scan.measures.forEach(function(thismeasure) {
                        if(thismeasure.question_id == questionid) {
                            returnmeasure = thismeasure;
                        }
                    }) 
                } else {
                    this.store.scan.group.measures.forEach(function(thismeasure){
                        if(thismeasure.question_id == questionid) {
                            returnmeasure = home.store.scan.group.measures.indexOf(thismeasure);
                        }
                    })
                }
                return returnmeasure;
            },

            isActiveQuestion: function(questionid) {
                var questionmodulo = ((questionid - 1 ) % 5) + 1;
                if(this.store.scan.activequestion == questionmodulo) {
                    return true;
                }
                return false;
            },

            isActiveMeasure: function (questionid) {
                var active = false;
                if(typeof this.store.scan.group == 'undefined') {
                    this.store.scan.measures.forEach(function(thismeasure){
                        if (thismeasure.question_id == questionid) {
                            active = thismeasure.active;
                        }
                    })
                } else {
                    this.store.scan.group.measures.forEach(function(thismeasure) {
                        if (thismeasure.question_id == questionid) {
                            active = thismeasure.active;
                        }
                    })
                }
                return active;
            },

            toggleActiveMeasure: function (questionid) {
                var home = this;
                if(typeof this.store.scan.group == 'undefined') {
                    this.store.scan.measures.forEach(function(thismeasure) {
                        if (thismeasure.question_id == questionid) {
                            thismeasure.active = ! thismeasure.active; 
                            home.storeMeasure(thismeasure);
                        }
                    })
                } else {
                    this.store.scan.group.measures.forEach(function(thismeasure) {
                        if (thismeasure.question_id == questionid) {
                            thismeasure.active = ! thismeasure.active; 
                            home.storeMeasure(thismeasure); 
                        }
                    })
                }
            },

            updateMeasure: function (thismeasure) {
                console.log(thismeasure)
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

            questionAverage: function(questionid) {
                var totalSum = 0;
                var validAnswers = 0;
                this.store.scan.group.scans.forEach(function(thisscan) {
                    thisscan.answers.forEach(function(thisanswer) {
                        if(thisanswer.question_id == questionid && thisanswer.answer != null) {
                            totalSum += thisanswer.answer;
                            validAnswers ++;
                        }
                    })
                })
                return (totalSum / validAnswers);
            },

            cssPercent: function (value) {
                return value + '%';
            },

        }
    }
</script>
