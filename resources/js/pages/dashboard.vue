<template>
 <Layout>
       <!-- cards -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row pt-md-5 mt-md-3 mb-5">
                    <div class="col-sm-6 col-xl-3  p-2">
                        <div class="card card-common">
                            <div class="card-body"> 
                                <div class="d-flex justify-content-between">
                                        <i class="fa fa-shopping-cart fa-3x text-warning"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Business Listings</h5>
                                            <h3>{{count.business}}</h3>
                                        </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <i class="fa fa-refresh mr-3"></i>
                                <span>Update now</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3  p-2">
                            <div class="card card-common">
                                    <div class="card-body"> 
                                        <div class="d-flex justify-content-between">
                                                <i class="fa fa-money fa-3x text-success"></i>
                                                <div class="text-right text-secondary">
                                                    <h5>Active Business</h5>
                                                    <h3>{{count.active}}</h3>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <i class="fa fa-refresh mr-3"></i>
                                        <span>Update now</span>
                                    </div>
                                </div>
                    </div>
                    <div class="col-sm-6 col-xl-3  p-2">
                            <div class="card card-common">
                                    <div class="card-body"> 
                                        <div class="d-flex justify-content-between">
                                                <i class="fa fa-users fa-3x text-muted"></i>
                                                <div class="text-right text-secondary">
                                                    <h5>Inactive Business</h5>
                                                    <h3>{{count.inactive}}</h3>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <i class="fa fa-refresh mr-3"></i>
                                        <span>Update now</span>
                                    </div>
                                </div>
                    </div>
                    <div class="col-sm-6 col-xl-3  p-2">
                            <div class="card card-common">
                                    <div class="card-body"> 
                                        <div class="d-flex justify-content-between">
                                                <i class="fa fa-envelope fa-3x text-danger"></i>
                                                <div class="text-right text-secondary">
                                                    <h5>Categories</h5>
                                                    <h3>{{count.category}}</h3>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <i class="fa fa-refresh mr-3"></i>
                                        <span>Update now</span>
                                    </div>
                                </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end of cards -->

    <!-- tables -->
    <div class="section">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row align-items-center">
                        
                        <div class="col-xl-12 col-12">
                            <h3 class="text-muted text-center mb-3">
                                Business Listings
                            </h3>
                            <table class="table table-dark table-hover text-center">
                                <thead>
                                    <tr class="text-muted">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr v-for="(list, index) in listings" :key="list.id">
                                        <td> {{index+1}}</td>
                                        <td> <router-link :to="'/business/'+list.id"> {{list.name}} </router-link></td>
                                        <td>{{list.desc}}</td>
                                        <td>{{list.email}}</td>
                                        <td>
                                            <span v-if="list.active == 1" class="badge badge-success w-90 py-2">Active</span>
                                            <span v-else class="badge badge-danger w-90 py-2"> Inactive </span></td>
                                    </tr>
                                    

                                </tbody>

                            </table>
                             <!-- pagination -->
                            <nav v-if="numberOfPages > 1">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a href="#" class="page-link  py-2 px-3">
                                        <span>&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link py-2 px-3">
                                        <span>1</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a href="" class="page-link  py-2 px-3">
                                        <span>2</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link  py-2 px-3">
                                        <span>3</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link  py-2 px-3">
                                        <span>&raquo;</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                            <!-- end of pagination -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end of tables -->
</Layout>
</template>

<script>

//import Card from '../components/card.component';

export default {
   // components: { Card },
    data(){
        return {
            listings: '',
            count: '',
            numberOfPages: '',     
        }
    },
    mounted(){
        axios.get('/business')
            .then( res => { 
                this.listings = res.data.data.data;
                this.numberOfPages = res.data.data.last_page;
            })  

        axios.get('/count')
            .then( res => { 
                this.count = res.data.data;
            })   
    }
}
</script>
<style scoped>
    .raleway{
        font-family: 'Raleway', sans-serif;
    }

</style>