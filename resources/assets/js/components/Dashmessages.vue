<template>
    <div class="dashmessages">
        <div v-for="message in dashmessages" class="row dashmessage">
            <div class="col-sm-12 ">
                <span class="dashmessage--delete" @click="deleteMessage(message)">x</span>
                <span class="dashmessage--message" v-html="message.message" title="verwijder bericht">
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'user'
        ],

        data() {
            return {
                dashmessages: [],
            }
        },

        mounted() {
            this.getDashmessages();
        },

        methods: {  
            getDashmessages: function() {
                var home = this;
                axios.get('/api/dashmessage/user/' + home.user.id)
                    .then(function(response){
                        home.dashmessages = response.data;
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            },

            deleteMessage: function(message) {
                var home = this;
                axios.delete('/api/dashmessage/' + message.id)
                    .then(function(response){
                        home.dashmessages.splice(home.dashmessages.indexOf(message), 1);
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            }
        },
    }
</script>
