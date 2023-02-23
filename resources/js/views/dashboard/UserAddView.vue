<template>
    <app-modal-component ref="modal" title="Add User">
        <div>
            <form @submit.prevent="submit">
                <div>
                    <label>Name</label>
                    <input v-model="form.name" type="text" required>
                </div>
                <div>
                    <label>Email</label>
                    <input v-model="form.email" type="email" required>
                </div>
                <div>
                    <label>Password</label>
                    <input v-model="form.password" type="password" required>
                </div>
                <div>
                    <label>Phone</label>
                    <input v-model="form.phone" type="text" required>
                </div>
                <div>
                    <label>Role</label>
                    <select v-model="form.role" class="form-input">
                        <option value="contributor">Contributor</option>
                        <option value="administrator">Administrator</option>
                    </select>
                </div>
                <div>
                    <button type="submit">Add User</button>
                </div>
            </form>
        </div>
    </app-modal-component>
</template>

<script setup>
import { ref, reactive } from 'vue';
import AppModalComponent from '../../components/AppModalComponent.vue';
import api from '../../functions/api';

const emit = defineEmits(['created'])

const modal = ref()
const submitting = ref(false)
const errors = ref({})
const form = reactive({
    name: '',
    email: '',
    password: '',
    phone: '',
    role: 'contributor',
})

const open = () => {
    modal.value.open()
}
const close = () => {
    modal.value.close()
}
const submit = async () => {
    submitting.value = true
    try {
        const response = await api.POST('api/user', form)
        emit('created', response)
        close()
    } catch (error) {
        errors.value = api.formErrors(error)        
    } finally {
        submitting.value = false
    }
}
defineExpose({ open, close })
</script>