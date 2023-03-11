<template>
    <div class="wrap">
            <div class="header">
                INI USER DASHBOARD
            </div>
        <div class="wrapper">
            <div>
                <div>
                    <button class="btn" @click="refUserAdd.open(roles)">
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
                        <td>{{ user.user_role.name }}</td>
                        <td class="cta">
                            <button @click="refUserUpdate.open(user, roles)">
                                <fa-icon icon="fa-solid fa-user-gear"></fa-icon>
                            </button>
                            <button @click="deleteUser(user.id)">
                                <fa-icon icon="fa-solid fa-trash"></fa-icon>
                            </button>
                        </td>
                    </tr>
                </app-table-component>
            </div>
            <div>
                <user-update-view ref="refUserUpdate" @updated="userUpdated"/>
            </div>
            <user-add-view ref="refUserAdd" @created="users.push($event)"/>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import AppTableComponent from '../../components/AppTableComponent.vue';
import UserAddView from './UserAddView.vue';
import UserUpdateView from './UserUpdateView.vue';
import api from '../../functions/api'

const refUserUpdate = ref()
const refUserAdd = ref()
const loading = ref(false)
const users = ref([])
const roles = ref([])

const getUserRole = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/user/role')
        roles.value = response.data
    } finally {
        loading.value = false
    }
}

const getUsers = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/user')
        users.value = response.data
    } finally {
        loading.value = false
    }
}

const userUpdated = (data) => {
    users.value = users.value.map(user => {
        if (user.id === data.id) {
            user.name = data.name
            user.email = data.email
            user.phone = data.phone
        }

        return user
    })
}

const deleteUser = async (id) => {
    loading.value = true
    try {
        const response = await api.DELETE(`/api/user/${id}`)
        users.value = users.value.filter(i => i.id !== id)
        alert('User Berhasil dihapus')
    } catch (error) {
        alert('Gagal Hapus User')
    } finally {
        loading.value = false
        getUsers()
    }
}

getUserRole()
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
tr{
    background: #F5EBE0;
    color: #1D3C58;
}
tr.admin-role {
    background: #F0DBDB;
    color: #1D3C58;
}

</style>