<template>
    <main>
        <div class="bg-img"></div>
        <div class="wrap">
            <div class="login">
                <form @submit.prevent="submit">
                    <img src="" alt="">
                    <h1 class="title">Login Dashboard <br> Tourism Surabaya</h1>
                    <div class="row">
                        <label class="label">Masukkan email:</label>
                        <input v-model="form.email" class="input" type="email" required>
                    </div>
                    <div class="row">
                        <label class="label">Masukkan password:</label>
                        <input v-model="form.password" class="input" type="password" required>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn input">Login</button>
                    </div>
                    <a href="#" class="call-admin">Need Account? Contact Admin</a>
                </form>
            </div>
        </div>
    </main>
</template>

<script setup>
import { reactive, ref } from 'vue';
import api from '../functions/api';
import router from '../routes';

const form = reactive({
    email: '',
    password: ''
})
const submitting = ref(false)
const errors = ref({})

const submit = async () => {
    submitting.value = true
    try {
        const response = await api.POST('api/login', form)

        const username = response.name
        const userrole = response.user_role_id

        localStorage.setItem('username', username)
        localStorage.setItem('userrole', userrole)

        if(userrole==1) {
            router.replace({name: 'dashboarduser'})
        } else {
            router.replace({name: 'dashboarddestination'})
        }
    } catch (error) {
        errors.value = api.formErrors(error)
        alert('Email atau password salah')
    } finally {
        submitting.value = false
    }
}
</script>

<style scoped>
main {
    width: 100%;
    height: 100vh;
}
.bg-img {
    background-image: url('https://img.okezone.com/content/2022/12/08/337/2722874/ini-5-alasan-kenapa-kota-surabaya-disebut-kota-pahlawan-nWb0plbz3Y.jpg');
    width: 100%;
    height: 100%;
    background-position: center;
    background-size: cover;
    position: absolute;
    z-index: -1;
    filter: opacity(90%) brightness(50%);
}
.wrap {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.login {
    width: 40%;
}
form {
    background: rgba(176, 187, 192, 0.4);
    border-radius: 1rem;
    padding: 1rem 1rem 2rem 1rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
form img {
    mix-blend-mode: multiply;
    width: 10rem;
}
.title {
    margin-bottom: 2rem;
    text-align: center;
    font-size: 2rem;
    color: white;
    padding: 1rem;
}
.row {
    width: 100%;
    margin-bottom: 2rem;
}
.label {
    position: absolute;
    transform: translateY(-.6rem) translateX(1.2rem);
    z-index: 2;
    font-size: .8rem;
    color: #555;
    background: #eee;
    padding: 0 .3rem;
    border-radius: .5rem;
}
.input {
    width: 100%;
    padding: .6rem 1rem;
    outline: none;
    border-radius: 2rem;
    color: #555;
    position: relative;
    background: #eee;
}
.btn {
    background: #F0DCA5;
    color: #555;
}
.btn:hover {
    color: #888;
}

.call-admin {
    color: white;
}

/* Responsive 480px */
@media screen and (max-width: 480px) {
    .login {
        width: 100%;
    }
    form {
        padding: 1rem 1rem 2rem 1rem;
    }
    .title {
        margin-bottom: 2rem;
        font-size: 1.5rem;
        padding: 1rem;
    }
    .label {
        font-size: .7rem;
    }
    .input {
        width: 100%;
        padding: .5rem .9rem;
    }
}

/* Responsive 481px - 768px */
@media screen and (min-width: 481px) and (max-width: 768px) {
    .login {
        width: 90%;
    }
    form {
        padding: 1.2rem 1.2rem 2rem 1.2rem;
    }
    .title {
        margin-bottom: 2rem;
        font-size: 1.8rem;
        padding: 1rem;
    }
    .label {
        font-size: 1rem;
        transform: translateY(-.7rem) translateX(1.1rem);
    }
    .input {
        width: 100%;
        padding: 1rem 1.1rem;
        font-size: 1.1rem;
    }
    .call-admin {
        font-size: 1.2rem;
    }
}

/* Responsive 769px - 1024px */
@media screen and (min-width: 769px) and (max-width: 1024px) {
    .login {
        width: 60%;
    }
    form {
        padding: 1.2rem 1.2rem 2rem 1.2rem;
    }
    .title {
        margin-bottom: 2rem;
        font-size: 1.8rem;
        padding: 1rem;
    }
    .label {
        font-size: 1rem;
        transform: translateY(-.7rem) translateX(1.1rem);
    }
    .input {
        width: 100%;
        padding: 1rem 1.1rem;
        font-size: 1.1rem;
    }
    .call-admin {
        font-size: 1.2rem;
    }
}
</style>