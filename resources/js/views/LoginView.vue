<template>
    <main>
        <div class="bg-img"></div>
        <div class="wrap">
            <div class="login">
                <form>
                    <img src="" alt="">
                    <h1 class="title">Login Dashboard <br> Tourism Surabaya</h1>
                    <div class="row">
                        <label class="label">Masukkan email:</label>
                        <input class="input" type="email" required>
                    </div>
                    <div class="row">
                        <label class="label">Masukkan password:</label>
                        <input class="input" type="password" required>
                    </div>
                    <div class="row">
                        <button class="btn input">Login</button>
                    </div>
                    <a href="#" class="call-admin">Need Account? Contact Admin</a>
                </form>
            </div>
        </div>
    </main>
</template>

<script setup>

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
    width: 35%;
}
form {
    background: rgba(176, 187, 192, 0.4);
    border-radius: 1rem;
    padding: 0 1rem 2rem 1rem;
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

@media only screen and (max-width: 567px) {

}
</style>