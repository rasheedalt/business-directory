<template>
 <Layout>
      
    <div class="section pt-5">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row align-items-center">
                        
                        <div class="col-xl-12 col-12">
                            <h3 class="text-muted text-center mb-3">
                                Business Categories
                            </h3>
                            <table class="table table-dark table-hover text-center">
                                <thead>
                                    <tr class="text-muted">
                                        <th>#</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr v-for="(cat, index) in categories" :key="cat.id">
                                        <td> {{index+1}}</td>
                                        <td> {{cat.name}} </td>
                                        
                                    </tr>
                                    

                                </tbody>

                            </table>
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
            categories: '',
        }
    },
    mounted(){
        axios.get(`/category`)
            .then( res => { 
                this.categories = res.data.data;
                console.log(res.data)
            })   
    }
}
</script>
<style scoped>
    .raleway{
        font-family: 'Raleway', sans-serif;
    }

</style>