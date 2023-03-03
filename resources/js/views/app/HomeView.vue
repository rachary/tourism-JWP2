<template>
   
    <section>
        INI HOME VIEW
       
    </section>
    <div style="">
        <div style="">
            <!-- Navigation Bar -->
            <div>
                <NavbarComponent/>
            </div>
        
            <!-- Content 1 -->
            <div>
                <Content1Component/>
            </div>
        
            <!-- Content 2 -->
            <div>
                <Content2Component/>
            </div>
            
            <!-- Content 3 -->
            <div>
                <Content3Component/>
            </div>
        </div>
        <div>
            <!-- Footer -->
            <FooterComponent/>
        </div>
    </div>
</template>

<script setup>


import NavbarComponent from '../components/NavbarComponent.vue';
import Content1Component from '../../components/Content1Component.vue';
import Content2Component from '../../components/Content2Component.vue';
import Content3Component from '../../components/Content3Component.vue';
import FooterComponent from '../../components/FooterComponent.vue';
</script>

<style scoped>
li img{
    width: 28px;
}
li a{
    width: min-content;
    display:flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 5px;
    text-decoration: none;
    color: black;
}

section {
    width: 100%;
    min-height: 100vh;
}
</style>