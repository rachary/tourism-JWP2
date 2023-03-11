<template>
    <div class="wrap">
            <div class="header">
                INI DESTINASI DASHBOARD
            </div>
        <div class="wrapper">
            <div>
                <div>
                    <button class="btn" @click="refDestinationAdd.open(regions, tags)">
                        <fa-icon class="icon" icon="fa-solid fa-plus"></fa-icon>
                        <p>Destinasi</p>
                    </button>
                </div>
                <app-table-component>
                    <template #head>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <!-- <th>Lokasi</th> -->
                        <th>Tag</th>
                        <th>Image</th>
                        <th>Action</th>
                    </template>
                    <tr v-for="(destination, index) in destinations" :key="destination.id">
                        <td>{{ index+1 }}</td>
                        <td class="width8rem">{{ destination.name }}</td>
                        <td class="width8rem">
                            <p>{{ destination.address }}</p>
                        </td>
                        <td class="ellipsis width12rem">
                            <p>{{ destination.description }}</p>
                        </td>
                        <!-- <td class="cta width8rem">
                            <iframe class="mappreview" :src="destination.location" frameborder="0" ></iframe>
                        </td> -->
                        <td class="width8rem">
                            <div class="tagbox">
                                <div class="tagpreview" v-for="tag in destination.destination_tags">
                                        {{ tag.name }}
                                </div>
                            </div>
                        </td>
                        <td class="width12rem">
                            <div class="imgbox">
                                <img class="imgpreview" v-for="image in destination.destination_images"  :src="image.filename" alt="">
                            </div>
                        </td>
                        <td class="cta mid">
                            <button @click="refDestinationUpdate.open(destination)">
                                <fa-icon class="icon" icon="fa-solid fa-pen-to-square"></fa-icon>
                            </button>
                            <button v-if="role == 1" class="margin-left" @click="deleteDestination(destination.id)">
                                <fa-icon class="icon" icon="fa-solid fa-trash"></fa-icon>
                            </button>
                        </td>
                    </tr>
                </app-table-component>
            </div>
            <div>
                <destination-update-view ref="refDestinationUpdate" @updated="destinationUpdated"/>
            </div>
            <destination-add-view ref="refDestinationAdd" @created="users.push($event)"/>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import AppTableComponent from '../../components/AppTableComponent.vue';
import DestinationAddView from './DestinationAddView.vue';
import DestinationUpdateView from './DestinationUpdateView.vue';
import api from '../../functions/api'

const refDestinationUpdate = ref()
const refDestinationAdd = ref()
const loading = ref(false)
const destinations = ref([])
const regions = ref([])
const tags = ref([])
const role = ref('')

const getUserRole = () => {
    role.value = localStorage.getItem('userrole')
}

const getDestinationRegions = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/destination/region')
        regions.value = response.data
    } finally {
        loading.value = false
    }
}

const getDestinationTags = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/destination/tag')
        tags.value = response.data
    } finally {
        loading.value = false
    }
}

const getDestinations = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/destination')
        destinations.value = response.data
    } finally {
        loading.value = false
    }
}

const destinationUpdated = (data) => {
    destinations.value = destinations.value.map(destination => {
        if (destination.id === data.id) {

        }

        return destination
    })
}

const deleteDestination = async (id) => {
    loading.value = true
    try {
        const response = await api.DELETE(`/api/destination/${id}`)
        destinations.value = destinations.value.filter(i => i.id !== id)
        alert('Destinasi Berhasil dihapus')
    } catch (error) {
        alert('Gagal Hapus Destinasi')
    } finally {
        loading.value = false
        getDestinations()
    }
}

getUserRole()
getDestinationRegions()
getDestinationTags()
getDestinations()

</script>

<style scoped>
.wrap {
    padding: 0;
}
.header {
    background: #66C18C;
    color: #F8F4EA;
    margin-bottom: .225rem;
    height: 10vh;
    display: flex;
    align-items: center;
    padding-left: 1rem;
    font-size: 2rem;
    pointer-events: none;
}
.wrapper {
    padding: 0 1rem;
    background: #F8F4EA;
    min-height: calc(100vh - 11vh);
    width: 100%;
    overflow-y: auto;
}
.btn {
    padding: .5rem .8rem;
    margin-bottom: .125rem;
    background: #FD8A8A;
    color: #F8F4EA;
    border-radius: .275rem;
    font-size: .8rem;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: .5rem;
}
.icon {
    font-size: 1.2rem;
}
.cta {
    pointer-events: visible;
}
.margin-left {
    margin-left: 1rem;
}
tbody {

}
th, td {
    padding: .3rem;
    text-align: center;
    pointer-events: none;
}
td {
    font-size: .8rem;
}
th {
    text-align: center;
    background: #FD8A8A;
    color: #F8F4EA;
    border-bottom: 2px solid #1D3C58;
    text-transform: uppercase;
    
}
tr{
    border-bottom: 1px solid #1D3C58;
    background: #F5EBE0;
    color: #1D3C58;
}

tr.admin-role {
    background: #F0DBDB;
    color: #1D3C58;
}

.ellipsis p {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.width5rem {
    width: 5rem;
}
.width8rem {
    max-width: 8rem;
    text-align: center;
}
.width12rem {
    max-width: 12rem;
}
.mappreview {
    width: 100%;
    height: 5.5rem;
}
.tagbox {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: .2rem;
}
.tagpreview {
    background: #66C18C;
    display: inline-block;
    font-size: .8rem;
    color:#F8F4EA;
    padding: .2rem;
    border-radius: .3rem;
}
.imgbox {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width: 12rem;
    height: 100%;
    gap: .2rem;
}
.imgpreview {
    width: 3.8rem;
    height: 3rem;
}
</style>