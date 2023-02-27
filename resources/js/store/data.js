import { defineStore } from "pinia";


export const useDataStore = defineStore('data', {
    state: () => ({
        destionation: [
            {
                tag: 'Museum',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1648709900_1.jpg',
                name: 'Museum Pendidikan Surabaya',
                address: 'Jl. Genteng Kali No. 10'
            },
            {
                tag: 'Museum',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1648710891_1.jpg',
                name: 'Museum Olahraga Surabaya',
                address: 'Jl. Indragiri No.6, Gelora Pancasila'
            },
            {
                tag: 'Museum',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652779387_1.jpg',
                name: 'Gedung Nasional Indonesia (GNI) & Museum Dr. Soetomo',
                address: 'JL Bubutan no 85 - 87'
            },
            {
                tag: 'Museum',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652779620_1.jpg',
                name: 'Museum Blockbuster',
                address: 'Jl. Raya Kenjeran 463-465'
            },
            {
                tag: 'Museum',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652777982_1.jpg',
                name: 'Monumen Kapal Selam',
                address: 'Jl. Pemuda no. 39'
            },
            {
                tag: 'Kuliner',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1653019735_1.jpg',
                name: 'G Walk Citraland',
                address: 'Ruko Taman Gapura Jl. Niaga Gapura'
            },
            {
                tag: 'Kuliner',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1654139851_1.jpg',
                name: 'Sentra Ikan Bulak',
                address: 'Jl. Sukolilo 7 no.24, Surabaya'
            },
            {
                tag: 'Taman',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1654137105_1.jpg',
                name: 'Taman Bungkul',
                address: 'Jl. Taman Bungkul, Darmo'
            },
            {
                tag: 'Taman',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1648713405_1.jpg',
                name: 'Kebun Binatang Surabaya',
                address: 'Jl. Setail No. 1, Darmo, Wonokromo'
            },
            {
                tag: 'Taman',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1654136213_1.jpg',
                name: 'Taman Hiburan Pantai (THP) Kenjeran',
                address: 'Jl. Pantai Lama Kenjeran no. 1'
            },
            {
                tag: 'Sport',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652844832_1.jpg',
                name: 'Stadion Gelora Bung Tomo (GBT)',
                address: 'Benowo, Pakal, Surabaya'
            },
            {
                tag: 'Sport',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652844613_1.jpg',
                name: 'Lapangan Hockey - Softball',
                address: 'Jl. Lap. Dharmawangsa no. 56'
            },
            {
                tag: 'Sport',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652844761_1.jpg',
                name: 'Gelora Pancasila',
                address: 'Jl. Indragiri no. 6'
            },
            {
                tag: 'Cagar Budaya',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1654761532_1.jpg',
                name: 'Gereja Katolik Kelahiran Santa Perawan Maria',
                address: 'Jl. Kepanjen 4-6'
            },
            {
                tag: 'Cagar Budaya',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1655198364_1.jpg',
                name: 'Jembatan Merah Arcade',
                address: 'Jl. Jembatan Merah 2'
            },
            {
                tag: 'Cagar Budaya',
                imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1655194124_1.jpg',
                name: 'Makam Al Habib Muhammad Bin Idrus Al Habsyi',
                address: 'Jl. Ampel Gubah Lor'
            },
        ]
    })
})