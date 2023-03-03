<template>
        <section style="width:100%;height:100vh;display:inline-block;">
        <div>
            <video style="position:absolute;z-index:-1;object-fit:cover;width:100%;height:100%;filter:brightness(30%)" autoplay muted loop>
                <source src="https://tourism.surabaya.go.id/assets/front/videos/surabaya.mp4" type="video/mp4">
            </video>
        </div>
        <div class="content-1" style="width:100%;display:flex;flex-direction:column;justify-content:center;align-items:center;margin:6% 0 auto;color:white;text-align:center;">
            <h1 style="font-size:70px;letter-spacing:1px;">WISATA <span>SURABAYA</span></h1>
            <h2 style="margin-top:20px;font-size:36px;letter-spacing:-1px;"><span>You will love every</span> corner of it</h2>
            <h3 style="margin-top:10px;font-size:18px;font-weight:500;letter-spacing:-.5px">Let's explore one of the biggest city in Indonesia with famous name called City of Heroes.</h3>
        </div>
        <div class="content-nav-1" style="width:100%;display:inline-block;margin:220px auto 0 auto;">
            <ul style="width:100%;display:flex;flex-wrap:wrap;justify-content:center;list-style:none;gap:45px;">
                <li>
                    <a><router-link :to="{name: 'destinasi'}">
                    <span></span><fa-icon class="nav-icon" icon="fa-solid fa-map-location-dot"/>Destinasi Wisata
                    </router-link></a>
                </li>
                <li>
                    <a><router-link :to="{name: 'home'}">
                    <span></span><fa-icon class="nav-icon" icon="fa-solid fa-dungeon"/>Cagar Budaya
                    </router-link></a>
                </li>
                <li>
                    <a><router-link :to="{name: 'home'}">
                    <span></span><fa-icon class="nav-icon" icon="fa-solid fa-bullhorn"/>Event Surabaya
                    </router-link></a>
                </li>
                <li>
                    <a><router-link :to="{name: 'home'}">
                    <span></span><fa-icon class="nav-icon" icon="fa-solid fa-map"/>
                    Peta Digital
                    </router-link></a>
                </li>
                
            </ul>
        </div>
        
    </section>
</template>

<style scoped>
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

module.export = Content1Component;
export default Content1Component