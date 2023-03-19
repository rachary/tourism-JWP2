<template>
    <div class="side-panel">
        <div class="upper">
            <div class="profile">
                <img src="https://picsum.photos/50/50" alt="">
                <h2>{{ user }}</h2>
            </div>
            <a href="#">
                <fa-icon icon="fa-solid fa-gear"/>
            </a>
        </div>
        <div class="bottom">
            <nav>
                <ul class="nav-list">
                    <li class="label-item">Dashboard</li>
                    <li class="nav-item" v-if="role == 1">
                        <router-link :to="{name: 'dashboarduser'}">
                            <a class="nav-link" :class="{'nav-link-current-active-user': $route.name === 'dashboarduser'}">
                                <fa-icon class="icon" icon="fa-solid fa-user"/>
                                <p>Pengguna</p>
                            </a>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'dashboarddestination'}">
                            <a class="nav-link" :class="{'nav-link-current-active-destination': $route.name === 'dashboarddestination'}">
                                <fa-icon class="icon" icon="fa-solid fa-location-arrow"/>
                                <p>Destinasi</p>
                            </a>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'dashboardevent'}">
                            <a class="nav-link" :class="{'nav-link-current-active-event': $route.name === 'dashboardevent'}">
                                <fa-icon class="icon" icon="fa-solid fa-calendar-day"/>
                                <p>Event</p>
                            </a>
                        </router-link>
                    </li>
                    <li class="label-item">App</li>
                    <li class="nav-item">
                        <router-link :to="{name: 'appdestination'}">
                            <a class="nav-link" :class="{'nav-link-current-active-appdestination': $route.name === 'appdestination'}">
                                <fa-icon class="icon" icon="fa-solid fa-map-location-dot"/>
                                <p>Destinasi</p>
                            </a>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'appevent'}">
                            <a class="nav-link" :class="{'nav-link-current-active-appevent': $route.name === 'appevent'}">
                                <fa-icon class="icon" icon="fa-solid fa-bullhorn"/>
                                <p>Event</p>
                            </a>
                        </router-link>
                    </li>
                    <button @click="handleLogout">Logout</button>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import api from '../../functions/api';
import router from '../../routes'

const user = ref([])
const role = ref('')
const getUsers = () => {
    user.value = localStorage.getItem('username')
}

const handleLogout = () => {
    localStorage.removeItem('username');
    localStorage.removeItem('userrole');
    router.replace({name: 'login'});
}
const getUserRole = () => {
    role.value = localStorage.getItem('userrole')
}

getUserRole()
getUsers()
</script>

<style scoped>
.side-panel {
    position: fixed;
    width: 14rem;
    height: 100vh;
    background: #1D3C58;
    z-index: 10;
    color: #EAE7D6;
}
.upper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: .5rem 1rem .5rem 0;
}
.profile {
    display: flex;
    align-items: center;
    gap: .5rem;
}
.profile img {
    border-radius: 100%;
}

.nav-list {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: .125rem 0;
    width: 100%;
    gap: .125rem;
}
.label-item {
    text-align: center;
    border-bottom: .125rem solid white;
    border-top: .125rem solid white;
    padding: .3rem 0;
    text-transform: uppercase;
    pointer-events: none;
}
.nav-link {
    display: flex;
    align-items: center;
    justify-content: left;
    gap: .5rem;
    padding: .5rem 3rem;
}

.nav-link-current-active-user {
    background: #F8F4EA;
    color: #FD8A8A;
    transition: .3s ease;
}
.nav-link-current-active-destination {
    background: #F8F4EA;
    color: #66C18C;
    transition: .3s ease;
}
.nav-link-current-active-event {
    background: #F8F4EA;
    color: #526CEB;
    transition: .3s ease;
}
.nav-link-current-active-appdestination {
    background: #F8F4EA;
    color: #F2789F;
    transition: .3s ease;
}
.nav-link-current-active-appevent {
    background: #F8F4EA;
    color: #FFB319;
    transition: .3s ease;
}

.icon {
    position: absolute;
    left: 1.5rem;
}

</style>