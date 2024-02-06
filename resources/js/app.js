import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue/dist/vue.esm-bundler.js';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { createRouter, createWebHashHistory } from 'vue-router';

import App from "./Pages/App.vue";
import Welcome from "./Pages/AppWelcome.vue";
import Index from "./Pages/Users/Index.vue";
import Show from "./Pages/Users/Show.vue";
import Edit from "./Pages/Users/Edit.vue";
import Create from "./Pages/Users/Create.vue";
import NotFound from "./Pages/NotFound.vue";

const routes = [
    { path: '/', name:'welcome', component: Welcome },
    { path: '/users', name:'index', component: Index },
    { path: '/users/:id', name:'show', component: Show },
    { path: '/users/:id/edit', name:'edit', component: Edit },
    { path: '/users/create', name:'create', component: Create },
    { path: '/404', name:'404', component: NotFound },
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

createApp(App)
    .use(router)
    .mount('#app')

// import { createInertiaApp } from '@inertiajs/vue3';
// import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

// const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
//     setup({ el, App, props, plugin }) {
//         return createApp({ render: () => h(App, props) })
//             .use(plugin)
//             .use(ZiggyVue)
//             .mount(el);
//     },
//     progress: {
//         color: '#4B5563',
//     },
// });