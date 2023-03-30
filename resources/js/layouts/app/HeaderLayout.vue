<template>
    <header id="header">
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
#header {
    transition: .5s;
}
.wrap {
    position: fixed;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .5rem 1rem;
    background: #8AAAE4;
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
    align-items: center;
    top: 100%;
    left: 0;
    gap: 0;
    width: 100%;
    background: #8AAAE4;
}

.nav-link:hover, .nav-link-current-active {
    color: #FFFFD2 !important;
}
.nav-link {
    position: relative;
    padding: .3rem 0;
    color: #FFFFFF;
}
.nav-link::after {
    content: '';
    width: 100%;
    height: .2rem;
    background: #FFFFFF;
    position: absolute;
    left: .4rem;
    bottom: 0;
    border-radius: 2rem;
}
.nav-link:hover::after, .nav-link-current-active::after {
    left: 0;
    background: #F9EBC8;
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
    background: #F9EBC8;
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
@media only screen and (max-width: 992px) {
    .nav-list {
        margin-right: 5rem;
    }
}
@media only screen and (max-width: 991px) and (min-width: 768px) {
    .nav-list {
        margin-right: 3rem;
    }
}
@media only screen and (max-width: 767px) and (min-width: 576px) {
    .nav-list {
        margin-right: 2rem;
    }
}
@media only screen and (max-width: 575px) {
    .nav-list {
        margin-right: 1rem;
    }
}
@media only screen and (max-width: 767px) {
    .nav-list {
        display: none;
    }
    .nav-list-active {
        display: flex;
    }
    .nav-toggle {
        display: block;
    }
}
</style>