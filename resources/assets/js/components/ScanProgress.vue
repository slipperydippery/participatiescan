<template>
    <div class="scan--progress row">
        <div class="col-sm-4 " v-for="theme in scanmodel.themes" :class="'themecolor-' +theme.id">
            <div class="row">
                <div class="col-sm-12 progress--themetitle" @click="gotoTheme(theme.id)">
                    <span> {{ theme.title }} </span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 progress--theme">
                    <div class="progress--question" 
                        v-for="question in theme.questions" 
                        :class=" { questioncomplete: store.scan.answers[question.id - 1].answer, active: isActiveQuestion(question.id) } "
                        :id=" 'progressquestion_' + question.id "
                        :style=" { background: colorvalue(store.scan.answers[question.id - 1].answer) } "
                        :title=" question.title "
                        @click=" gotoQuestion(question.id) "
                    >
                    </div>
                    <div class="progress--results" @click=" gotoThemeResults(theme.id) ">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="449.192px" height="362.45px" viewBox="0 0 449.192 362.45" enable-background="new 0 0 449.192 362.45"
                             xml:space="preserve"
                             :class="{activeresult: isActiveResult(theme.id)}"
                        >
                            <g>
                                <path fill="#FFFFFF" d="M445.885,64.035l-53.38,53.38l-37.899,37.9l-203.83,203.82c-4.42,4.42-11.581,4.42-16,0
                                    l-52.71-52.721l-78.75-78.75c-4.42-4.41-4.42-11.58,0-16l44.68-44.68c4.42-4.42,11.59-4.42,16,0l70.75,70.75
                                    c4.42,4.41,11.59,4.41,16,0l234.42-234.42c4.42-4.42,11.58-4.42,16,0l44.72,44.72C450.295,52.445,450.295,59.615,445.885,64.035z"
                                    />
                            </g>
                        </svg>
                    </div>
                    <div class="progress--results" @click=" gotoThemeMeasures(theme.id) ">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="70.318px" height="101.108px" viewBox="0 0 70.318 101.108" enable-background="new 0 0 70.318 101.108"
                             xml:space="preserve">
                        <path fill="#FFFFFF" d="M60.803,25.412c4.543-7.851,1.853-17.931-5.996-22.474l-1.264-0.73c-7.849-4.541-17.93-1.85-22.471,5.998
                            l-4.393,7.59l-0.003-0.002L0,61.895l0.027,34.461L29.74,79.092L60.803,25.412z M36.828,11.538c2.707-4.674,8.71-6.277,13.385-3.572
                            l1.264,0.73c4.672,2.705,6.275,8.709,3.569,13.383l-3.662,6.33L33.167,17.868L36.828,11.538z M13.992,80.549L6.663,76.31
                            l-0.01-12.384l18.011,10.423L13.992,80.549z M7.974,61.398l21.129-36.515l18.222,10.542l-21.13,36.516L7.974,61.398z M0.027,96.356
                            H0v4.752h70.318v-4.752H0.027z"/>
                        </svg>
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
            'scanmodel'
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
                this.store.scan.activetheme = Math.ceil(questionid / 5);
                this.store.scan.activequestion = (questionid - 1) % 5 + 1;
                this.$parent.$emit('storescan', 'test');
            },

            gotoTheme: function (themeid) {
                this.store.scan.activequestion = 0;
                this.store.scan.activetheme = themeid;
                this.$parent.$emit('storescan', 'test');
            },

            gotoThemeResults: function (themeid) {
                this.store.scan.activequestion = 6;
                this.store.scan.activetheme = themeid;
                this.$parent.$emit('storescan', 'test');
            },

            gotoThemeMeasures: function (themeid) {
                this.store.scan.activequestion = 7;
                this.store.scan.activetheme = themeid;
                this.$parent.$emit('storescan', 'test');
            },

            isActiveQuestion: function(questionid) {
                var thememodulo = Math.ceil(questionid / 5);
                var questionmodulo = ((questionid - 1 ) % 5) + 1;
                if(this.store.scan.activequestion == questionmodulo && this.store.scan.activetheme == thememodulo) {
                    return true;
                }
                return false;
            },

            isActiveResult: function (themeid) {
                return (this.store.scan.activetheme == themeid && this.store.scan.activequestion == 6) ? true : false;
            }
        }
    }
</script>

<style>

</style>