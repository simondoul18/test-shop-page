import "bootstrap/dist/css/bootstrap.min.css"
import './assets/css/style.min.css'
import { createApp } from 'vue'
import { createPinia } from 'pinia'

import axios from "axios"
axios.defaults.baseURL = import.meta.env.VITE_API_URL;

import App from './App.vue'
import router from './router'

import "bootstrap"

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
