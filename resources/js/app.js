import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.js'
import '../assets/css/style.css'

import '../css/app.css';
import {createApp} from 'vue/dist/vue.esm-bundler'
import { createPinia } from 'pinia'
import AdminLayout from './layout/AdminLayout/AdminLayout.vue';
import router from './router/routes'
import Alpine from 'alpinejs';
import LoadingPlugin from './Components/base/loader/index.js'
window.Alpine = Alpine;

Alpine.start();
const app = createApp(AdminLayout);
app.use(createPinia())
app.use(router)
app.config.globalProperties.$csrfToken = window.csrf_token;
app.config.globalProperties.$user = window.user;
app.use(LoadingPlugin)
app .mount("#app");
