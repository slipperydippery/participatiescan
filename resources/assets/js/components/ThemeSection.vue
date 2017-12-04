<template>
    <div class="scan--theme">   
        <single-question
            v-for="question in theme.questions"
            :question="question"
            :key="question.id"
            :theme="theme"
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
