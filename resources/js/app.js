import { createApp } from "vue";
import App from "../views/App.vue";
import Patient from "../views/Patient.vue";
import Report from "../views/Report.vue";
import { createRouter, createWebHistory } from "vue-router";

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";

import "@fortawesome/fontawesome-free/css/all.css";
import unoverlay from "unoverlay-vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            name: "patient",
            component: Patient,
        },
        {
            path: "/report",
            name: "report",
            component: Report,
        },
    ],
});

createApp(App).use(router).use(unoverlay).mount("#app");
// const app = createApp({})

// app.component('report', Report)

// app.mount('#app')

// Vue.use(BootstrapVue)

// Vue.use(IconsPlugin)
