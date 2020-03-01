<template>
   <div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Business Listing
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <router-link class="nav-link" to="/login">Login</router-link>
                            </li>  
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
           <div class="row justify-content-center align-items-center">
               <div class="col-6">
                   <input type="text" class="form-control text-center" 
                                      placeholder="Enter a keyword to serch business listing" 
                                      v-model="keyword"
                                      @keyup.prevent="search" />
               </div>
               <div class="row">
                   <div class="col-6">
                        <button class="btn btn-primary mx-auto" @click.prevent="search">Search</button>
                   </div>
               </div>
           </div>
           <div class="row container justify-content-center" v-if="keyword.length">
               <div class="col pt-3">
                   <div class="card" v-for="res in result" :key="res.id">
                       <div class="p-2">
                            <a href="">{{res.name}}</a>
                            <p>{{res.desc}}</p>
                       </div>
                   </div>
               </div>
           </div>
        </main>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                keyword: '',
                result: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            search(){
                axios.get(`/search/${this.keyword}`)
                    .then( res => {
                        this.result = res.data.data;
                        console.log(res.data)})
            }
        }
    }
</script>


