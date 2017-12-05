<template>
    <div class="scan--theme">   
        <theme-intro
            v-if="store.scan.activequestion == 0"
            :theme="theme"
        >
        </theme-intro>

        <theme-results
            v-if="store.scan.activequestion == 6"    
            :theme="theme"
        >
        </theme-results>

        <single-question
            v-for="question in theme.questions"
            :question="question"
            :key="question.id"
            :theme="theme"
            v-if="store.scan.answers && isActiveQuestion(question.id)"
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
            isActiveQuestion: function(questionid) {
                var questionmodulo = ((questionid - 1 ) % 5) + 1;
                if(this.store.scan.activequestion == questionmodulo) {
                    return true;
                }
                return false;
            }
        }
    }
</script>
