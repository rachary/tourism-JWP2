<template>
    <div class="card">
        <div style="margin: 10px 40px;">
            <router-link :to="{name: 'eventdetail', params: {id: event.id}}">
                <div class="frame">
                    <img v-for="image in event.event_images" :src="image.filename" alt="">
                </div>
                <div class="content">
                    <div class="date">
                    {{ event.date_start }} -
                    {{ event.date_end }}
                    </div>
                    <div class="name">
                        {{ event.name }}
                    </div>
                    <!-- <div class="address">
                        <fa-icon class="icon" icon="fa-solid fa-location-dot"/>
                        {{ event.address }}
                    </div> -->
                </div>
            </router-link>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({ event: Object })

</script>

<style scoped>
.card {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

a {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 3px;
    text-decoration: none;
    color: black;
    width: min-content;
    position: relative;
}

.frame {
    overflow: hidden;
    border-radius: 1rem;
    width: 20rem;
    height: 22rem;
    position: relative;
}

.frame img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 1rem;
    transform-origin: 50% 65%;
    transition: transform 5s, filter 3s ease-in;
    z-index: -1;
    overflow: hidden;
}

.frame img:hover {
    transform: scale(1.5);
}

a h6 {
    padding: .3125rem .4375rem;
    background: #6868AC;
    width: fit-content;
    color: white;
    letter-spacing: .050rem;
    font-weight: 500;
    border-radius: .3125rem;
    font-size: .7rem;
}

a h5 {
    font-size: 1rem;
    letter-spacing: -1px;
    font-weight: 600;
    text-align: center;
}

a p {
    font-size: 1rem;
}

.content {
    background: rgba(0, 0, 0, .6);
    position: absolute;
    bottom: 0;
    border-radius: 0 0 1rem 1rem;
    padding: .5rem;
    width: 100%;
}
.name {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    font-size: 1.5rem;
    letter-spacing: 1px;
    font-weight: 600;
    max-width: 19rem;
    color: white;
    text-align: center;
}
.address {
    width: 100%;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    display: inline-block;
    text-align: center;
    max-width: 19rem;
    color: white;
}

.date {
    display: flex;
    margin: 0 auto;
    justify-content: center;
    gap: .1rem;
    font-size: .9rem;
    width: fit-content;
    text-align: center;
    background: #526CEB;
    border-radius: 1rem;
    padding: .2rem .5rem;
    color: white;

}
.icon {
    font-size:18px;
    margin-right:5px;
}
</style>