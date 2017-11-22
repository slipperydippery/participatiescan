<template>
    <div class="scan--progress">
        <div class="row">
            <div class="col-sm-4 progress--theme" v-for="theme in scanmodel.themes" :class="'themecolor-' +theme.id">
                <div class="progress--question" 
                    v-for="question in theme.questions" 
                    :class=" { questioncomplete: store.scan.answers[question.id - 1].answer } "
                    :title=" question.title "
                >
                </div>
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

        }
    }
</script>

<style>
</style>