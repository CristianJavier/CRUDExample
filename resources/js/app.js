require('./bootstrap');

import { createApp } from 'vue';


import App from './components/App.vue';
import axios from 'axios';


import { createRouter, createWebHistory } from 'vue-router';
import { routes } from './routes';

import { render } from 'vue';



const router = createRouter({
    history:createWebHistory(),
    routes
});

const app = createApp(App);

app.config.globalProperties.$axios = axios;
app.use(router);
app.mount('#app');
export default router;
