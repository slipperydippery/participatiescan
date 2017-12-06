<template>
    <div class="introvideo" >
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
                <div class="row resultstable--row" 
                    v-if="typeof store.scan.group !== 'undefined'"
                    v-for="thisscan in store.scan.group.scans"
                >
                    <div class="col-sm-2"> 
                        {{ thisscan.user.name }} <br>        
                        <span class="emphasis">{{ thisscan.instantie.instantiemodel.title }}</span>
                    </div>
                    <div class="col-sm-2 resultslider--container" v-for="question in theme.questions">
                        <div class="resultslider">
                            <div class="resultslider--result"
                                :style="{ width: cssPercent(questionResult(thisscan, question.id)), background: nullColor(thisscan, question.id) }"
                            >
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
            }
        },

        mounted() {
        },

        computed: {

        },

        methods: {
            isActiveQuestion: function(questionid) {
                var questionmodulo = ((questionid - 1 ) % 5) + 1;
                if(this.store.scan.activequestion == questionmodulo) {
                    return true;
                }
                return false;
            },

            questionResult: function(thisscan, questionid) {
                var thisanswer = '-'
                thisscan.answers.forEach(function(answer) {
                    if(answer.question_id == questionid) {
                        thisanswer = answer.answer;
                    }
                })
                return thisanswer;
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

            nullColor: function (thisscan, questionid) {
                var thiscolor = '';
                thisscan.answers.forEach(function(answer) {
                    if(answer.question_id == questionid && answer.answer == null) {
                        thiscolor = 'white';
                    }
                })
                return thiscolor;
            },
        }
    }
</script>
