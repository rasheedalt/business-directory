<template>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-7">
        <div class="card mt-5">
            <div class="card-body">
                <div class="card-title text-center">
                   <i class="fa fa-lock"></i> LOGIN
                </div>
            
            <div v-if="error" class="text-danger" >Incorrect Details</div>
            <div v-if="input" class="text-danger" >All Fields are required</div>

            <form @submit.prevent="login">
            <div class="form-group">
                <label for="email">Email</label>
                 <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span><i class="fa fa-user"></i></span></span>
                        </div>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" v-model="auth.email" >
                 </div>
                 
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span><i class="fa fa-star"></i></span></span>
                        </div>
                <input type="password" id="password" name="password" class="form-control "  placeholder="Password" v-model="auth.password" >
                </div>
                
            </div>  
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            </div>
        </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Login',
    data(){
        return{
            auth:{
                email: null,
                password: null
                },
            error: false,
            input: false
        }    },
    methods:{ 
           login(){
       
               this.getAuth()
        },
         getAuth(){
             
             axios.post(`/auth/login`, {email: this.auth.email, password: this.auth.password})
                                .then( res => {
                                    if(res.data.status == 'success'){
                                        localStorage.setItem('auth', JSON.stringify(res.data.data))
                                        this.$router.replace({name: 'dashboard'})
                                    }else{
                                        this.error = true
                                    }
                                    console.log(res.data.status)})
            // const res = await axios.post(`/auth/login`, {email: this.auth.email, password: this.auth.password})
            //        if(res){
            //             localStorage.setItem('auth', JSON.stringify(res.data.data))
            //             var set = JSON.parse(localStorage.getItem('auth'))
            //             this.$router.replace({name: 'dashboard'})
            //             // console.log(res.data)
            //        }else{
            //             this.error = true
            //             this.input = false
            //        }    
        }
    }
}
</script>

<style scoped >

</style>