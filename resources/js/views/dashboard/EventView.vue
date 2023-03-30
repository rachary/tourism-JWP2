<template>
    <div class="wrap">
        <div class="header">
            EVENT DASHBOARD
        </div>
        <div class="wrapper">
            <div>
                <div>
                    <button class="btn" @click="refEventAdd.open()">
                        <fa-icon class="icon" icon="fa-solid fa-plus"></fa-icon>
                        <p>Event</p>
                    </button>
                </div>
                <app-table-component>
                    <template #head>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <!-- <th>Lokasi</th> -->
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Waktu</th>
                        <th>Penyelenggara</th>
                        <th>Image</th>
                        <th>Action</th>
                    </template>
                    <tr v-for="(event, index) in events" :key="event.id">
                        <td>{{ index + 1 }}</td>
                        <td class="width8rem">{{ event.name }}</td>
                        <td class="ellipsis width8rem">
                            <p>{{ event.address }}</p>
                        </td>
                        <td class="ellipsis width12rem">
                            <p>{{ event.description }}</p>
                        </td>
                        <!-- <td class="cta width8rem">
                            <iframe class="mappreview" :src="event.location" frameborder="0" ></iframe>
                        </td> -->
                        <td class="width8rem">{{ event.date_start }}</td>
                        <td class="width8rem">{{ event.date_end }}</td>
                        <td class="width8rem">{{ event.time }}</td>
                        <td class="ellipsis width8rem">{{ event.organizer }}</td>
                        <td class="width12rem">
                            <div class="imgbox">
                                <img class="imgpreview" v-for="image in event.event_images"
                                    :src="image.filename.includes('http')?image.filename:'http://127.0.0.1:8000/storage/event_images/'+image.filename" alt="">
                            </div>
                        </td>
                        <td class="cta mid">
                            <button @click="refEventUpdate.open(event)
                            ">
                                <fa-icon class="icon" icon="fa-solid fa-pen-to-square"></fa-icon>
                            </button>
                            <button v-if="role == 1" class="margin-left" @click="deleteEvent(event.id)">
                                <fa-icon class="icon" icon="fa-solid fa-trash"></fa-icon>
                            </button>
                        </td>
                    </tr>
                </app-table-component>
            </div>
            <div>
                <event-update-view ref="refEventUpdate" @updated="eventUpdated" />
            </div>
            <event-add-view ref="refEventAdd" @created="events.push($event)" />
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import AppTableComponent from '../../components/AppTableComponent.vue';
import EventAddView from './EventAddView.vue';
import EventUpdateView from './EventUpdateView.vue';
import api from '../../functions/api'

const refEventUpdate = ref()
const refEventAdd = ref()
const loading = ref(false)
const events = ref([])
const role = ref('')

const getUserRole = () => {
    role.value = localStorage.getItem('userrole')
}

const getEvents = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/event')
        console.log(response.data)
        events.value = response.data
    } finally {
        loading.value = false
    }
}

const eventUpdated = (data) => {
    events.value = events.value.map(event => {
        if (event.id === data.id) {
            event.name = data.name
            event.address = data.address
            event.description = data.description
            event.location = data.location

        }

        return event
    })
}

const deleteEvent = async (id) => {
    loading.value = true
    try {
        const response = await api.DELETE(`/api/event/${id}`)
        events.value = events.value.filter(i => i.id !== id)
        alert('Event Berhasil dihapus')
    } catch (error) {
        alert('Gagal Hapus Event')
    } finally {
        loading.value = false
        getEvents()
    }
}

getUserRole()
getEvents()

</script>

<style scoped>
.wrap {
    padding: 0;
}

.header {
    background: #526CEB;
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

tbody {}

th,
td {
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

tr {
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
    color: #F8F4EA;
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
}</style>