<template>
    <footer>
        <div class="wrap">
            <div class="container">
                <div class="card">
                    <h5>Find Us</h5>
                    <div class="fill card-first">
                        <p>Tourism Information Center</p>
                        <p>Jl. Gubernur Suryo 15</p>
                        <a href="https://goo.gl/maps/NT8Xcf8kQrnw5tHS6" target="_blank" class="map">
                            <fa-icon icon="fa-solid fa-location-dot"/>
                            <p>Lihat di Google Map</p>
                        </a>
                    </div>
                    <div class="fill card-first">
                        <p>Dinas Kebudayaan, Kepemudaan dan Olahraga serta Pariwisata Kota Surabaya</p>
                        <p>Jl. Tunjungan No. 1-3</p>
                        <a href="https://goo.gl/maps/rpFhcfQqjhfbQAbEA" target="_blank" class="map">
                            <fa-icon icon="fa-solid fa-location-dot"/>
                            <p>Lihat di Google Map</p>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <h5>Other Sites</h5>
                    <div class="fill card-second">
                        <a href="https://disbudporapar.surabaya.go.id/" target="_blank">Disbudporapar Surabaya</a>
                        <a href="https://virtualtourism.surabaya.go.id/" target="_blank">360&deg; Surabaya</a>
                        <a href="https://tiketwisata.surabaya.go.id" target="_blank">Tiket Wisata Surabaya</a>
                        <a href="https://ka-mus.surabaya.go.id" target="_blank">Katalog Museum Surabaya</a>
                        <a href="https://twitter.com/banggasurabaya" target="_blank">Bangga Surabaya</a>
                    </div>
                </div>
                <div class="card">
                    <h5>Contact</h5>
                    <div class="fill card-third">
                        <a href="tel:+62315318409" class="card-third-fill">
                            <fa-icon icon="fa-solid fa-phone" />
                            <p>031-5318409</p>
                        </a>
                        <a href="mailto:disbudporapar@surabaya.go.id" class="card-third-fill">
                            <fa-icon icon="fa-solid fa-envelope" />
                            <p>disbudporapar@surabaya.go.id</p>
                        </a>
                        <a href="https://www.instagram.com/surabayasparkling" target="_blank" class="card-third-fill">
                            <fa-icon icon="fa-brands fa-instagram" />
                            <p>@surabayasparkling</p>
                        </a>
                        <a href="https://twitter.com/TICSby" target="_blank" class="card-third-fill">
                            <fa-icon icon="fa-brands fa-twitter" />
                            <p>@TICSby</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</template>

<style scoped>
footer {
    width: 100%;
    position: absolute;
    z-index: 10;
    background: lightblue;
    margin-top: 2rem;
    padding: 1rem 0 2rem 0;
}

.container {
    display: flex;
    justify-content: space-between;
    gap: 5rem;
}

.card {
    flex: 1;
}
.card:nth-child(2) {
    margin-left: 5rem;
}
.card h5 {
    margin-bottom: 1rem;
    font-size: 1.6rem;
    letter-spacing: 1px;
}
.fill {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.card-first {
    gap: 0
}
.map {
    background: white;
    border-radius: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: .5rem;
    padding: .225rem 0;
}
.card-first:last-child {
    margin-top: 1.5rem;
}
.card-second > a {
    width: fit-content;
}
.card-third-fill {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.card-third > a {
    width: fit-content;
}
</style>