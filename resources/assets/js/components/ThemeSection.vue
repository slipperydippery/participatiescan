<template>
    <div class="scan--theme row">
        <h2>{{ theme.title }}</h2>
        <single-question
            v-for="question in theme.questions"
            :question="question"
            :key="question.id"
            v-if="store.scan.answers && store.scan.activequestion == question.id"
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
