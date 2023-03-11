<template>
    <section>
        <div class="wrap">
            <div class="container">
                <div class="container-title">
                    {{ destinations.name }}
                </div>
                <div class="container-img">
                    <div class="slides">
                        <input class="radio" type="radio" name="radio-btn" id="radio1">
                        <input class="radio" type="radio" name="radio-btn" id="radio2">
                        <input class="radio" type="radio" name="radio-btn" id="radio3">
                        <input class="radio" type="radio" name="radio-btn" id="radio4">
                        <div class="slide first">
                            <img src="https://tourism.surabaya.go.id/storage/tour/1648710891_1.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="https://tourism.surabaya.go.id/storage/tour/1654138693_1.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="https://tourism.surabaya.go.id/storage/tour/1648713405_1.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="https://tourism.surabaya.go.id/storage/tour/1648713708_1.jpg" alt="">
                        </div>
                        <div class="navigation-manual">
                            <label for="radio1" class="manual-btn"></label>
                            <label for="radio2" class="manual-btn"></label>
                            <label for="radio3" class="manual-btn"></label>
                            <label for="radio4" class="manual-btn"></label>
                        </div>
                    </div>
                </div>
                <div class="container-content">
                    <div class="content-head">
                        <p>{{ destinations.name }}</p>
                        <div class="content">
                            <div>
                                <fa-icon class="icon" icon="fa-solid fa-location-dot" />
                                {{ destinations.address }}
                            </div>
                            <div>
                                <fa-icon class="icon" icon="fa-solid fa-tags" />
                                TAG
                            </div>
                        </div>
                    </div>
                    <div class="content-description">
                        {{ destinations.description }}
                    </div>
                    <div class="content-location">
                        <h5>Kunjungi {{ destinations.name }} melalui Google Map</h5>
                        <iframe class="iframe" :src="destinations.location"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useRoute } from 'vue-router';
import api from '../../functions/api';

const route = useRoute()
const loading = ref(false)
const destinations = ref([])
const images = ref([])
const tags = ref([])

const getDestination = async () => {
    loading.value = true
    try {
        const response = await api.GET(`/api/destination/${route.params.id}`)
        destinations.value = response
    } finally {
        loading.value = false
    }
}
const getDestinationtag = async () => {
    loading.value = true
    try {
        const response = await api.GET(`/api/destination/tag`)
        tags.value = response.data
    } finally {
        loading.value = false
    }
}
const getDestinationImage = async () => {
    loading.value = true
    try {
        const response = await api.GET(`/api/destination/image`)
        images.value = response.data
    } finally {
        loading.value = false
    }
}


setInterval(function () {
    let counter = 1;
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if (counter > 4) {
        counter = 1
    }
}, 5000)

getDestination()
getDestinationImage()
getDestinationtag()
</script>

<style scoped>
section {
    display: inline-block;
}

.container {
    margin: 4.8rem auto;
}

.container-title {
    font-size: 3rem;
    text-align: center;
    margin: 2rem;
}

.container-img {
    width: 90%;
    height: 70vh;
    overflow: hidden;
    margin: 1rem auto;
    border-radius: .5rem;
}

.slides {
    display: flex;
    width: 500%;
    height: 100%;
}

.slide {
    width: 20%;
    transition: 2s;
}

.radio {
    display: none;

}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.navigation-manual {
    position: absolute;
    width: 90%;
    bottom: 3rem;
    text-align: center;
    z-index: 1;
}

.navigation-manual .manual-btn {
    padding: .5rem;
    border-radius: 2rem;
    cursor: pointer;
    transition: 1s;
    background: #8AAAE4;
    box-shadow: 5px 5px 5px 0 rgba(0, 0, 0, .5);
}

.manual-btn:not(:last-child) {
    margin-right: 40px;
}

#radio1:checked ~ .first {
    margin-left: 0;
}

#radio2:checked ~ .first {
    margin-left: -20%;
}

#radio3:checked ~ .first {
    margin-left: -40%;
}

#radio4:checked ~ .first {
    margin-left: -60%;
}

.content-head {
    font-size: 1.5rem;
}

.content-head .content {
    display: flex;
    font-size: 1.1rem;
    gap: 1rem;
}

.content-description {
    margin-top: 1rem;
}

.content-location {
    margin-top: 2rem;
    font-size: 1.1rem;
    text-align: center;
}

.iframe {
    margin-top: .5rem;
    width: 100%;
}</style>