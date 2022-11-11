<template>
    <div class="container">
        <div>
            <h1>profile</h1>
            <div class="register_form row">
            <div class="col">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <h5>{{user.name}}</h5>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <h5>{{user.email}}</h5>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                        <h5>{{user.gender}}</h5>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-10">
                        <h5>{{user.mobile}}</h5>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Certificates</label>
                    <div class="col-sm-10">
                        <div v-for="cert in de_certs(user.certs)" :key="cert.id">
                            <h5 >{{cert.name}}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Languages </label>
                    <div class="col-sm-10">
                        <div v-for="lang in de_langs(user.languages)" :key="lang.id">
                            <h5 >{{lang.name}}</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>

import { mapGetters } from 'vuex';

export default {
    data(){
        return{
            countries:{},
            cities:{},
            languages:{},
            certificates:{},
            userCity:'',
            userCountry:'',
        }
    },
    methods:{


        getCerts(){
            axios.get('/api/certs')
            .then(response=>{
                this.certificates = response.data
            })
        },
        de_certs(certs){
            return JSON.parse(certs)
        },
        de_langs(langs){
            return JSON.parse(langs)
        },
    },
    computed:{
        ...mapGetters(['user']),
        ...mapGetters(['success']),
    }
}
</script>
<style scoped>
    .register_form{
        margin: auto;
        margin-top: 30px;
    }
    .reg_div{
        margin: auto;
    }
    button{
        width: fit-content;
        margin: auto;
    }
</style>
