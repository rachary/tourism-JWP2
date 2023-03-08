<template>
    <div class="modal">
        <app-modal-component ref="modal" :title="title" class="center">
            <div>
                <form @submit.prevent="submit">
                    <div class="row">
                        <label>Nama Event:</label>
                        <input v-model="form.name" type="text">
                        <div class="error" v-if="errors.name">{{ errors.name[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Tanggal Event:</label>
                        <input v-model="form.date" type="date">
                        <div class="error" v-if="errors.date">{{ errors.date[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Alamat:</label>
                        <input v-model="form.address" type="text">
                        <div class="error" v-if="errors.address">{{ errors.address[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Foto:</label>
                        <input v-model="form.image" type="image">
                        <div class="error" v-if="errors.image">{{ errors.image[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Diadakan Oleh:</label>
                        <input v-model="form.maker" type="text">
                        <div class="error" v-if="errors.maker">{{ errors.maker[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Deskripsi Event:</label>
                        <input v-model="form.decs" type="text">
                        <div class="error" v-if="errors.decs">{{ errors.decs[0] }}</div>
                    </div>
                    <div class="row">
                        <label>Lokasi:</label>
                        <input v-model="form.loc" type="location">
                        <div class="error" v-if="errors.loc">{{ errors.loc[0] }}</div>
                    </div>
                    <div class="row center">
                        <button class="cta" type="submit">Tambah Event</button>
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

const submitting = ref(false)
const errors = ref({})
const form = reactive({
    name: '',
    date: '',
    address: '',
    image: '',
    maker: '',
    decs: '',
    loc: '',
})

const open = (data) => {
    modal.value.open()
}
const close = () => {
    modal.value.close()
}
const submit = async () => {
    submitting.value = true
    try {
        const response = await api.PUT(`api/user/${user.value.id}`, form)
        emit('updated', response)
        close()
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
    background: #526CEB;
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