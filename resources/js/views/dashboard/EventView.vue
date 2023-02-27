<template>
    <div class="wrap">
        <div class="header">
            INI EVENT DASHBOARD
        </div>
        <div class="wrapper">
            <div>
                <div>
                    <button class="btn" @click="refEventAdd.open()">
                        <fa-icon icon="fa-solid fa-user-plus"></fa-icon>
                    </button>
                </div>
                <app-table-component>
                    <template #head>
                        <th>#</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Created By</th>
                        <th>Description</th>
                        <th>Action</th>
                    </template>
                    <tr v-for="(event, index) in events" :key="event.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ event.name }}</td>
                        <td>{{ event.date }}</td>
                        <td>{{ event.address }}</td>
                        <td>{{ event.image }}</td>
                        <td>{{ event.maker }}</td>
                        <td>{{ event.decs }}</td>
                        <td>{{ event.loc }}</td>
                        <td class="cta">
                            <button @click="refEventUpdate.open(event)">
                                <fa-icon icon="fa-solid fa-user-gear"></fa-icon>
                            </button>
                            <button @click="deleteEvent(event.id)">
                                <fa-icon icon="fa-solid fa-trash"></fa-icon>
                            </button>
                        </td>
                    </tr>
                </app-table-component>
            </div>
            <div>
                <event-update-view ref="refEventUpdate" @updated="eventUpdated"/>
            </div>
            <event-add-view ref="refEventAdd" @created="events.push($event)"/>
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

const getEvents = async () => {
    loading.value = true
    try {
        const response = await api.GET('api/event')
        events.value = response.data
    } finally {
        loading.value = false
    }
}

const eventUpdated = (data) => {
    events.value = events.value.map(event => {
        if (event.id === data.id) {
            event.name = data.name
            event.date = data.date
            event.address = data.address
            event.image = data.image
            event.maker = data.maker
            event.decs = data.decs
            event.loc = data.loc
        }

        return event
    })
}

const deleteEvent = async (id) => {
    loading.value = true
    try {
        const response = await api.DELETE(`api/event/${id}`)
        events.value = events.value.filter(i => i.id !== id)
        alert('Event Berhasil dihapus')
    } catch (error) {
        alert('Gagal Hapus Event')
    } finally {
        loading.value = false
        getEvents()
    }
}

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
    background: #526CEB;
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
    background: #526CEB;
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