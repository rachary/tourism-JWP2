<template>
    <section id="home" class="hero">
        <video autoplay muted loop>
            <source src="https://tourism.surabaya.go.id/assets/front/videos/surabaya.mp4">
        </video>
        <div class="wrap">
            <div class="container">
                <h2 class="sub-headline">You will love every corner of it</h2>
                <h1 class="headline">Wisata Surabaya</h1>
                <div class="headline-description">
                    <div class="separator">
                        <div class="line line-left"></div>
                        <div class="asterisk"><fa-icon icon="fa-solid fa-asterisk" /></div>
                        <div class="line line-right"></div>
                    </div>
                    <div class="single-animation">
                        <h5>Let's explore one of the biggest city in Indonesia with famous name called City of Heroes.</h5>
                        <a href="#beauty-of-surabaya" class="btn btn-cta">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="beauty-of-surabaya" class="beauty">
        <div class="wrap">
            <div class="beauty-info">
                <div class="beauty-description padding-right animate-left">
                    <div class="global-headline">
                        <h2 class="sub-headline">Beauty of</h2>
                        <h1 class="headline headline-second">Surabaya</h1>
                    </div>
                </div>
                <div class="beauty-box">
                    <div class="beauty-card">
                        <div class="card-img">
                            <img src="https://cdn0-production-images-kly.akamaized.net/hulauwuEHBRwulpomyqNYAQ-8e8=/640x853/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3000653/original/064636000_1576738759-73398065_2524026567685035_6452119119050789649_n.jpg" alt="">
                        </div>
                        <div class="card-title"></div>
                        <button class="btn"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section></section>
    <section></section>
</template>

<script setup>

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
    font-size: 2.5rem;
    transform: translateY(20%);
    letter-spacing: .09rem;
    pointer-events: none;
}

.first-letter {
    font-family: 'Beau Rivage', cursive;
    font-size: 4rem;
}

.headline {
    text-transform: uppercase;
    font-size: 3rem;
    letter-spacing: .5rem;
    pointer-events: none;
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
</style>