<template>
    <div class="modal">
        <app-modal-component ref="modal" :title="title" class="center">
            <div class="form-container">
                <form @submit.prevent="submit">
                    <div class="form-left">
                        <div class="row">
                            <label>Masukkan Nama Destinasi:</label>
                            <input v-model="form.name" type="text">
                            <div class="error" v-if="errors.name">{{ errors.name[0] }}</div>
                        </div>
                        <div class="row">
                            <label>Masukkan Alamat Destinasi:</label>
                            <textarea v-model="form.address"></textarea>
                            <div class="error" v-if="errors.address">{{ errors.address[0] }}</div>
                        </div>
                        <div class="row">
                            <label>Masukkan Deskripsi Destinasi:</label>
                            <textarea v-model="form.description"></textarea>
                            <div class="error" v-if="errors.description">{{ errors.description[0] }}</div>
                        </div>
                        <div class="row">
                            <label>Pilih Region Destinasi:</label>
                            <select v-model="form.destination_region_id" class="form-input">
                                <option v-for="region in regions" :value="region.id">{{ region.name }}</option>
                            </select>
                        </div>
                        <div class="row">
                            <label>Masukkan URL Embed Map Destinasi:</label>
                            <textarea v-model="form.location"></textarea>
                            <div class="error" v-if="errors.location">{{ errors.location[0] }}</div>
                        </div>
                    </div>
                    <div class="form-divider"></div>
                    <div class="form-right">
                        <div class="row">
                            <label>Pilih Kategori Destinasi:</label>
                            <ul class="tag-box">
                                <li class="tag"  v-for="tag in tags" :key="tag.id">
                                    <input v-model="form.destination_tags" type="checkbox" :id="tag.id" :value="tag.id" multiple>
                                    <label :for="tag.id">{{ tag.name }}</label>
                                </li>
                            </ul>
                            <div class="error" v-if="errors.destination_tags">{{ errors.destination_tags[0] }}</div>
                        </div>
                        <div class="row">
                            <button class="preview-button" @click="refDestinationImage.click()" type=button>
                                Pilih Gambar Destinasi:
                            </button>
                            <div class="preview-img-box">
                                <img class="preview-img" @click="removeImg" v-for="image in form.destination_images" :src="image.url">
                            </div>
                            <input 
                            hidden 
                            ref="refDestinationImage"
                            id="idDestinationImage" 
                            type="file"
                            multiple 
                            @change="onFileChange">
                            <div class="error" v-if="errors.destination_images">{{ errors.destination_images[0] }}</div>
                        </div>
                    </div>
                    <div class="form-action row center">
                        <button class="cta" type="submit">Tambah Destinasi</button>
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

const refDestinationImage = ref()
const regions = ref([])
const tags = ref([])
const emit = defineEmits([ 'created' ])
const title = ref('Tambah Destinasi Baru')
const modal = ref()
const submitting = ref(false)
const errors = ref({})
const form = reactive({
    name: '',
    address: '',
    description: '',
    destination_region_id: '',
    location: '',
    destination_tags: [],
    destination_images: [],
})

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
          url: e.target?.result,
          original: e.target?.result,
        }
        form.destination_images[index] = { ...image, file }
        setTimeout(resolve, 250)
      }
    })
  }

  const onFileChange = async (event) => {
    if (!(event.target.files?.length)) {
      return
    }

    const files = event.target.files
    let countImages = form.destination_images.filter(image => image.url).length
    for (let i = 0; i < files.length; i++) {
      if (countImages >= 5) break
      await createImage(files[i], countImages)
      countImages++
    }

    const ctx = document.getElementById('idDestinationImage')
    ctx.value = ''
  }

const getFormData = () => {
    const formData = new FormData()
    formData.append('name', form.name)
    formData.append('address', form.address)
    formData.append('description', form.description)
    formData.append('destination_region_id', form.destination_region_id)
    formData.append('location', form.location)
    form.destination_tags.forEach((tag, index) => {
        formData.append(`destination_tags[${index}]`, tag)
    })
    form.destination_images.forEach((image, index) => {
        formData.append(`destination_images[${index}]`, dataURItoBlob(image.url))
    })

    return formData
}

const open = (data, data2) => {
    modal.value.open()

    regions.value = data
    tags.value = data2
}
const close = () => {
    modal.value.close()
}


const submit = async () => {
    submitting.value = true
    try {
        const response = await api.POSTFORMDATA('/api/destination', getFormData())
        emit('created', response)
        close()
        location.reload()
    } catch (error) {
        errors.value = api.formErrors(error)
        console.log(error)
    } finally {
        submitting.value = false
    }
}

defineExpose({ open, close })
</script>
    
<style scoped>
.form-container {
}
form {
    width: 60vw;
    display: flex;
    flex-wrap: wrap;
    padding: 1rem 1rem;
    background: white;
    text-align: left;
    justify-content: center;
}
.form-left, .form-right {
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


.tag label, .tag label:before {
    transition: 0.25s all ease;
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
</style>