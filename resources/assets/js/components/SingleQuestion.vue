<template>
    <div class="question">
        <div class="">
            <h3 class="question--head"><span class="question--head--number">Vraag {{ (question.id - 1 ) % 5 + 1 }}:</span> <span class="question--head--title">{{ question.title }}</span></h3>
        </div>
        <div class="">
            <p>{{ question.body }}</p>
        </div>
        <div class="">
            <input type="range" 
                min="0" max="100"
                v-if="store.scan.answers "
                v-model="store.scan.answers[question.id - 1].answer" 
                v-on:change="onChange"
            >
            <span class="question--answer" v-if=" store.scan.answers[question.id - 1].answer " >{{ store.scan.answers[question.id - 1].answer }}</span>
            <span class="question--answer" v-else >-</span>
        </div>
        <div class="">
            <button class=" nextquestion " @click=" nextQuestion " >Volgende vraag:</button>
        </div>
    </div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
            'question'
        ],

        data() {
            return {
                store,
            }
        },

        mounted() {
            // this.onChange();
        },

        computed: {
        },

        methods: {
            onChange: function () {
                var home = this;
                axios.post('/api/answer/' + home.question.id, {
                    answer: store.scan.answers[home.question.id - 1]
                })
                .then(response => {})
                .catch(e => {
                    home.errors.push(e)
                })
            },

            nextQuestion: function () {
                this.store.scan.activequestion ++;
                axios.post('/api/scan/' + this.store.scan.id, {
                    scan: store.scan
                })
                .then( response =>{} )
                .catch( e => {
                    this.errors.push( e )
                } )
            },
        }
    }
</script>

<style>

</style> 