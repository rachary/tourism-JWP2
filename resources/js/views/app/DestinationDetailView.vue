<template>
    <section>
        <div class="wrap">
            <div class="container">
                <div class="container-title">
                    {{ destinations.name }}
                </div>
                <div class="container-img">
                    <div class="img-preview">
                        <img v-for="image in images" :src="image.filename.includes('http')?image.filename:'http://127.0.0.1:8000/storage/destination_images/'+image.filename" alt="">
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
                            <!-- <div>
                                <fa-icon class="icon" icon="fa-solid fa-tags" />
                                TAG
                            </div> -->
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
import { ref } from 'vue';
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
const getDestinationTag = async () => {
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
        const response = await api.GET(`/api/destination/image/`)
        images.value = response.data.filter(img => img.destination_id == route.params.id)

    } finally {
        loading.value = false
    }
}

getDestination()
getDestinationImage()
getDestinationTag()
</script>

<style scoped>
section {
    display: inline-block;
}
.wrap {
    padding: 0 5rem;
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

/* Responsive 480px */
@media screen and (max-width: 480px) {
    .wrap {
        padding: 0 2rem;
    }
    .container-title {
        font-size: 2.5rem;
        margin: 1rem;
    }
    .container-img {
        width: 100%;
        height: 35vh;
    }
    .content-head {
        font-size: 1.3rem;
    }
    .content-head .content {
        font-size: 1rem;
    }
    .content-description {
        margin-top: 1rem;
    }
    .content-location {
        margin-top: 1.5rem;
        font-size: 1rem;
    }
}

/* Responsive 481px - 768px */
@media screen and (min-width: 481px) and (max-width: 768px) {
    .wrap {
        padding: 0 3rem;
    }
    .container {
        margin: 6rem auto 3rem auto;
    }
    .container-title {
        font-size: 2.5rem;
        margin: 1rem;
    }
    .container-img {
        width: 100%;
        height: 35vh;
    }
    .content-head {
        font-size: 1.3rem;
    }
    .content-head .content {
        font-size: 1rem;
    }
    .content-description {
        margin-top: 1rem;
    }
    .content-location {
        margin-top: 1.5rem;
        font-size: 1rem;
    }
}

/* Responsive 769px - 1024px */
@media screen and (min-width: 769px) and (max-width: 1024px) {
    .wrap {
        padding: 0 4rem;
    }
    .container {
        margin: 6rem auto 3rem auto;
    }
    .container-title {
        font-size: 2.6rem;
        margin: 1rem;
    }
    .container-img {
        width: 100%;
        height: 59vh;
    }
    .content-head {
        font-size: 1.5rem;
    }
    .content-head .content {
        font-size: 1.1rem;
    }
    .content-description {
        margin-top: 1rem;
        font-size: 1.1rem;
        line-height: 1.6;
    }
    .content-location {
        margin-top: 1.5rem;
        font-size: 1.1rem;
    }
}
</style>