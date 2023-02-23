<template>
    <header>
        <div class="wrap">
            <a href="#">
                <img class="logo" src="https://tourism.surabaya.go.id/assets/front/images/img-logo-sparkling.png" alt="">
            </a>
            <nav>
                <ul class="nav-list" :class="{'nav-list-active': navToggleActive}">
                    <li class="nav-item" :class="{'nav-item-active': navToggleActive}">
                        <a href="" class="nav-link" :class="{'nav-link-active': navToggleActive, 'nav-link-current-active': $route.name === 'home'}">
                            <router-link :to="{name: 'home'}">Beranda</router-link>
                        </a>
                    </li>
                    <li class="nav-item" :class="{'nav-item-active': navToggleActive}">
                        <a href="" class="nav-link" :class="{'nav-link-active': navToggleActive, 'nav-link-current-active': $route.name === 'destination'}">
                            <router-link :to="{name: 'destination'}">Destinasi</router-link>
                        </a>
                    </li>
                    <li class="nav-item" :class="{'nav-item-active': navToggleActive}">
                        <a href="" class="nav-link" :class="{'nav-link-active': navToggleActive, 'nav-link-current-active': $route.name === 'event'}">
                            <router-link :to="{name: 'event'}">Event</router-link>
                        </a>
                    </li>
                </ul>
                <button @click="navToggleActive = !navToggleActive" class="nav-toggle" :class="{'nav-toggle-active': navToggleActive}"></button>
            </nav>
        </div>
    </header>
</template>

<script setup>
import { ref } from "vue";

const navToggleActive = ref(false)
</script>

<style scoped>
.wrap {
    position: fixed;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .5rem 1rem;
    background: linear-gradient(to bottom, rgba(0, 0, 0, .5), rgba(255, 255, 255, .5));
    backdrop-filter: blur(3px);
    z-index: 10;
}
.logo {
    position: relative;
    width: 7rem;
    margin-left: 3rem;
}
nav {
    display: flex;
    align-items: center;
    gap: 2rem;
}
.nav-list {
    position: relative;
    display: flex;
    gap: 2rem;
    margin-right: 10rem;
}
.nav-list-active {
    position: absolute;
    flex-direction: column;
    top: 100%;
    left: 0;
    gap: 0;
    width: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, .5), rgba(255, 255, 255, .5));
    backdrop-filter: blur(3px);
}

.nav-link:hover, .nav-link-current-active {
    color: white;
    filter: brightness(150%);
}
.nav-link {
    position: relative;
    padding: .3rem 0;
}
.nav-link::after {
    content: '';
    width: 100%;
    height: .2rem;
    background: #333;
    position: absolute;
    left: .4rem;
    bottom: 0;
    border-radius: 2rem;
}
.nav-link:hover::after, .nav-link-current-active::after {
    left: 0;
    background: white;
}
.nav-item-active {
    transform: translateX(4rem);
    opacity: 0;
}
.nav-item-active:first-child {
    animation: translateXtoZero 1s forwards;
}
.nav-item-active:nth-child(2) {
    animation: translateXtoZero 1s .2s forwards;
}
.nav-item-active:last-child {
    animation: translateXtoZero 1s .4s forwards;
    border-bottom: none;
}
.nav-link-active {
    display: inline-block;
    width: 100%;
    padding: 1rem;
}
.nav-link-active::after {
    content: none;
}
.nav-toggle {
    position: relative;
    width: 3rem;
    height: 2.5rem;
    background: transparent;
    border: solid transparent;
    cursor: pointer;
    z-index: 11;
    transition: 400ms;
    display: none;
}
.nav-toggle::before, .nav-toggle::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 0.25rem;
    background: #333;
    left: 0;
}
.nav-toggle::before {
    top: 25%;
}
.nav-toggle::after {
    bottom: 25%;
    transform-origin: 0rem;
    transform: rotate(-10deg) translateY(30%);
}
.nav-toggle:hover::after {
    transform: rotate(0deg) translateY(0);
}
.nav-toggle-active::before {
    transform-origin: 0rem;
    transform: rotate(13deg) translateY(30%);
}
.nav-toggle-active::after, .nav-toggle-active:hover::after {
    transform-origin: 0rem;
    transform: rotate(-13deg) translateY(30%);
}

@keyframes translateXtoZero {
    0% {
        transform: translateX(4rem);
        opacity: 0;
    }
    100% {
        transform: translateX(0rem);
        opacity: 1;
    }
}

</style>