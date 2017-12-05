<template>
    <div class="rangeslider--container" >
        <input type="range" 
            min="0" max="100"
            v-model="scan.algemeenbeeld" 
            v-on:change="onChange"
        >
        <span class="question--answer">{{ scan.algemeenbeeld }}</span>
    </div>
</template>

<script>
    export default {
        props: [
            'workscan'
        ],

        data() {
            return {
                scan: {}
            }
        },

        mounted() {
            this.scan = this.workscan;
        },

        computed: {
        },

        methods: {
            onChange: function () {
                var home = this;
                    axios.post('/api/scan/' + this.scan.id, {
                            scan: home.scan
                        })
                        .then( response =>{} )
                        .catch( e => {
                            home.errors.push( e )
                    } )   
            },
        }
    }
</script>

<style>

</style> 