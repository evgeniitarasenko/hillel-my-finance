import './assets/main.scss'

import {createApp} from 'vue'
import {createPinia} from 'pinia'
import App from './App.vue'

// FortAwesome
import {library} from '@fortawesome/fontawesome-svg-core'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import { fas } from '@fortawesome/free-solid-svg-icons'

library.add(fas)

// Creating app
createApp(App).use(createPinia())
    .component('font-awesome-icon', FontAwesomeIcon)
    .mount('#app')
