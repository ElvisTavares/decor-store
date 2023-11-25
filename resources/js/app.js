import './bootstrap';
import '../css/app.css';

import {createApp} from 'vue'

import App from './App.vue'

// createApp(App).mount("#app")

import Menu from "./components/Menu.vue";

createApp({
    components: {
        Menu,
    }
}).mount('#app');

createApp(Menu).mount('#app');
