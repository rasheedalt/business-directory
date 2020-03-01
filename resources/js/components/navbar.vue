<template>
    <section>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
        <button class="navbar-toggler ml-auto mb-2 
        bg-light" type="button" data-toggle="collapse" 
        data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span></button>
         
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="container-fluid">
                <div class="row">
                    <!-- sidebar -->
                    <div class="col-lg-3 col-xl-2 col-md-4 sidebar fixed-top">
                        <router-link to="/" 
                        class="navbar-brand text-white d-block bottom-border 
                        text-center mx-auto text-center py-3 mb-4">Bussiness Lisiting</router-link>
                        <div class="bottom-border pb-2 mb-3">
                                <img src="images/img2.jpg" alt="" width="50" class="rounded-circle mr-3">
                                <a href="#" class="text-white">{{userName}}</a>
                        </div>
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item"><a href="/dashboard" class="nav-link text-white p-3 sidebar-link ">
                                <i class="fa fa-home fa-lg text-light mr-3"></i>Dashborad</a></li>
                            <li class="nav-item"><a href="/categories" class="nav-link text-white p-3 sidebar-link">
                                        <i class="fa fa-envelope fa-lg text-light mr-3"></i>Categories</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 sidebar-link">
                                <i class="fa fa-shopping-cart fa-lg text-light mr-3"></i>sales</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 sidebar-link">
                                        <i class="fa fa-line-chart fa-lg text-light mr-3"></i>Analytics</a></li>
                            <!-- <li class="nav-item"><a href="#" class="nav-link text-white p-3 sidebar-link">
                                        <i class="fa fa-bar-chart fa-lg text-light mr-3"></i>Charts</a></li> -->
                            
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 sidebar-link">
                                        <i class="fa fa-wrench fa-lg text-light mr-3"></i>Settings</a></li>
                            
                        </ul>
                    </div>
                    <!-- end of sidebar -->
                    <!-- top nav -->
                    <div class="col-lg-9 col-xl-10 col-md-8 ml-auto top-navbar bg-dark fixed-top py-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                            <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
                            </div>
                            <div class="col-md-5">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control s-input" placeholder="Search..">
                                        <button class="btn btn-white s-button"><i class="fa fa-search text-danger"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <div class="navbar-nav">
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet">
                                        <i class="fa fa-comments fa-lg text-muted"></i></a></li>
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet">
                                        <i class="fa fa-bell fa-lg text-muted"></i></a></li>
                                    <li class="nav-item ml-md-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out">
                                        <i class="fa fa-sign-out fa-lg text-danger"></i></a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of top nav -->
                </div>
            </div>
        </div>
    </nav>
    <!-- end ofnavbar -->

    <!-- modal -->
    <div class="modal fade" id="sign-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Want to leave?</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Press logout to leave?
                </div>
                <div class="modal-footer" >
                    <button class="btn btn-success" data-dismiss="modal">Stay here</button>
                    <button class="btn btn-danger" data-dismiss="modal">Logout</button>

                </div>
            </div>

        </div>

    </div>
    <!-- end of modal -->
</section>
</template>

<script>
    export default {
        data(){
            return{
                userName: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
             var set = JSON.parse(localStorage.getItem('auth'))
            this.userName = set.name
        }
    }
</script>
