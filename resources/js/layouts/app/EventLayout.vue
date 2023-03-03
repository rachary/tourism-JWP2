<template>
    <div class="card">
        <div style="margin: 10px 20px">
            <a style="" href="">
                <div class="hover-zoom">
                    <img :src="event.imageUrl" alt="">
                </div>
                <h6>{{ event.name }}</h6>
                <h5>{{ event.startdate }}</h5>
                <h5>{{ event.enddate }}</h5>

            </a>
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

a .hover-zoom {
    height: 100%;
    overflow: hidden;
    border-radius: 16px;
}
a .hover-zoom {
    border-radius: 4px;
    width: 250px;
    height: 100%;
    max-height: 150px;
}

a .hover-zoom img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 16px;
    transform-origin: 50% 65%;
    transition: transform 5s, filter 3s ease-in;
    z-index: -1;
    overflow: hidden;
}


a .hover-zoom img:hover {
    transform: scale(1.5);
}

a h6 {
    margin: 5px 0;
    padding: 5px 7px;
    background: #6868AC;
    width: fit-content;
    color: white;
    letter-spacing: .5px;
    font-weight: 500;
    border-radius: 5px;
}

a h5 {
    font-size: 16px;
    letter-spacing: -1px;
    font-weight: 600;
    text-align: center;
}

a p {
    font-size: 14px;
}</style>