import {createRouter , createWebHistory } from 'vue-router'
import profile from '../vue/profile.vue'
import register from '../vue/register.vue'
import notFound from '../vue/notFound.vue'
import index from '../vue/index.vue'
const routes = [
    {
        path:'/',
        name:'index',
        component:index,
    },
    {
        path:'/prof',
        name:'profile',
        component: profile,
        beforeEnter:(to,form,next)=>{
            let isAuth = localStorage.getItem('success')
            if (isAuth != 1) next({
                name:'register'
            })
            else next()
        }
    },
    {
        path:'/reg',
        name:'register',
        component:register,
    },
    {
        path:'/:pathMatch(.*)',
        name:notFound,
        component:notFound
    },
]
const router = createRouter({
    history:createWebHistory(),
    routes
})

export default router
