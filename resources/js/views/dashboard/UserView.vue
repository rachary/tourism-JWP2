<template>
    <div class="wrap">
            <div class="header">
                INI USER DASHBOARD
            </div>
        <div class="wrapper">
            <div>
                <div>
                    <button class="btn" @click="refUserAdd.open()">
                        <fa-icon icon="fa-solid fa-user-plus"></fa-icon>
                    </button>
                </div>
                <app-table-component>
                    <template #head>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </template>
                    <tr v-for="(user, index) in users" :key="user.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.phone }}</td>
                        <td>{{ user.user_role_id }}</td>
                        <td class="cta">
                            <button>
                                <fa-icon icon="fa-solid fa-user-gear"></fa-icon>
                            </button>
                            <button>
                                <fa-icon icon="fa-solid fa-trash"></fa-icon>
                            </button>
                        </td>
                    </tr>
                </app-table-component>
            </div>
            <user-add-view ref="refUserAdd" @created="users.push($event)"/>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import AppTableComponent from '../../components/AppTableComponent.vue';
import UserAddView from './UserAddView.vue';
import api from '../../functions/api'

const refUserAdd = ref()
const loading = ref(false)
const users = ref([])

const getUsers = async () => {
    loading.value = true
    try {
        const response = await api.GET('api/user')
        users.value = response.data
        console.log(response)
    } finally {
        loading.value = false
    }
}
getUsers()
</script>

<style scoped>
.wrap {
    padding: 0;
}
.header {
    background: #FD8A8A;
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
    background: #FD8A8A;
    color: #F8F4EA;
    border-bottom: 2px solid #1D3C58;
    text-transform: uppercase;
}
tr {
    border-bottom: 1px solid #1D3C58;
}
tr:nth-child(odd) {
    background: #F5EBE0;
    color: #1D3C58;
}
tr:nth-child(even) {
    background: #F0DBDB;
    color: #1D3C58;
}

</style>