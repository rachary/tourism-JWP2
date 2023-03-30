<template>
    <div class="modal">
        <app-modal-component ref="modal" :title="title" class="center">
            <div class="form-container">
                <form @submit.prevent="submit">
                    <div class="form-left">
                        <div class="row">
                            <label>Masukkan Nama Event:</label>
                            <input v-model="form.name" type="text">
                            <div class="error" v-if="errors.name">{{ errors.name[0] }}</div>
                        </div>
                        <div class="row">
                            <label>Masukkan Alamat Event:</label>
                            <textarea v-model="form.address"></textarea>
                            <div class="error" v-if="errors.address">{{ errors.address[0] }}</div>
                        </div>
                        <div class="row">
                            <label>Masukkan Deskripsi Event:</label>
                            <textarea v-model="form.description"></textarea>
                            <div class="error" v-if="errors.description">{{ errors.description[0] }}</div>
                        </div>
                        <div class="row">
                            <label>Masukkan URL Embed Map Event:</label>
                            <textarea v-model="form.location"></textarea>
                            <div class="error" v-if="errors.location">{{ errors.location[0] }}</div>
                        </div>
                        <div class="row">
                            <label>Tanggal Event Dimulai:</label>
                            <input type="date" v-model="form.date_start">
                            <div class="error" v-if="errors.date_start">{{ errors.date_start[0] }}</div>
                        </div>
                    </div>
                    <div class="form-divider"></div>
                    <div class="form-right">
                        <div class="row">
                            <label>Tanggal Event Dimulai:</label>
                            <input type="date" v-model="form.date_end">
                            <div class="error" v-if="errors.date_end">{{ errors.date_end[0] }}</div>
                        </div>
                        <div class="row">
                            <label>Waktu Event:</label>
                            <input type="text" v-model="form.time">
                            <div class="error" v-if="errors.time">{{ errors.time[0] }}</div>
                        </div>
                        <div class="row">
                            <label>Penyelenggara Event:</label>
                            <input type="text" v-model="form.organizer">
                            <div class="error" v-if="errors.organizer">{{ errors.organizer[0] }}</div>
                        </div>
                        <div class="row">
                            <button class="preview-button" @click="refEventImage.click()" type=button>
                                Pilih Gambar Event:
                            </button>
                            <div class="img-box">
                                <div class="preview-img-box">
                                <img class="preview-img" v-for="image in form.event_images" :src="image.filename.includes('http')?image.filename:image.image_url">
                                </div>
                                <input 
                                hidden 
                                ref="refEventImage"
                                id="idEventImage" 
                                type="file"
                                multiple 
                                @change="onFileChange">
                                <button class="cta btn-remove" type="button" @click="deleteImages">Hapus Gambar</button>
                            </div>
                            <div class="error" v-if="errors.event_images">{{ errors.event_images[0] }}</div>
                        </div>
                    </div>
                    <div class="form-action row center">
                        <button class="cta" type="submit">Update Event</button>
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
import dataURItoBlob from '../../functions/blob'

const emit = defineEmits([ 'updated' ])
const refEventImage = ref()
const event = ref()
const title = ref('Update Event')
const modal = ref()
const submitting = ref(false)
const errors = ref({})
const form = reactive({
    name: '',
    address: '',
    description: '',
    location: '',
    date_start: '',
    date_end: '',
    time: '',
    organizer: '',
    event_images: [],
})

const deleteImages = async () => {
    try {
        await api.DELETE(`api/event/${event.value.id}/delete-images`)
        form.event_images = []
        event.value.event_images = []
    } catch (error) {
        console.log('gagal hapus')
    }
}

const createImage = (file, index) => {
    if (typeof FileReader !== 'function') {
        alert('Sorry, FileReader API not supported')
        return
    }

    return new Promise((resolve) => {
        const reader = new FileReader()
        reader.readAsDataURL(file)
        reader.onload = e => {
            const image = {
                image_url: e.target?.result,
                original: e.target?.result,
            }
            form.event_images[ index ] = { ...image, file }
            setTimeout(resolve, 250)
        }
    })
}

const onFileChange = async (event) => {
    if (!(event.target.files?.length)) {
        return
    }

    const files = event.target.files
    let countImages = form.event_images.filter(image => image.image_url).length
    for (let i = 0; i < files.length; i++) {
        if (countImages >= 5) break
        await createImage(files[ i ], countImages)
        countImages++
    }

    const ctx = document.getElementById('idEventImage')
    ctx.value = ''
}

const getFormData = () => {
    const formData = new FormData()
    formData.append('name', form.name)
    formData.append('address', form.address)
    formData.append('description', form.description)
    formData.append('location', form.location)
    formData.append('date_start', form.date_start)
    formData.append('date_end', form.date_end)
    formData.append('time', form.time)
    formData.append('organizer', form.organizer)
    form.event_images.forEach((image, index) => {
        if(image.id){ // skip old image
            return
        }
        formData.append(`event_images[${index}]`, dataURItoBlob(image.image_url))
    })

    return formData
}

const open = (data) => {
    modal.value.open()

    event.value = data

    form.name = event.value.name
    form.address = event.value.address
    form.description = event.value.description
    form.location = event.value.location
    form.date_start = event.value.date_start
    form.date_end = event.value.date_end
    form.time = event.value.time
    form.organizer = event.value.organizer
    form.event_images = event.value.event_images
}

const close = () => {
    modal.value.close()
}

const submit = async () => {
    submitting.value = true
    try {
        const response = await api.POSTFORMDATA(`/api/event/${event.value.id}?_method=PUT`, getFormData())
        emit('updated', response)
        close()
        alert('Event Updated')
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
    width: 60vw;
    display: flex;
    flex-wrap: wrap;
    padding: 1rem 1rem;
    background: white;
    text-align: left;
    justify-content: center;
}

.form-left,
.form-right {
    width: calc(30vw - 3rem);
    border-bottom: .15rem solid #FD8A8A;
}

.form-divider {
    width: .1rem;
    background: #FD8A8A;
    margin: 0 1rem;
}

.form-action {
    margin-top: 1rem;
}

::placeholder {
    color: white;
}

.row {
    margin-bottom: 1.2rem;
}

.center {
    text-align: center;
}

input,
textarea,
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

input {
    font-size: .8rem;
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

.tag-box {
    width: 100%;
    height: 10rem;
    display: flex;
    flex-wrap: wrap;
}

.tag {
    width: 45%;
    display: flex;
    justify-content: left;
    align-items: center;
    padding: 0 .3rem;
    background: transparent;
    margin: .1rem;
    height: fit-content;
}

.tag input[type="checkbox"] {
    display: none;
    z-index: -1;
}

.tag label {
    /* padding: .3rem;
    display: inline-block;
    width: 100%; */
    position: relative;
    line-height: 2;
    cursor: pointer;
    font-size: .8rem;
    z-index: 1;
    margin-left: 1rem;
}

.tag label:before {
    content: "";
    position: absolute;
    left: -.7rem;
    top: .5rem;
    display: block;
    width: .5rem;
    height: 30%;
    border: 2px solid #FD8A8A;
}

.tag label:after {
    content: "";
    position: absolute;
    top: 0;
    left: -1rem;
    width: 9rem;
    height: 100%;
    display: block;
    border: 1px solid #FD8A8A;
}

.tag input[type="checkbox"]:checked + label {
    color: white;
    padding: 0 .5rem;
}

.tag input[type="checkbox"]:checked + label:before {
    width: 9rem;
    top: 0;
    left: -1rem;
    height: 100%;
    background: #FD8A8A;
    z-index: -1;
    border-radius: none;
}

.tag label,
.tag label:before {
    transition: 0.25s all ease;
}

.img-box {
    margin-top: .5rem;
}

.preview-img-box {
    display: flex;
    flex-wrap: wrap;
    gap: .3rem;
}
.preview-button {
    margin-bottom: .5rem;
}
.preview-img {
    width: 5rem;
    height: 5rem;
}
.btn-remove {
    margin-top: .5rem;
    width: 100%;
}
</style>