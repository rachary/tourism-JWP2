<template>
    <div class="wrap">
        <div class="header">
            INI DESTINASI DASHBOARD
        </div>
        <div class="wrapper">
            <div>
                <div>
                    <button class="btn" @click="refDestinationAdd.open()">
                        <fa-icon icon="fa-solid fa-user-plus"></fa-icon>
                    </button>
                </div>
                <app-table-component>
                    <template #head>
                        <th>#</th>
                        <th>Name</th>
                        <th>Tag</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Action</th>
                    </template>
                    <tr v-for="(destination, index) in destinations" :key="dastination.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ destination.name }}</td>
                        <td>{{ destination.tag }}</td>
                        <td>{{ destination.address }}</td>
                        <td>{{ destination.image }}</td>
                        <td>{{ destination.loc }}</td>
                        <td>{{ destination.decs }}</td>
                        <td class="cta">
                            <button @click="refDestinationUpdate.open(destination)">
                                <fa-icon icon="fa-solid fa-user-gear"></fa-icon>
                            </button>
                            <button @click="deleteDestination(destination.id)">
                                <fa-icon icon="fa-solid fa-trash"></fa-icon>
                            </button>
                        </td>
                    </tr>
                </app-table-component>
            </div>
            <div>
                <destination-update-view ref="refDestinationUpdate" @updated="destinationUpdated"/>
            </div>
            <destination-add-view ref="refDestinationAdd" @created="destinations.push($event)"/>
        
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

const getDestinations = async () => {
    loading.value = true
    try {
        const response = await api.GET('api/destination')
        destinations.value = response.data
    } finally {
        loading.value = false
    }
}

const destinationUpdated = (data) => {
    destinations.value = destinations.value.map(destination => {
        if (destination.id === data.id) {
            destination.name = data.name
            destination.tag = data.tag
            destination.address = data.address
            destination.image = data.image
            destination.loc = data.loc
            destination.decs = data.decs
        }

        return destination
    })
}

const deleteDestination = async (id) => {
    loading.value = true
    try {
        const response = await api.DELETE(`api/destination/${id}`)
        destinations.value = destinations.value.filter(i => i.id !== id)
        alert('Destination Berhasil dihapus')
    } catch (error) {
        alert('Gagal Hapus Destination')
    } finally {
        loading.value = false
        getDestinations()
    }
}

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
    background: #66C18C;
    color: #F8F4EA;
    border-radius: .275rem;
    font-size: .8rem;
    font-weight: bold;
}
.cta {
    pointer-events: visible;
    display: flex;
    justify-content: center;
    gap: 1rem;
}

th, td {
    padding: .3rem;
    text-align: center;
    pointer-events: none;
}

th {
    text-align: center;
    background: #66C18C;
    color: #F8F4EA;
    border-bottom: 2px solid #1D3C58;
    text-transform: uppercase;
}
td:nth-child(5) {
    text-transform: uppercase;
}
tr {
    border-bottom: 1px solid #1D3C58;
}
tr{
    background: #F5EBE0;
    color: #1D3C58;
}
tr.admin-role {
    background: #F0DBDB;
    color: #1D3C58;
}

</style>