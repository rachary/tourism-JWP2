<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\DestinationImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Make Destination 1
         */
        $destination1 = Destination::create(
            [
                'name' => 'Museum Pendidikan Surabaya',
                'address' => 'Jl. Genteng Kali No. 10',
                'description' => 'Museum Pendidikan Surabaya merupakan museum tematik yang didirikan sebagai langkah pelestarian sejarah dan budaya bangsa dengan tujuan untuk mendukung kegiatan edukasi, riset dan rekreasi di Kota Surabaya. Diresmikan oleh Walikota Surabaya Tri Rismaharini pada 25 November 2019. yang menyimpan bukti materiil Pendidikan pada masa Pra-Aksara, Masa Klasik, Masa Kolonial dan Masa Kemerdekaan. Berlokasi di Jalan Genteng Kali No 10 Surabaya yang merupakan EX Sekolah Taman siswa. 
                ZONA MASA PRA-AKSARA Zona Pendidikan di era ini mungkin terlihat sangat sederhana dan mendasar, tapi juga mengajarkan salah satu esensi paling utama pengetahuan yang tetap relevan hingga era kini yaitu bertahan hidup. Didalam zona ini terdapat koleksi Manuskrip Kuno Era1800-an , Manuskrip berbahan dasar Lontar dan Diorama Pra Aksara (Manusia Purba) 
                ZONA KERAJAAN Pada zona ini Pengaruh dan corak dari luar nusantara yang berasimilasi dengan elemen lokal menjadikan pendidikan di era ini menjadi sangat dinamis dan menarik dibanding sebelumnya. Berbagai ajaran agama dan pengetahuan yang disebarkan inipun memiliki jenis aksara yang masing-masing. 
                ZONA KOLONIAL Pada Pendidikan masa ini menceritakan tentang Pendidikan era Kolonial Belanda dan Jepang. Koleksi terkait zona Kolonial ini meliputi Sepeda Guru. Sepeda Zundapp untuk pendampingan Orang tua mengantar siswa berangkat Sekolah dsb.
                ZONA KEMERDEKAAN. Pada Zona Kemerdekaan ini menampilkan Koleksi –koleksi terkait benda bukti materiil peradaban periodisasi tahun 1945 – 1990an.
                ',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.864931359601!2d112.74075841427921!3d-7.256209373298641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9308aaf797d%3A0xde33a60013bfd725!2sMuseum%20Pendidikan%20Surabaya!5e0!3m2!1sen!2sid!4v1678243279588!5m2!1sen!2sid',
                'destination_region_id' => 1,
            ]
        );
        $destinationImage1 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648709900_1.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648709900_2.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648709900_3.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648709900_4.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648709900_5.jpg']),
        ];

        $destination1->destinationTags()->attach([3]);
        $destination1->destinationImages()->saveMany($destinationImage1);

        /**
         * Make Destination 2
         */
        $destination2 = Destination::create(
            [
                'name' => 'Kebun Binatang Surabaya',
                'address' => 'Jl. Setail No. 1, Darmo, Wonokromo',
                'description' => 'Kebun binatang Surabaya selalu menjadi favorit untuk wisata rekreasi keluarga dan wisata edukasi untuk anak-anak di setiap akhir pekan. Kebun Binatang Surabaya merupakan salah satu kebun binatang yang populer di Indonesia dan terbesar se Asia Tenggara. Kebun Binatang Surabaya pernah menjadi kebun binatang dengan satwa terlengkap. 
                Menikmati akhir pekan bersama keluarga dengan berekreasi sambil mengenal ratusan jenis hewan dan mengamati tingkah polah hewan tersebut adalah sesuatu yang menyenangkan untuk siapa saja. Bahkan kita bisa berinteraksi seperti memberi makan atau menaiki gajah. 
                Kebun Binatang Surabaya berlokasi di lingkungan yang asri dan rindang dengan pohon-pohon besar. Selain sebagai tempat edukasi, juga merupakan kawasan konservasi sekaligus Hutan Kota. Kebun Binatang Surabaya ini juga terkenal karena di depannya terdapat patung Surabaya, patung Hiu dan Buaya yang merupakan lambang kota Surabaya.
                <br>
                Jam Buka : 08.00 - 16.00 WIB
                Tiket : Rp. 15000 (weekday & weekend)
                Website : https://www.surabayazoo.co.id/
                ',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.514450651231!2d112.73442071427964!3d-7.295949273741846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb97917c2fad%3A0x21b1122d5fe174cc!2sSurabaya%20Zoo!5e0!3m2!1sen!2sid!4v1678260749808!5m2!1sen!2sid',
                'destination_region_id' => 3,
            ]
        );
        $destinationImage2 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648713405_1.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648713405_2.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648713405_3.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648713405_4.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648713405_5.jpg']),
        ];

        $destination2->destinationTags()->attach([6, 7]);
        $destination2->destinationImages()->saveMany($destinationImage2);

        /**
         * Make Destination 3
         */
        $destination3 = Destination::create(
            [
                'name' => 'Pasar Genteng',
                'address' => 'Jl. Genteng Besar',
                'description' => 'Pasar Genteng terletak di Jl. Genteng Besar. Disinilah pusat oleh-oleh berupa kue kering dan berbagai macam kerupuk serta makanan kecil lainnya. Kota Surabaya Genteng Market is located on Jl. Genteng Besar. This is the center of souvenirs in the form of cookies and various kinds of crackers and other snacks. Surabaya has a lot of seafood SURABAYA CULTURAL AND TOURISM DEPARTMENT 171 memiliki banyak sekali makanan hasil laut se- perti kerupuk udang dan makanan hasil laut lainnya. Selain itu jajanan klasik zaman nenek kita masih dijumpai di sini. Kebanyakan produsennya berasal dari Pasuruan, Sidoarjo, dan Gresik. Pasar Genteng me- rupakan pasar tradisional yang menjual aneka kebutuhan sehari-hari serta pusat penjualan barang elektronik. Sedangkan pusat oleh-olehnya justru terdapat di sekitar pasar. Di sebelah kanan dan depan pasar, terdapat deretan toko yang menjual aneka makanan sebagai oleh-oleh, mulai dari ke- rupuk, sambal petis, dan beragam makanan lainnya. Beberapa toko yang menjual aneka oleh-oleh di Jl. Genteng Besar ini adalah Toko Bhek, Bhek Putra, Panen Raya, dan Ana (seberang pasar).',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8545312126785!2d112.74076335265511!3d-7.257391729072909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f967bc2840f5%3A0x76998d21b6d5f249!2sPs.%20Genteng%20Baru%20Surabaya%2C%20Genteng%2C%20Kec.%20Genteng%2C%20Kota%20SBY%2C%20Jawa%20Timur!5e0!3m2!1sen!2sid!4v1678261764629!5m2!1sen!2sid',
                'destination_region_id' => 4,
            ]
        );
        $destinationImage3 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1648714823_1.jpg']),
        ];

        $destination3->destinationTags()->attach([5]);
        $destination3->destinationImages()->saveMany($destinationImage3);

        /**
         * Make Destination 4
         */
        $destination4 = Destination::create(
            [
                'name' => 'Gelora 10 Nopember',
                'address' => 'JL. Tambaksari',
                'description' => 'Stadion Gelora 10 Nopember (G10N) atau Stadion Tambaksari adalah stadion multi-use. Stadion kebanggaan arek - arek Suroboyo yang di sebut bonek mania ini lebih sering digunakan untuk menggelar latihan sepak bola. Stadion ini berkapasitas untuk 35.000 orang, dulu merupakan markas dari tim besar Surabaya, Persebaya Surabaya. Stadion ini di bangun saat hari perjuangan indonesia 10 november 1945, dan diresmikan bernama Gelora 10 November.',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.903360186316!2d112.75409811427929!3d-7.251838873250101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f963d2d4fb4d%3A0x1985463aec066f1a!2sGelora%2010%20November%20Stadium!5e0!3m2!1sen!2sid!4v1678261984767!5m2!1sen!2sid',
                'destination_region_id' => 5,
            ]
        );
        $destinationImage4 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1677056840_1.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1677056840_2.jpg']),
        ];

        $destination4->destinationTags()->attach([2]);
        $destination4->destinationImages()->saveMany($destinationImage4);

        /**
         * Make Destination 5
         */
        $destination5 = Destination::create(
            [
                'name' => 'Taman Lansia',
                'address' => 'Jl. Kalimantan no. 12, Gubeng',
                'description' => 'Surabaya telah memiliki Taman Lanjut Usia atau Taman Lansia. Area yang dimanfaatkan sebagai taman alternatif untuk para lanjut usia ini berlokasi di Jalan Kalimantan dan memiliki area seluas kurang lebih 2000m² eks SPBU Kalimantan. Keunikan taman ini adalah : tersedia track yang dibuat khusus untuk kenyamanan kursi roda untuk lansia, ada pula tempat duduk untuk penghantar saat menemani para lansia menikmati suasana kota, ada air mancur dan berbagai macam jenis tanaman yang indah.',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7369161331767!2d112.7458438156579!3d-7.270749659110943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd9ef067949%3A0x502e4c4d80a5271a!2sTaman%20Lansia%20Surabaya!5e0!3m2!1sen!2sid!4v1678262205797!5m2!1sen!2sid',
                'destination_region_id' => 2,
            ]
        );
        $destinationImage5 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1677039604_1.jpg']),
        ];

        $destination5->destinationTags()->attach([1, 6]);
        $destination5->destinationImages()->saveMany($destinationImage5);

        /**
         * Make Destination 6
         */
        $destination6 = Destination::create(
            [
                'name' => 'Taman Mozaik',
                'address' => 'Jalan Wiyung Praja, Wiyung',
                'description' => 'Destinasi wisata rekreasi berupa taman aktif di Surabaya berada di Jalan Wiyung Praja Surabaya. Taman Mozaik memiliki konsep berupa taman rekreasi aktif yang bertema mozaik warna warni. Aksen utama taman adalah keberadaan rumah berdinding mozaik berwarna-warni. Di taman ini pengunjung dapat memanfaatkan rumah mozaik tersebut untuk berswafoto sebagai latar belakangnya. Taman Mozaik ini memiliki luas lahan total 5100 meter persegi.',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3468722778475!2d112.68776501427999!3d-7.314874573953803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fd0d9be2bb81%3A0x95eabfcee4bd8013!2sTaman%20Mozaik!5e0!3m2!1sen!2sid!4v1678564271227!5m2!1sen!2sid',
                'destination_region_id' => 3,
            ]
        );
        $destinationImage6 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1654138693_1.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1654138693_2.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1654138693_3.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1654138693_4.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1654138693_5.jpg']),
        ];

        $destination6->destinationTags()->attach([1]);
        $destination6->destinationImages()->saveMany($destinationImage6);

        /**
         * Make Destination 7
         */
        $destination7 = Destination::create(
            [
                'name' => 'Museum Blockbuster',
                'address' => 'Jl. Raya Kenjeran 463-465',
                'description' => 'Museum Blockbuster berdiri pada tahun 2018 dan memiliki lebih dari 3000 koleksi yang semuanya merupakan barang langka dan limited edition. Terdiri dari action figure, diorama, statue, movie props, koleksi boneka dan mainan lainnya.',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.939302658181!2d112.77738401427914!3d-7.247748773204653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f92a3fda62c3%3A0x571a8893dca24a3c!2sBlockbuster%20Museum%20Surabaya!5e0!3m2!1sen!2sid!4v1678564610693!5m2!1sen!2sid',
                'destination_region_id' => 4,
            ]
        );
        $destinationImage7 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1652779620_1.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1652779620_2.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1652779620_3.jpg']),
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1652779620_4.jpg']),
        ];

        $destination7->destinationTags()->attach([3]);
        $destination7->destinationImages()->saveMany($destinationImage7);

        /**
         * Make Destination 8
         */
        $destination8 = Destination::create(
            [
                'name' => 'Golf Graha Family',
                'address' => 'Jl. Raya Gold Graha Famili, Pradahkalikendal',
                'description' => 'Golf Graha Family berstandar internasional dengan lokasi yang sangat strategis yaitu berada dekat dengan kompleks perumahan dan pusat perbelanjaan. Dibangun pada tahun 1995, Golf Graha Family memiliki 18 hole dengan par 72 dan panjang 6.210 meter didukung oleh deretan pohon palem, sungai, danau, kontur lahan berbukit dan berlembah, bunker beragam ukuran, dan beberapa jembatan serta pemandangan yang asri.',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5158107396073!2d112.68303261427968!3d-7.295795473740112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc41180377d5%3A0x61267b31fea67129!2sGolf%20Graha%20Famili!5e0!3m2!1sen!2sid!4v1678564765802!5m2!1sen!2sid',
                'destination_region_id' => 2,
            ]
        );
        $destinationImage8 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1676969326_1.jpg']),
        ];

        $destination8->destinationTags()->attach([2]);
        $destination8->destinationImages()->saveMany($destinationImage8);

        /**
         * Make Destination 9
         */
        $destination9 = Destination::create(
            [
                'name' => 'Kawasan Kaki Jembatan Suramadu',
                'address' => 'Jl. Kedungcowek',
                'description' => 'Jembatan Suramadu memiliki panjang 5.438m yang menghubungkan Pulau Jawa dan Pulau Madura. Dibangun pada 10 Juni 2009 dan menjadi salah satu ikon Jawa Timur. Jembatan ini berada di Kota Surabaya dengan daya Tarik wisata yang khas. Di sekitar kaki jembatan terdapat taman yang dilengkapi dengan jogging track dan playground. Menikmati pemandangan laut di pagi hari dari sini juga sangat menarik sambil olahraga atau sekedar jalan-jalan. 

                Di malam hari suasana tak kalah menarik dengan pemandangan jembatan yang berhiaskan lampu warna-warni. Bila beruntung dapat dijumpai para atlet ski air dan olahraga lainnya di laut sekitaran Jembatan Suramadu.',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31666.581056219973!2d112.76590631084376!3d-7.203983848740364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f843a29615f7%3A0x5c5fa161892c2cb9!2sCafe%20Bawah%20Jembatan%20Suramadu!5e0!3m2!1sen!2sid!4v1678565035816!5m2!1sen!2sid',
                'destination_region_id' => 4,
            ]
        );
        $destinationImage9 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1677035424_1.jpg']),
        ];

        $destination9->destinationTags()->attach([6, 7]);
        $destination9->destinationImages()->saveMany($destinationImage9);

        /**
         * Make Destination 10
         */
        $destination10 = Destination::create(
            [
                'name' => 'Pasar Bunga Bratang',
                'address' => 'Jl. Bratang Binangun',
                'description' => 'Di sini menyimpan potensi wisata yang menarik dikunjungi. Sebab di Pasar Bratang memiliki dua ciri khas, yakni dikenal sebagai pasar burung, juga terkenal sebagai pasar bunga. Karena itu, Pasar Bratang ini kadang ada yang menyebutnya Pasar Burung Bratang, ada pula yang mengatakan Pasar Bunga Bratang. Pasar Bratang ini sudah berdiri sejak 1980-an.',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.4969084389077!2d112.75829031427962!3d-7.297932673764042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbad0fa91663%3A0x6df8cf5c70a06488!2sToko%20Bunga%20Ayu!5e0!3m2!1sen!2sid!4v1678565231407!5m2!1sen!2sid',
                'destination_region_id' => 5,
            ]
        );
        $destinationImage10 = [
            new DestinationImage(['filename' => 'https://tourism.surabaya.go.id/storage/tour/1677042764_1.jpg']),
        ];

        $destination10->destinationTags()->attach([5]);
        $destination10->destinationImages()->saveMany($destinationImage10);
    }
}
