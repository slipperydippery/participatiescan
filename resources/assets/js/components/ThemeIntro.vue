<template>
    <div class="introvideo" >
        <div class="row">
            <div class="col-sm-12">
                <h2 class="page--title"><span class="theme--head--number">Thema {{ theme.id }}:</span> <span class="theme--head--title">{{ theme.title }}</span></h2>
                <span class="page--clarification">Bekijk de introductiefilm over "Thema {{ theme.id }}: {{ theme.title }}" of ga direct door naar de vragen.</span>
            </div>
        </div>
        <div class="row content--page">
                <div class="col-sm-8 col-sm-offset-2">
                    <video  
                        id="my-video" 
                        class="video-js vjs-big-play-centered" 
                        controls
                        poster="/img/movie-thin-white.svg" 
                        data-setup="{}"
                    > 

                    <source :src="'/videos/thema_' + theme.id + '.mp4'" type="video/mp4" />

                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                    </video>
                </div>
        </div>
    </div>

</template>

let videojs = require('video.js');

<script>
    import videojs from "video.js" ; 
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
