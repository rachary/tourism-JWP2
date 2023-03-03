<template>
    <section style="width:100%;height:100vh;">
        <div class="responsive-div" style="display:flex;">
            <ul style="display:flex;flex-wrap:wrap;justify-content:center;align-items:center;flex:1;margin: 15px auto 0 auto;list-style:none;">
                <li>
                    <a href="">
                    <fa-icon class="nav-icon" icon="fa-regular fa-calendar-plus"/>
                    Event
                    </a>
                </li>
                <li>
                    <a href="">
                    <fa-icon class="nav-icon" icon="fa-solid fa-map-location-dot"/>
                    Peta
                    </a>
                </li>
                <li>
                    <a href="">
                    <fa-icon class="nav-icon" icon="fa-solid fa-utensils"/>
                    Kuliner
                    </a>
                </li>
                <li>
                    <a href="">
                    <fa-icon class="nav-icon" icon="fa-solid fa-bag-shopping"/>
                    Shopping
                    </a>
                </li>
                <li>
                    <a href="">
                    <fa-icon class="nav-icon" icon="fa-solid fa-campground"/>
                    Outdoor
                    </a>
                </li>
                <li>
                    <a href="">
                    <fa-icon class="nav-icon" icon="fa-solid fa-briefcase"/>
                    Hotel
                    </a>
                </li>
                <li>
                    <a href="">
                    <fa-icon class="nav-icon" icon="fa-solid fa-torii-gate"/>
                    Heritage
                    </a>
                </li>
                <li>
                    <a href="">
                    <fa-icon class="nav-icon" icon="fa-regular fa-comments"/>
                    FAQ
                    </a>
                </li>
            </ul>
            <div style="flex:1;height:100%;margin: auto 0">
                <div style="display:flex;align-items:center;justify-content:space-between;font-size:28px;color:#039BE5;">
                    <div>
                        <h1>Explore <span>360</span></h1>
                        <h1><span>Wisata Surabaya</span></h1>
                    </div>
                    <h1>360<span>&deg;</span></h1>
                </div>
                <video style="width:100%;height:auto;object-fit:cover;margin-top:10px;" autoplay muted loop>
                    <source src="https://tourism.surabaya.go.id/assets/front/videos/360.mp4">
                </video>
            </div>
        </div>

    </section>
</template>

<style scoped>
ul li {
    margin: 15px 90px;
}
ul li a {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: #6868AC;
    font-weight: 700;
    letter-spacing: -1px;
    transition: .3s ease-in-out;
}
ul li a:hover {
    color: #fd7e14;
}
ul li a .nav-icon {
    font-size: 70px;
    color:#6868AC;
}
@media screen and (max-width: 476px) {
    .responsive-div {
        display: flex;
        flex-direction: column
    }
    .responsive-div ul {
        display: flex;
        flex-wrap: nowrap;
        margin: 0;
    }
    .responsive-div ul li {
        margin: 20px 25px;
    }
}

.nav-icon{
    font-size: 25px;
}
li a{
    width: 100px;
    height: 100px;
    padding: 8px;
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    text-decoration: none;
    color: white;
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 2px;
    text-transform: uppercase;
    position: relative;
    border-radius: 100%;
    gap: 8px;
}
li a:after {
    content: '';
    position: absolute;
    background: #6868AC;
    width: 100%;
    height: 100%;
    border-radius: 100%;
    opacity: 0;
    top: 0;
    left: 0;
    z-index: -1;
    transition: all 0.25s ease-in-out;
}
li a:before {
    content: '';
    position: absolute;
    background: #6868AC;
    width: 100%;
    height: 100%;
    border-radius: 100%;
    opacity: 0;
    z-index: -1;
    transition: all 0.25s ease-in-out;
}
li a:hover:before {
    animation: rounded 1.5s ease-out infinite
}
li a:hover:after {
    opacity: 1;
}
@keyframes rounded {
    0% {
        opacity: 0.8;
        transform: scale(1);
    }

    70% {
        opacity: 0;
        transform: scale(1.5);
    }

    100% {
        opacity: 0;
    }
}

@media screen and (max-width: 476px) {
.content-1 {
    position: absolute;
}
.content-1 h1{
    margin-top: 20%;
    letter-spacing: -5px;
    
}
.content-nav-1 ul{
    margin-top: 220px;
    display: block;
    margin: 250px auto;
}
.content-nav-1 ul li a{
    width: max-content;
}
}
</style>

module.export = Content2Component