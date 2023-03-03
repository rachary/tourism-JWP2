<template>
    <header id="navbar" style="position:fixed;width:100%;z-index:10;top:0;transition:.5s;display:inline-block">
        <nav style="width:70%;display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;margin: 0 auto;padding: 15px 0;">
            <img style="width:100px;transition:.3s;"
            src="https://tourism.surabaya.go.id/assets/front/images/img-logo-sparkling.png" alt="">
            <ul style="display:flex;gap:35px;">
                <li>
                    <a><router-link :to="{ name: 'home' }">Beranda</router-link></a>
                </li>
                <li>
                    <a><router-link :to="{ name: 'destinasi' }">Destinasi</router-link></a>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script setup>
window.onscroll = function() { scrollFunction() };
function scrollFunction() {
    let navbar = document.getElementById('navbar');
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        navbar.style.boxShadow = "10px 10px 30px rgba(0, 0, 0, .5)";
        navbar.style.background = "rgba(200, 200, 200, .5)";
        navbar.style.backdropFilter = "blur(5px)";
    } else {
        navbar.style.boxShadow = "none";
        navbar.style.background = "none";
        navbar.style.backdropFilter = "none";
    }
}
</script>

<style scoped>
.router-link-active {
    color: #337def;
    transition: .5s;
}
.router-link-active:after {
    content: '';
    height: 3px;
    width: 30%;
    position: absolute;
    bottom: -3px;
    left: 0;
    background: #337def;
    z-index: 11;
    border-radius: 100px;
}
nav img:hover{
    transform: rotate(-5deg);
    cursor: pointer;
}
li {
    list-style: none;
}
a {
    position: relative;
    text-decoration: none;
    color: #FDBF4E;
    font-size: 18px;
    transition: .5s;
    padding-bottom: 5px;
    border-bottom: 1px solid #FDBF4E;
    font-weight: 700;
}
a:hover {
    color: #337def;
}
a:after {
    content: '';
    height: 3px;
    width: 0;
    position: absolute;
    bottom: -3px;
    left: 0;
    background: #337def;
    border-radius: 100px;
    transition: .5s;
    z-index: 11;
}
a:hover:after {
    width: 100%;
}
@media screen and (max-width: 476px) {
    nav {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        gap: 5px;
        position: relative;
    }
    nav img{
        position: relative;
        width: 150px;
    }
}
</style>



module.export = NavbarComponent;
export default NavbarComponent;