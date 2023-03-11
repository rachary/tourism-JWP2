<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Make Event 1
         */
        $event1 = Event::create(
            [
                'name' => 'Haul Sunan Ampel',
                'address' => 'Masjid Ampel, Jl. Ampel Masjid No.53, Ampel, Kec. Semampir, Kota SBY, Jawa Timur 60151',
                'description' => 'Peringatan Hari Lahir Sunan Ampel diadakan di kawasan Wisata Religi Ampel, khususnya di Masjid Ampel. Kegiatan utamanya berisikan pengajian, dzikir akbar dan ceramah keagamaan.',
                'time' => '16:00 - 24:00',
                'organizer' => 'Takmir Masjid Ampel',
                'date_start' => '2023-03-10',
                'date_end' => '2023-03-12',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.0921475639275!2d112.74071721427897!3d-7.230329973011482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f91efa3adcf5%3A0x4ac77d73635f2c5b!2sSunan%20Ampel%20Great%20Mosque!5e0!3m2!1sen!2sid!4v1678269473268!5m2!1sen!2sid',
            ]
        );
        $eventImage1 = [
            new EventImage(['filename' => 'https://tourism.surabaya.go.id/storage/event/Haul%20Sunan%20Ampel_1_1678249864.jpg']),
        ];
        $event1->eventImages()->saveMany($eventImage1);

        /**
         * Make Event 2
         */
        $event2 = Event::create(
            [
                'name' => 'International Cat Show',
                'address' => 'Chameleon Hall TP 6 lantai 5, Jl. Jenderal Basuki Rachmat No.8-12, Kedungdoro, Kec. Tegalsari, Kota SBY, Jawa Timur 60261',
                'description' => 'Buat pecinta kucing, bisa menyaksikan perlombaan kucing tingkat internasional pada event kali ini. Bermacam-macam kuring berbagai ras dilombakan untuk memenangkan kucing terbaiknya. Lokasi event ini berada di Chameleon Hall TP 6 lantai 5.',
                'time' => '10:00',
                'organizer' => 'Tunjungan Plaza',
                'date_start' => '2023-05-01',
                'date_end' => '2023-05-31',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.806001459774!2d112.73603201427942!3d-7.262906373373159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f95e108af9a5%3A0x317237a3a740db23!2sChameleon%20Hall%20tunjungan%20plaza%206!5e0!3m2!1sen!2sid!4v1678271771493!5m2!1sen!2sid',
            ]
        );
        $eventImage2 = [
            new EventImage(['filename' => 'https://tourism.surabaya.go.id/storage/event/International%20Cat%20Show_1_1675819177_1.jpg']),
        ];
        $event2->eventImages()->saveMany($eventImage2);

        /**
         * Make Event 3
         */
        $event3 = Event::create(
            [
                'name' => 'Festival Rujak Uleg 2023',
                'address' => 'Jalan Kembang Jepun',
                'description' => 'Rujak Cingur adalah makanan tradisional khas Surabaya yang telah ditetapkan sebagai salah satu Warisan Budaya Tak Benda (WBTB) pada tahun 2021. Dan Festival Rujak Uleg adalah event tahunan yang digelar di sepanjang Jalan Kembang Jepun oleh Pemerintah Kota Surabaya. Diikuti lebih dari 1500 peserta yang mengenakan beraneka kostum saat menguleg rujak bersama menjadi daya tarik wisata yang khas yang hanya dapat dijumpai di Kota Surabaya. Ayo datang dan nikmati kemeriahannya!',
                'time' => '16:00',
                'organizer' => 'Dinas Kebudayaan, Kepemudaan dan Olahraga serta Pariwisata',
                'date_start' => '2023-05-06',
                'date_end' => '2023-05-06',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.0921475639275!2d112.74071721427897!3d-7.230329973011482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f91efa3adcf5%3A0x4ac77d73635f2c5b!2sSunan%20Ampel%20Great%20Mosque!5e0!3m2!1sen!2sid!4v1678269473268!5m2!1sen!2sid',
            ]
        );
        $eventImage3 = [
            new EventImage(['filename' => 'https://tourism.surabaya.go.id/storage/event/Festival%20Rujak%20Uleg%202023_1_1675835208.jpg']),
            new EventImage(['filename' => 'https://tourism.surabaya.go.id/storage/event/Festival%20Rujak%20Uleg%202023_2_1675835208.jpg']),
        ];
        $event3->eventImages()->saveMany($eventImage3);

        /**
         * Make Event 4
         */
        $event4 = Event::create(
            [
                'name' => 'Lomba Perahu Layar',
                'address' => 'Taman Hiburan Pantai Kenjeran, Jalan Pantai Kenjeran Lama, Bulak, Surabaya 60121',
                'description' => 'Lomba Perahu Layar diadakan di Pantai Kenjeran setiap satu tahun sekali. Para peserta mempercantik perahunya dengan kreasi corak layar warna-warni yang beraneka. Tahun ini dipilih bulan Mei dengan jadwal tentative menyesuaikan kondisi cuaca dan angin.',
                'time' => '06:00',
                'organizer' => 'Dinas Kebudayaan, Kepemudaan dan Olahraga serta Pariwisata Kota Surabaya',
                'date_start' => '2023-05-01',
                'date_end' => '2023-05-31',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.0243650880716!2d112.79341241427898!3d-7.2380598730970975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9c4f53b233f%3A0x147a117a35d5f080!2sKenjeran%20Park!5e0!3m2!1sen!2sid!4v1678272083650!5m2!1sen!2sid',
            ]
        );
        $eventImage4 = [
            new EventImage(['filename' => 'https://tourism.surabaya.go.id/storage/event/Lomba%20Perahu%20Layar_1_1675835462_1.jpg']),
        ];
        $event4->eventImages()->saveMany($eventImage4);

        /**
         * Make Event 5
         */
        $event5 = Event::create(
            [
                'name' => 'Surabaya Fashion Parade',
                'address' => 'Jl. Jenderal Basuki Rachmat No.8-12, Kedungdoro, Kec. Tegalsari, Kota SBY, Jawa Timur 60261',
                'description' => 'Fashion show yang menampilkan busana - busana yang dirancang oleh para designer dari berbagai daerah di Indonesia juga dari luar negeri. Event ini berlokasi di Atrium TP 3 dan Convention Hall TP 3 lantai 6.',
                'time' => '16:00',
                'organizer' => 'Tunjungan Plaza',
                'date_start' => '2023-08-01',
                'date_end' => '2023-08-31',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.806001459774!2d112.73603201427942!3d-7.262906373373159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f95e108af9a5%3A0x317237a3a740db23!2sChameleon%20Hall%20tunjungan%20plaza%206!5e0!3m2!1sen!2sid!4v1678271771493!5m2!1sen!2sid',
            ]
        );
        $eventImage5 = [
            new EventImage(['filename' => 'https://tourism.surabaya.go.id/storage/event/Surabaya%20Fashion%20Parade%202023_1_1675923933_1.jpg']),
        ];
        $event5->eventImages()->saveMany($eventImage5);

        /**
         * Make Event 6
         */
        $event6 = Event::create(
            [
                'name' => 'Panahan Tradisional',
                'address' => 'Lapangan Mulyorejo, Surabaya, 60115',
                'description' => 'Lomba Panahan Tradisional merupakan jenis olahraga tradisional berasal dari Jawa dengan nama Jemparingan. Lomba ini diselenggarkan berskala Internasional dan diikuti dari beberapa negara dari Asia Tenggara. Lomba panahan ini memiliki beberapa kategori yang dilombakan dan diikuti peserta dari berbagai usia.',
                'time' => '10:00',
                'organizer' => 'Dinas Kebudayaan, Kepemudaan dan Olahraga serta Pariwisata Kota Surabaya',
                'date_start' => '2023-08-12',
                'date_end' => '2023-08-13',
                'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.818903432028!2d112.78212751427934!3d-7.261440673356864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f99e9c783fa9%3A0x76ddaa709a14bfcf!2slapangan%20mulyorejo!5e0!3m2!1sen!2sid!4v1678565647589!5m2!1sen!2sid',
            ]
        );
        $eventImage6 = [
            new EventImage(['filename' => 'https://tourism.surabaya.go.id/storage/event/Panahan%20Tradisional_1_1675922907_1.jpeg']),
        ];
        $event6->eventImages()->saveMany($eventImage6);
    }
}
