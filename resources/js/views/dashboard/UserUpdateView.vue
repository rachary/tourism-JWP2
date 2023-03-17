<template>
    <div class="modal">
        <app-modal-component ref="modal" :title="title" class="center">
            <div>
                <form @submit.prevent="submit">
                    <div class="row">
                        <label>Masukkan Nama:</label>
                        <input v-model="form.name" type="text">
                        <div class="error" v-if="errors.name">{{ errors.name[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Masukkan Email:</label>
                        <input v-model="form.email" type="text">
                        <div class="error" v-if="errors.email">{{ errors.email[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Masukkan Password:</label>
                        <input v-model="form.password" type="password">
                        <div class="error" v-if="errors.password">{{ errors.password[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Masukkan No HP:</label>
                        <input v-model="form.phone" type="text">
                        <div class="error" v-if="errors.phone">{{ errors.phone[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Pilih Role:</label>
                        <select v-model="form.role"  class="form-input">
                            <option v-for="role in roles" :value="role.name" >{{ role.name }}</option>
                        </select>
                    </div>
                    <div class="row center">
                        <button class="cta" type="submit">Update User</button>
                    </div>
                </form>
            </div>
        </app-modal-component>
    </div>
</template>
    
<script setup>
import { ref, reactive } from 'vue';
import AppModalComponent from '../../components/AppModalComponent.vue';
import api from '../../functions/api';

const emit = defineEmits([ 'updated' ])
const title = ref('Update Data User')
const modal = ref()
const user = ref()
const roles = ref()
const submitting = ref(false)
const errors = ref({})
const form = reactive({
    name: '',
    email: '',
    password: '',
    phone: '',
    role: '',
})

const open = (data, data2) => {
    modal.value.open()
    
    user.value = data
    roles.value = data2
    form.name = data.name
    form.email = data.email
    form.phone = data.phone
    form.role = data.user_role.name
}
const close = () => {
    modal.value.close()
}
const submit = async () => {
    submitting.value = true
    try {
        const response = await api.PUT(`/api/user/${user.value.id}`, form)
        emit('updated', response)
        close()
        alert('User Updated')
        location.reload()
    } catch (error) {
        errors.value = api.formErrors(error)
    } finally {
        submitting.value = false
    }
}

defineExpose({ open, close })
</script>
    
<style scoped>
form {
    width: 30vw;
    padding: 1rem 2rem;
    background: white;
    text-align: left;
}

.row {
    margin-bottom: 1.2rem;
}

.center {
    text-align: center;
}

input,
select,
option,
button {
    width: 100%;
    background: #FD8A8A;
    padding: .2rem .5rem;
    border-radius: .125rem;
    outline: none;
    color: white;
    letter-spacing: .0625rem;
}

select,
option {
    padding: .375rem;
}

button {
    width: fit-content;

}

.error {
    font-size: .8rem;
    color: #FF0032;
    position: absolute;
    letter-spacing: .0625rem;
}

label {
    font-size: .8rem;
    color: #555;
}</style>