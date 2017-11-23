<template>
    <div class="scan--progress row">
        <div class="col-sm-4 progress--theme" v-for="theme in scanmodel.themes" :class="'themecolor-' +theme.id">
            <div class="progress--question" 
                v-for="question in theme.questions" 
                :class=" { questioncomplete: store.scan.answers[question.id - 1].answer, active: store.scan.activequestion == question.id } "
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
            }
        },

        mounted() {
        },

        computed: {
        },

        methods: {
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