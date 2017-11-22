<template>
    <div class="question">
        <h3>{{ question.title }}</h3>
        <p>{{ question.body }}</p>
        <input type="range" 
            min="0" max="10"
            v-if="store.scan.answers "
            v-model="store.scan.answers[question.id - 1].answer" 
        >
        <span class="question--answer" v-if=" store.scan.answers[question.id - 1].answer " >{{ store.scan.answers[question.id - 1].answer }}</span>
        <span class="question--answer" v-else >-</span>
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
        },

        computed: {
        },

        methods: {

        }
    }
</script>

<style>
    .question--answer {
        display: inline-block;
        margin: 0 auto;
        font-size: 2rem;
    }
</style>