
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message', require('./components/message.vue'));

const app = new Vue({
    el: '#chatting',

    data:{
        message: '',
        chat:{
            message:[]
        }

    },

    methods:{
        send(){
        	if(this.message.length != 0){
                this.chat.message.push(this.message);

                axios.post('/user/chat/send', {
                    message: this.message
                })
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.log(error);
                    });

                  this.message= '';
        	}
        }
    },

    mounted(){
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
              this.chat.message.push(e.message);

        });
    }

});
