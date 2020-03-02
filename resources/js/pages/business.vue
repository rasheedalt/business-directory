<template>
 <Layout>
       <!-- cards -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div v-if="success" class="text-center pt-5 mt-5">
                   <p class="alert alert-success">Added Successfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </p>
                </div>

                <div class="row pt-md-5 mt-md-3 mb-5">
                    <div class="col-10 p-1">
                        <div class="card card-common">
                            <div class="card-body"> 
                                <div class="d-flex justify-content-center">
                                        <div class="text-left text-secondary">
                                            <h5>{{business.name}}</h5>
                                            <p>{{business.address}}</p>
                                            <p>{{business.email}}</p>
                                            <p>{{business.phone}}</p>
                                            <p><span v-if="business.active == 1" class="btn btn-success">Active</span>
                                            <span v-else class="btn btn-danger"> Inactive </span></p>
                                            <p><b>Categories</b></p>

                                            <p>
                                                <button v-if="business.active == 0"  class="btn btn-success" @click.prevent="toggleActive(business.active+1)">Activate</button>
                                            <button v-else class="btn btn-danger" @click.prevent="toggleActive(business.active-1)"> Deactivate </button></p>
                                            <p><b>Categories</b></p>
                                            <p>
                                                <ul v-for="bus in business.category" :key="bus.id">
                                                    <li >
                                                        {{bus.name}}
                                                    </li>
                                                </ul>
                                            </p>
                                        </div>
                                </div>
                            
                            <div class="pt-3" >
                                <h4 class=""> Add Category</h4>
                                <select class="form-control-md" placeholder="Select Category to Add" v-model="selectedCategory" >
                                        <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{cat.name}}</option>
                                </select>
                                    <button @click.prevent='addCategory' class="btn btn-success">Add</button>
                            </div>
                            </div>


                            <div class="card-footer">
                                <i class="fa fa-eye fa-2x mr-3"></i>
                                <span> {{business.view}} </span>
                                <span class="ml-3">
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of card -->

</Layout>
</template>

<script>


export default {
    data(){
        return {
            business: '',
            categories: '',
            selectedCategory: '',
            id: this.$route.params.id,
            success: false

        }
    },
    mounted(){
        this.getBusiness();

        axios.get(`/category`)
            .then( res => { 
                this.categories = res.data.data;
            })   
    },
    methods:{
        addCategory(){
            axios.post('/business/addCategory', { business: this.id,
                                                category: this.selectedCategory})
                .then( res => {
                    if(res.data.status == 'success'){
                        this.success = true
                    }
                })
        this.getBusiness();
        },
        getBusiness(){
             axios.get(`/business/${this.id}`)
            .then( res => { 
                this.business = res.data.data;
            })  
        },
        toggleActive(present){
            var stat = present
             axios.post(`/business/toggle-active`, { id: this.id, status: stat })
            .then( res => { 
                this.business = res.data.data;
            })  
            this.getBusiness();
        }
    }
}
</script>
<style scoped>
    .raleway{
        font-family: 'Raleway', sans-serif;
    }

</style>