<template>
    <div class="theme">
        <h2>{{ theme.title }}</h2>
        <h4> {{ store.workscan.title }} </h4>
        <input type="text" v-model="store.workscan.title">
        <single-question
            v-for="question in theme.questions"
            :question="question"
            :key="question.id"
        >
        </single-question>
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

        }
    }
</script>
