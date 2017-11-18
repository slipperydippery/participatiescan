<template>
    <div class="theme">
        <h2>{{ theme.title }}</h2>
        <input type="text" v-model="scan.title">
        <single-question
            v-for="question in theme.questions"
            :question="question"
            :key="question.id"
        >
        </single-question>
    </div>

</template>

<script>
    export default {
        props: [
            'scan',
            'theme'
        ],

        data() {
            return {
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
