import './assets/main.scss'

import {createApp} from 'vue'
import {createPinia} from 'pinia'
import App from './App.vue'

import axios from "axios";

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;
window.axios.defaults.withXSRFToken = true;
window.axios.defaults.baseURL = import.meta.env.VITE_BASE_URL;


// FortAwesome
import {library} from '@fortawesome/fontawesome-svg-core'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import { fas } from '@fortawesome/free-solid-svg-icons'

library.add(fas)

// Creating app
createApp(App).use(createPinia())
    .component('font-awesome-icon', FontAwesomeIcon)
    .mount('#app')
