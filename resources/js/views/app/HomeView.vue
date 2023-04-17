<template>
    <section id="home" class="hero">
        <video autoplay muted loop>
            <source src="https://tourism.surabaya.go.id/assets/front/videos/surabaya.mp4">
        </video>
        <div class="wrap">
            <div class="container">
                <h2 class="sub-size sub-headline">You will love every corner of it</h2>
                <h1 class="size headline">Wisata Surabaya</h1>
                <div class="headline-description">
                    <div class="separator">
                        <div class="line line-left"></div>
                        <div class="asterisk"><fa-icon icon="fa-solid fa-asterisk" /></div>
                        <div class="line line-right"></div>
                    </div>
                    <div class="single-animation">
                        <h5>Let's explore one of the biggest city in Indonesia with famous name called City of Heroes.</h5>
                        <a href="#beauty-of-surabaya" class="btn btn-cta">Explore more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="beauty-of-surabaya" class="beauty">
        <div class="wrap">
            <div class="beauty-container">
                <div class="beauty-description padding-right animate-left">
                    <div class="global-headline">
                        <h2 class="sub-headline">Beauty of</h2>
                        <h1 class="headline headline-second">Surabaya</h1>
                    </div>
                </div>
                <div class="beauty-box">
                    <div class="beauty-card" v-for="destination in randomDestinations">
                        <div class="img-card">
                            <img v-for="image in destination.destination_images" :src="image.filename.includes('http')?image.filename:'http://127.0.0.1:8000/storage/destination_images/'+image.filename" alt="">
                        </div>
                        <div class="content-card">
                            <div class="content-title">{{ destination.name }}</div>
                            <div class="content-description ellipsis">
                                <p>{{ destination.description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="beauty-card" v-for="event in randomEvents">
                        <div class="img-card">
                            <img v-for="image in event.event_images" :src="image.filename.includes('http')?image.filename:'http://127.0.0.1:8000/storage/event_images/'+image.filename" alt="">
                        </div>
                        <div class="content-card">
                            <div class="content-title">{{ event.name }}</div>
                            <div class="content-description ellipsis">
                                <p>{{ event.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="middle">
                    <a href="#surabaya360" class="btn btn-cta">Explore 360&deg;</a>
                </div>
            </div>
        </div>
    </section>
    <section id="surabaya360">
        <div class="wrap">
            <div class="surabaya360-container">
                <div class="surabaya360-description">
                    <div class="global-headline">
                        <h2 class="sub-headline">360&deg;</h2>
                        <h1 class="headline headline-second">Surabaya</h1>
                    </div>
                </div>
                <div class="surabaya360-video">
                    <video autoplay muted loop>
                        <source src="https://tourism.surabaya.go.id/assets/front/videos/360.mp4">
                    </video>
                    <a href="https://virtualtourism.surabaya.go.id/" target="_blank" class="btn-cta btn">
                        Tekan untuk <br> surabaya 360&deg;
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="treatment">
      <div class="wrap">
        <div class="global-headline">
            <h2 class="sub-headline">Meet</h2>
            <h1 class="headline headline-second">Our Teams</h1>
        </div>
        <div class="cardbox">
            <div class="card__1">
              <img class="card_img_1" src="../../assets/profile/profile_2.jpg" alt="">
              <div class="card_headline_1">
                <p class="headline_1">
                  Ary
                </p>
                <p class="headline_2">
                  Front-end & Back-end
                </p>
              </div>
              <a href="#">
                <div class="card_cta_1">
                  <p>Ketua</p>
                </div>
              </a>
            </div>
            <div class="card__1">
              <img class="card_img_1" src="../../assets/profile/profile_3.jpg" alt="">
              <div class="card_headline_1">
                <p class="headline_1">
                  Izra
                </p>
                <p class="headline_2">
                  Front-end
                </p>
              </div>
              <a href="#">
                <div class="card_cta_1">
                  <p>Anggota</p>
                </div>
              </a>
            </div>
            <div class="card__1">
              <img class="card_img_1" src="../../assets/profile/profile_4.jpg" alt="">
              <div class="card_headline_1">
                <p class="headline_1">
                  Ismi
                </p>
                <p class="headline_2">
                  Front-end
                </p>
              </div>
              <a href="#">
                <div class="card_cta_1">
                  <p>Anggota</p>
                </div>
              </a>
            </div>
            <div class="card__1">
              <img class="card_img_1" src="../../assets/profile/profile_1.jpg" alt="">
              <div class="card_headline_1">
                <p class="headline_1">
                  Naufal
                </p>
                <p class="headline_2">
                  Back-end
                </p>
              </div>
              <a href="#">
                <div class="card_cta_1">
                  <p>Anggota</p>
                </div>
              </a>
            </div>
          </div>
      </div>
    </section>
</template>

<script setup>
import { ref, computed } from 'vue';
import api from '../../functions/api'

const loading = ref(false)
const destinations = ref([])
const events = ref([])
const randomDestinations = ref([])
const randomEvents = ref([])

const getDestination = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/destination')
        destinations.value = response.data
        if (destinations.value.length >= 2) {
            const randomIndex = []
            while (randomIndex.length < 2) {
                const random = Math.floor(Math.random() * destinations.value.length)
                if (!randomIndex.includes(random)) {
                    randomIndex.push(random)
                }
            }
            randomDestinations.value = [
                destinations.value[randomIndex[0]],
                destinations.value[randomIndex[1]],
            ]
        }
    } finally {
        loading.value = false
    }
}
const getEvent = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/event')
        events.value = response.data
        if (events.value.length >= 2) {
            const randomIndex = []
            while (randomIndex.length < 2) {
                const random = Math.floor(Math.random() * events.value.length)
                if (!randomIndex.includes(random)) {
                    randomIndex.push(random)
                }
            }
            randomEvents.value = [
                events.value[randomIndex[0]],
                events.value[randomIndex[1]],
            ]
        }
    } finally {
        loading.value = false
    }
}
getDestination()
getEvent()
</script>

<style scoped>
section {
    display: inline-block;
}
#home > video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    position: absolute;
    z-index: -10;
    filter: brightness(30%)
}
.hero {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #FFFFD2;
}

.sub-headline {
    font-family: 'Beau Rivage', cursive;
    font-size: 2rem;
    transform: translateY(20%);
    letter-spacing: .09rem;
    pointer-events: none;
}
.headline {
    text-transform: uppercase;
    font-size: 2rem;
    letter-spacing: .5rem;
    pointer-events: none;
}
.first-letter {
    font-family: 'Beau Rivage', cursive;
    font-size: 4rem;
}

.sub-size {
    font-size: 3rem
}
.size {
    font-size: 4rem;
}
.separator {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin: 2rem 0;
}

.line {
    width: 100%;
    height: .25rem;
    background: #FFFFD2;
    position: relative;
}

.line-right::before,
.line-left::before {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    border: .5rem solid transparent;
}

.line-right::before {
    border-right-color: #FFFFD2;
    right: 0;
}

.line-left::before {
    border-left-color: #FFFFD2;
    left: 0;
}

.asterisk {
    font-size: 1.2rem;
}

.headline-description h5 {
    font-size: 1.2rem;
    font-weight: 100;
    text-transform: capitalize;
    letter-spacing: .1875rem;
    pointer-events: none;
}

.btn {
    display: inline-block;
    text-transform: uppercase;
    letter-spacing: .125rem;
}

.btn-cta {
    font-size: .8rem;
    background: #8AAAE4;
    padding: .5rem .9rem;
    color: #FFFFD2;
    border-radius: .4rem;
    transition: background .5;
    margin-top: 1rem;
}

/* Section 2 */
#beauty-of-surabaya {
    padding-top: 3.5rem;
}
.middle {
    text-align: center;
}
.beauty-box {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    min-height: calc(100vh - 10rem);
    justify-content: center;
}
.img-card {
    min-width: 20rem;
    min-height: 15rem;
    width: 20rem;
    height: 15rem;
    overflow: hidden;
}
.img-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.beauty-card {
    display: flex;
    gap: 1rem;
    width: fit-content;
    max-width: 49%;
    height: fit-content;
}
.content-title {
    font-size: 1.2rem;
    font-weight: bold;
}
.ellipsis p {
    display: -webkit-box;
    -webkit-line-clamp: 8;
    -webkit-box-orient: vertical;
    overflow: hidden;
    width:100%;
}


/* 360 Surabaya */
#surabaya360 {
    padding-top: 3.5rem;
}
.surabaya360-video {
    height: calc(100vh - 10rem);
    width: 100%;
    position: relative;
}
.surabaya360-video > video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: relative;
    z-index: -10;
}
.surabaya360-video > a {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-75%);
    box-shadow: 5px 10px 5px 1px rgba(0, 0, 0, .5);
    text-align: center;
}
.cardbox {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  padding: 2rem;
  justify-content: center;
}

/* Card 1 */
.card__1 {
  width: 20%;
  height: 400px;
  position: relative;
  background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .1));
  border-radius: 2rem;
  overflow: hidden;
}
.card__1 .card_img_1 {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  z-index: -1;
}
.card__1 .card_headline_1 {
  color: white;
  padding: 1.5rem 2rem;
}
.card__1 .card_headline_1 .headline_1 {
  font-size: 2rem;
  font-weight: 600;
  line-height: 1.2;
  pointer-events: none;
  position: relative;
  z-index: 2;
}
.card__1 .card_headline_1 .headline_2 {
  margin-top: .5rem;
  font-size: .7rem;
  pointer-events: none;
}
.card__1 .card_headline_1 .headline_1::selection,
.card__1 .card_headline_1 .headline_2::selection {
  background: #8AAAE4;
}
.card__1 .card_cta_1 {
  color: white;
  position: absolute;
  bottom: 0;
  right: 0;
  background: #8AAAE4;
  width: 25%;
  height: 20%;
  border-radius: 2rem 0 0 0;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: .4s;
}
.card__1 .card_cta_1:hover {
  width: 100%;
  height: 100%;
}
.card__1 .card_cta_1 p {
  color: white;
  font-size: .8rem;
  font-weight: 600;
  letter-spacing: 1px;
}
.card__1 .card_cta_1 p::selection {
  background: var(--green);
}

/* Reponsive 480px */
@media screen and (max-width: 480px) {
    .size {
        font-size: 3rem;
    }
    .sub-size {
        font-size: 2rem;
    }
    .headline-description h5 {
        font-size: 1rem;
    }
    .beauty-box {
        flex-direction: column;
        gap: 2rem;
    }
    .img-card {
        min-width: 100%;
        min-height: 100%;
        width: 20rem;
        height: 15rem;
        overflow: hidden;
    }
    .beauty-card {
        flex-direction: column;
        display: flex;
        gap: 1rem;
        width: fit-content;
        max-width: 100%;
        height: fit-content;
    }
    .content-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
    .ellipsis p {
        display: -webkit-box;
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical;
        overflow: hidden;
        width:100%;
    }
    .card__1 {
        width: 100%;
        height: 400px;
    }
}

/* Reponsive 481px - 768px */
@media screen and (min-width: 481px) and (max-width: 768px) {
    .size {
        font-size: 3rem;
    }
    .sub-size {
        font-size: 2rem;
    }
    .headline-description h5 {
        font-size: 1rem;
    }
    .beauty-box {
        flex-direction: column;
        gap: 2rem;
    }
    .img-card {
        min-width: 100%;
        min-height: 100%;
        width: 20rem;
        height: 15rem;
        overflow: hidden;
    }
    .beauty-card {
        flex-direction: column;
        display: flex;
        gap: 1rem;
        width: fit-content;
        max-width: 100%;
        height: fit-content;
    }
    .content-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
    .ellipsis p {
        display: -webkit-box;
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical;
        overflow: hidden;
        width:100%;
    }
    .card__1 {
        width: 45%;
        height: 400px;
    }
}

/* Reponsive 769px - 1024px */
@media screen and (min-width: 769px) and (max-width: 1024px) {
    .size {
        font-size: 3rem;
    }
    .sub-size {
        font-size: 2rem;
    }
    .headline-description h5 {
        font-size: 1rem;
    }
    .beauty-box {
        flex-direction: column;
        gap: 2rem;
    }
    .img-card {
        min-width: 40%;
        min-height: 40%;
        width: 20rem;
        height: 15rem;
        overflow: hidden;
    }
    .beauty-card {
        flex-direction: row;
        display: flex;
        align-items: center;
        gap: 1rem;
        width: fit-content;
        max-width: 100%;
        height: fit-content;
    }
    .content-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
    .ellipsis p {
        display: -webkit-box;
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical;
        overflow: hidden;
        width:100%;
    }
    .card__1 {
        width: 45%;
        height: 400px;
    }
}
</style>