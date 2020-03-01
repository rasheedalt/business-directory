<template>
     <section>
         <navbar />  
         <slot></slot>
     </section>
                 
</template>

<script>

import Navbar from '../components/navbar.vue';

export default {
    components:{
         Navbar,
    }
}
</script>