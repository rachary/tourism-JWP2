import { createApp } from "vue"
import App from './App.vue'
import FontAwesomeIcon from "./assets/FontAwesomeIcon"
import AutoFocus from "./directives/AutoFocus"
import router from "./routes"


const app = createApp(App)

app.use(router)
app.use(FontAwesomeIcon)
app.use(AutoFocus)
app.mount('#app')