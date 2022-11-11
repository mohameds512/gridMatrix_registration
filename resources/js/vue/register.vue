<template>
    <div class="container">
        <div class="register_form row">
            <div class="col">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" v-model="FormData.name">
                            <!-- <div v-if="errors.name.length > 0 ">
                                <h5><span class="badge bg-danger">{{errors.name[0]}}</span></h5>
                            </div> -->
                    </div>

                </div>

                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                        <select  class="form-control" v-model="FormData.gender" name="gender" >
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                        <select v-model="FormData.country_id" @change="getCities()" class="form-control" name="country" id="country">
                            <option  v-for="country in countries" :key="country.id" :value="country.id">{{country.name}} </option>
                        </select>

                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">language</label>

                    <div class="col-sm-10">
                        <multiselect
                            v-model="FormData.languages"
                            :multiple="true"
                            track-by="id"
                            label="name"
                            :options="languages">
                        </multiselect>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" v-model="FormData.password" id="inputPassword">

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email"  class="form-control" id="staticEmail" v-model="FormData.email" placeholder="email@example.com">
                        <!-- <div v-if="errors.email.length > 0 ">
                            <h5><span class="badge bg-danger">{{errors.email[0]}}</span></h5>
                        </div> -->
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Mobile </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" v-model="FormData.mobile" >
                        <!-- <div v-if="errors.mobile.length > 0 ">
                            <h5><span class="badge bg-danger">{{errors.mobile[0]}}</span></h5>
                        </div> -->
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">city</label>
                    <div class="col-sm-10">
                        <select v-model="FormData.city_id" @change="getCities()" class="form-control" name="city" id="city">
                            <option  v-for="city in cities" :key="city.id" :value="city.id">{{city.name}} </option>
                        </select>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Certificates</label>
                    <div class="col-sm-10">
                        <multiselect
                            v-model="FormData.certs"
                            :multiple="true"
                            track-by="id"
                            label="name"
                            :options="certificates">
                        </multiselect>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" v-model="FormData.password_confirmation" id="password_confirmation">
                    </div>
                </div>
            </div>
            <div class="mb-3 row reg_div">
                <button @click="register()" type="button" class="btn btn-success log_btn">Register</button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import Multiselect from 'vue-multiselect'
import router from '../router/index'
export default {
    data(){
        return{
            FormData:{
                name:'',
                email:'',
                gender:'',
                country_id:'',
                city_id:'',
                mobile:'',
                languages:'',
                certs:'',
                password:'',
                password_confirmation:'',
            },
            countries:{},
            cities:{},
            languages:{},
            certificates:{},
            errors:{
                name:'',
                email:'',
                password:'',
                mobile:'',
            }
        }
    },
    methods:{
        register(){
            console.log(this.FormData)
            axios.post('/api/store',this.FormData)
            .then(response=>{
                let success = response.data.success
                let user = response.data.user
                let token = response.data.token

                localStorage.setItem('token',token)
                localStorage.setItem('success',success)


                this.$store.dispatch('user',user)
                this.$store.dispatch('success',success)
                
                toast.fire({
                    icon:'info',
                    title:'Welcome '
                })
                router.push({name:'profile'});
            })
            .catch(err=>{
                this.errors = err.response.data.errors;
            })
        },
        getCities(){
            axios.get('/api/cities/'+this.FormData.country_id)
            .then(response=>(
                this.cities = response.data
                ))
            .catch(err=>{
                console.log(err);
            })
        },
        getCountries(){
            axios.get('/api/countries')
            .then(response=>{
                this.countries = response.data
            })
            .catch(err=>{
                console.log(err);
            })
        },
        getLanguages(){
            axios.get('/api/languages')
            .then(response=>{
                this.languages = response.data
            })
            .catch(err=>{
                console.log(err);
            })
        },
        getCerts(){
            axios.get('/api/certs')
            .then(response=>{
                this.certificates = response.data
            })
        }
    },
    created (){
        this.getCountries();
        this.getLanguages();
        this.getCerts();
    },
    components:{
        Multiselect,
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
