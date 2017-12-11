<template>
    <div class="introvideo" >
        <div class="row">
            <div class="col-sm-12">
                <h2 class="page--title"><span class="theme--head--number">Thema {{ theme.id }}:</span> <span class="theme--head--title">{{ theme.title }}</span></h2>
                <span class="page--clarification">Bekijk de introductiefilm over "Thema {{ theme.id }}: {{ theme.title }}" of ga direct door naar de vragen.</span>
            </div>
        </div>
        <div class="row content--page">
            <div class="col-sm-12">
                <img src="/img/movie.svg" alt="">
            </div>
        </div>
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
