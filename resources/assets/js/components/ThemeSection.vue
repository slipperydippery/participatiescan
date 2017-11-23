<template>
    <div class="scan--theme">
        <div class="row">
            <h2 class="theme--head"><span class="theme--head--number">Thema {{ theme.id }}:</span> <span class="theme--head--title">{{ theme.title }}</span></h2>
        </div>
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
