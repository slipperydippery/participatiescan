<template>
    <div class="root">
        <h1> {{ scan.title }} </h1>

        <theme-section
            v-for="theme in scanmodel.themes"
            :theme="theme"
            :key="theme.id"
            :scan="scan"
        >
        </theme-section>

        <div class="" v-for="answer in answers">
            {{ answer.id }}
        </div>

    </div>

</template>

<script>
    export default {
        props: [
            'scan',
            'scanmodel'
        ],

        data() {
            return {
                answers: []
            }
        },

        mounted() {
            this.getAnswers();
        },

        computed: {

        },

        methods: {
            getAnswers: function() {
                var home = this;
                axios.get('/api/scan/' + home.scan.id + '/answers')
                    .then(function(response){
                        home.answers = response.data;
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },
        }
    }
</script>
