import './bootstrap';

import { createApp } from 'vue';
import App from './vue/app.vue';
import router from './router/index'

import { createStore } from 'vuex'

import Swal from 'sweetalert2/dist/sweetalert2'
import 'sweetalert2/dist/sweetalert2.css'

window.Swal = Swal;
const toast = Swal.mixin({
    toast:true,
    position:'top-end',
    showConfirmButton:false,
    timer:3000,
    timerProgressBar:true,
})
window.toast=toast;

const store = createStore({
    state: {
        user: null ,
        success: 0
    },
    getters:{
        user:(state)=>{
            return state.user
        },
        success:(state)=>{
            return state.success
        }
    },
    actions:{
        user(context,user){
            context.commit('user',user)
        },
        success(context,success){
            context.commit('success',success)
        }
    },
    mutations: {
        user(state,user){
            state.user = user
        },
        success(state,success){
            state.success = success
        }
    }
});

const app=createApp(App);
app.use(router).use(store);
app.mount('#app');
