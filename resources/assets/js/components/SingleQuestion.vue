<template>
    <div class="question">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="page--title"><span class="theme--head--number">Thema {{ theme.id }}:</span> <span class="theme--head--title">{{ theme.title }}</span></h2>
                <span class="page--clarification"><span class="">Vraag {{ (question.id - 1 ) % 5 + 1 }}:</span> <span class="highlight">{{ question.title }}</span></span>
            </div>
        </div>
        <div class="">
            <p>{{ question.body }}</p>
        </div>
        <div class="rangeslider--container">
            <input type="range" 
                min="0" max="100"
                v-if="store.scan.answers "
                v-model="store.scan.answers[question.id - 1].answer" 
                v-on:change="onChange"
            >
            <span class="question--answer" v-if=" store.scan.answers[question.id - 1].answer " >{{ store.scan.answers[question.id - 1].answer }}</span>
            <span class="question--answer" v-else >-</span>
        </div>
    </div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
            'question',
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
            onChange: function () {
                if(store.loggedin) {
                    var home = this;
                    axios.post('/api/answer/' + home.question.id, {
                        answer: store.scan.answers[home.question.id - 1]
                    })
                    .then(response => {})
                    .catch(e => {
                        home.errors.push(e)
                    })
                }
            },
        }
    }
</script>

<style>

</style> 