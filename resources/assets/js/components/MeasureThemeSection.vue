<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="page--title"><span class="theme--head--number">Thema {{ theme.id }}:</span> <span class="theme--head--title">{{ theme.title }}</span></h2>
                <span class="page--clarification" v-if="store.isgroup && store.loggedin">Selecteer de belangrijkste verbeterpunten, en noteer de belangrijkste opmerkingen uit het gesprek. Deze verbeterpunten kunnen aan het eind van de scan nader worden uitgewerkt.</span>
                <span class="page--clarification" v-if=" ! store.isgroup && store.loggedin">Selecteer de belangrijkste verbeterpunten, en noteer jouw belangrijkste ideeen daarbij. Deze verbeterpunten kunnen aan het eind van de scan nader worden uitgewerkt.</span>
                <span class="page--clarification" v-if="! store.isgroup && ! store.loggedin">Selecteer de belangrijkste verbeterpunten, en noteer jouw belangrijkste ideeen daarbij. Deze verbeterpunten kunnen aan het eind van de scan nader worden uitgewerkt.</span>
            </div>
        </div>
        <div class="row content--page">
            <single-measure
                v-for="question in theme.questions" v-if="isActiveMeasure(question.id)"
                :measure="findMeasure(question.id)"
                :question="question"
                :groupusers="groupusers"
                :key="question.id"    
            >
            </single-measure>
            
        </div>
    </div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
            'theme',
            'groupusers'
        ],

        data() {
            return {
                store,
                actions: [],
            }
        },

        mounted() {
            this.$on('getgroup', function(value){
                this.$parent.$emit('getgroup', 'test');
            });
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

            isActiveMeasure: function (questionid) {
                var active = false;
                if( ! store.isgroup) {
                    if(store.scan.measures){
                        this.store.scan.measures.forEach(function(thismeasure){
                            if (thismeasure.question_id == questionid) {
                                active = thismeasure.active;
                            }
                        })
                    }
                } else {
                    if(store.group.measures){
                        this.store.group.measures.forEach(function(thismeasure) {
                            if (thismeasure.question_id == questionid) {
                                active = thismeasure.active;
                            }
                        })
                    }
                }
                return active;
            },


        }
    }
</script>
