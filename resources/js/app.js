import { createApp } from "vue"
import App from './App.vue'
import FontAwesomeIcon from "./assets/FontAwesomeIcon"
import router from "./routes"


const app = createApp(App)

app.use(router)
app.use(FontAwesomeIcon)
app.mount('#app')