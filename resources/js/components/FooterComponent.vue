<template>
    <footer style="width:100%;margin-top:50px;">
        <div style="max-width:100%;width:fit-content;background:#6868AC;position:absolute;padding:20px 70px;color:white;">
            <ul style="display:flex;flex-wrap:wrap;gap:10px;list-style:none">
                <li style="flex:15%">
                    <h5>FIND US</h5>
                    <h6>Tourism Information Center</h6>
                    <p>Jl. Gubernur Suryo 15</p>
                    <div style="padding: 4px 8px;margin:3px 0;background:white;width:fit-content;font-weight:700;font-size:14px;border-radius:4px;">
                        <a style="text-decoration:none;color:#6868AC;" href="">
                        <span><fa-icon icon="fa-solid fa-phone"/></span> Kontak Kami
                        </a>
                    </div>
                    
                    <div class="social" style="font-size:28px;">
                        <a href="#"><fa-icon icon="fa-brands fa-facebook"/></a>
                        <a style="margin-left:10px;" href="#"><fa-icon icon="fa-brands fa-instagram"/></a>
                    </div>
                </li>
                <li style="flex:35%">
                    <h5>CONTACT US</h5>
                    <h6>Dinas Kebudayaan, Kepemudaan dan Olahraga serta Pariwisata Kota Surabaya Kota Surabaya</h6>
                    <div style="display:flex;flex-direction:column;align-items:flex-start;justify-content:center;text-align:left;gap:5px;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:20px;">
                            <fa-icon class="icon" icon="fa-solid fa-location-dot"/>
                            <p>Jl. Tunjungan No.1-3 Kelurahan Genteng Kecamatan Genteng, Kota Surabaya Jawa Timur, Indonesia, 60275</p>
                        </div>
                        <div style="display:flex;align-items:center;justify-content:center;gap:15px;">
                            <fa-icon class="icon" icon="fa-solid fa-phone"/>
                            <p>031-5318409</p>
                        </div>
                        <div style="display:flex;align-items:center;justify-content:center;gap:15px;">
                            <fa-icon class="icon" icon="fa-solid fa-envelope"/>
                            <p>disbudporapar@surabaya.go.id</p>
                        </div>
                    </div>
                </li>
                <li style="flex:20%">
                    <h5>OUR OTHER SITES</h5>
                    <ul class="other">
                        <li>
                            <a href="">Disbudporapar Surabaya</a>
                        </li>
                        <li>
                            <a href="">360&deg; Surabaya</a>
                        </li>
                        <li>
                            <a href="">Tiket Wisata Surabaya</a>
                        </li>
                        <li>
                            <a href="">Katalog Museum Surabaya</a>
                        </li>
                        <li>
                            <a href="">Bangga Surabaya</a>
                        </li>
                        
                    </ul>
                </li>
                <li style="flex:25%">
                    <div style="display:flex;flex-direction:column;align-items:center;">
                        <h5>WISATA SURABAYA</h5>
                        <img style="height:200px;" src="\public\surabaya.png" alt="">
                    </div>
                </li>
                
            </ul>
        </div>
    </footer>
</template>

<style scoped>
ul li h5 {
    font-size: 18px;
    color: white;
    font-weight: 300;
    margin: 10px 0;
}
ul li h6 {
    margin-top: 5px;
    font-size: 16px;
    font-weight: 300;
}
ul li p {
    font-size: 15px;
    margin-top: 5px;
}
.icon {
    position: relative;
    top: 3px;
}
.social a {
    color: white;
}
.social a:hover {
    color: #FDBF4E;
}
.other {
    list-style: none;
}
.other li {
    margin-top: 10px;
}
.other li a {
    color:white;
    text-decoration: none;
    
}
</style>

module.export = FooterComponent