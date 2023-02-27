<template>
    <main>
        <template v-if="user">
            <side-layout/>
            <router-view class="content-layout"/>    
        </template>
    </main>
</template>

<script setup>
import SideLayout from './SideLayout.vue';
import api from '../../functions/api';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const user = ref()
const router = useRouter()

api.onError.unauthorized = () => {
    router.replace({name: 'login'})
}

const init = async () => {
    const response = await api.GET('api/init/dashboard')
    user.value = response.user
}

init()

</script>

<style scoped>

.content-layout {
    margin-left: 14rem;
    min-height: 100vh;
    overflow-y: auto;
}
</style>