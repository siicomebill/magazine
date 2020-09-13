require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

Vue.mixin({
    methods: {
        error(field, errorBag = 'default') {
            console.log(this.$page.errors);
            if (!this.$page.errors.hasOwnProperty(errorBag)) {
                return null;
            }

            if (this.$page.errors[errorBag].hasOwnProperty(field)) {
                return this.$page.errors[errorBag][field][0];
            }

            return null;
        }
    }
});

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
