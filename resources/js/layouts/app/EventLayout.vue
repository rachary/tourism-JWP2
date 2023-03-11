<template>
    <div class="card">
        <div style="margin: 10px 20px">
            <router-link :to="{name: 'eventdetail', params: {id: event.id}}">
                <div class="frame">
                    <div class="slider-frame">
                        <div class="img-container" v-for="image in event.event_images">
                            <img :src="image.filename" alt="">
                        </div>
                    </div>
                </div>
                <!-- <div class="tagbox">
                    <div class="tag" v-for="tag in destination.destination_tags">
                        <h6>{{ tag.name }}</h6>
                    </div>
                </div> -->
                <div class="name">
                    {{ event.name }}
                </div>
                <div class="address">
                    <fa-icon class="icon" icon="fa-solid fa-location-dot"/>
                    {{ event.address }}
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
}

a .frame {
    overflow: hidden;
    border-radius: 1rem;
    width: 15rem;
    height: 100%;
    max-height: 8.4rem;
}

a .frame img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 1rem;
    transform-origin: 50% 65%;
    transition: transform 5s, filter 3s ease-in;
    z-index: -1;
    overflow: hidden;
}

a .frame img:hover {
    transform: scale(1.5);
}
.tagbox {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: .1rem;
    width: 100%;
}
.tag {

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
.name {
    width: 90%;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    display: inline-block;
    text-align: center;
    font-size: 1rem;
    letter-spacing: -1px;
    font-weight: 600;
    text-align: center;
}
.address {
    position: relative;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    display: inline-block;
    text-align: center;
    max-width: 15rem;
}
.icon {
    font-size:18px;
    margin-right:5px;
}
</style>