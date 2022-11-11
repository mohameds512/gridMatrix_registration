<template>
    <div>
        <header-vue></header-vue>
        <router-view/>
    </div>
</template>
<script>
import axios from 'axios';
import headerVue from './layouts/header.vue';
import { mapGetters } from 'vuex';

export default {
    components:{
        headerVue
    },
    created(){
        axios.get('users')
        .then(response=>{
            let success = response.data.success
            let user = response.data.user
            this.$store.dispatch('user',user)
            this.$store.dispatch('success',success)
        })
        .catch(err=>{
            console.log(err)
            this.$store.dispatch('user',null)
            this.$store.dispatch('success',0)
        })
    },
    computed:{
        ...mapGetters(['user']),
        ...mapGetters(['success']),
    },
}
</script>
