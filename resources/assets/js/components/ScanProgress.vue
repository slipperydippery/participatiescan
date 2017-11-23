<template>
    <div class="scan--progress row">
        <div class="col-sm-4 progress--theme" v-for="theme in scanmodel.themes" :class="'themecolor-' +theme.id">
            <div class="progress--question" 
                v-for="question in theme.questions" 
                :class=" { questioncomplete: store.scan.answers[question.id - 1].answer, active: store.scan.activequestion == question.id } "
                :id=" 'progressquestion_' + question.id "
                :style=" { background: colorvalue(store.scan.answers[question.id - 1].answer) } "
                :title=" question.title "
                @click=" gotoQuestion(question.id) "
            >
            </div>
        </div>
    </div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
            'scanmodel'
        ],

        data() {
            return {
                store,
                // colorvalue: '#d8d8d8',
            }
        },

        mounted() {
        },

        computed: {
        },

        methods: {
            colorvalue: function (value) {
                if(value == null){ return '#f1f1f1' }
                if(value < 50) {
                    var green = value * 5;
                    var blue = value * 5;
                    var red = 250;
                } else {
                    var green =  250;
                    var red = (50 - (value - 50)) * 5;
                    var blue = (50 - (value - 50)) * 5;
                }
                var color = 'rgba(' + red + ',' + green + ',' + blue + ',1)';
                return color;
            },

            gotoQuestion: function(questionid) {
                this.store.scan.activequestion = questionid;
                axios.post('/api/scan/' + this.store.scan.id, {
                    scan: store.scan
                })
                .then( response => {} )
                .catch( e => {
                    this.errors.push( e )
                } )
            }
        }
    }
</script>

<style>

</style>