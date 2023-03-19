<template>
    <section>
        <div class="wrap">
            <div class="container">
                <div class="container-title">
                    {{ events.name }}
                </div>
                <div class="container-img">
                    <div class="img-preview">
                        <img v-for="image in images" :src="image.filename.includes('http')?image.filename:'http://127.0.0.1:8000/storage/event_images/'+image.filename" alt="">
                    </div>
                    <div class="content-preview">
                        <div class="linebox address">
                            Alamat: {{ events.address }}
                        </div>
                        <div class="linebox date">
                            Tanggal: {{ events.date_start }} - {{ events.date_end }} 
                        </div>
                        <div class="linebox time">
                            Pukul: {{ events.time }}
                        </div>
                        <div class="linebox organizer">
                            Penyelenggara: {{ events.organizer }}
                        </div>
                        
                    </div>
                </div>
                <div class="container-content">
                    <div class="content-description">
                        {{ events.description }}
                    </div>
                    <div class="content-location">
                        <h5>Kunjungi {{ events.name }} melalui Google Map</h5>
                        <iframe class="iframe" :src="events.location"></iframe>
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
const events = ref([])
const images = ref([])

const getEvent = async () => {
    loading.value = true
    try {
        const response = await api.GET(`/api/event/${route.params.id}`)
        events.value = response
    } finally {
        loading.value = false
    }
}

const getEventImage = async () => {
    loading.value = true
    try {
        const response = await api.GET(`/api/event/image/`)
        images.value = response.data.filter(img => img.event_id == route.params.id)

    } finally {
        loading.value = false
    }
}

getEvent()
getEventImage()
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
    width: 50%;
    height: 70vh;
    margin: 1rem auto;
    border-radius: .5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: .5rem;
}

.img-preview {
    width: 60%;
    height: 70vh;
    margin: 1rem auto;
    overflow: hidden;
    border-radius: .5rem;
}
.content-preview {
    width: 40%;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}
.container-img > img {
    width: 100%;
    height: 100%;
    object-fit: cover;
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
}

.linebox {
    border: 1px solid #526CEB;
    padding: .5rem;
    border-radius: .5rem;
}
</style>