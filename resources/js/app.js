require("dotenv").config();
require("./bootstrap");

import Vue from "vue";

import { InertiaApp } from "@inertiajs/inertia-vue";
import { InertiaForm } from "laravel-jetstream";
import PortalVue from "portal-vue";
import route from "ziggy-js";
import LazyLoad from 'vue-lazyload';
import ScrollSpy from 'vue2-scrollspy';
import Layout from "@/Layouts/PublicLayout";
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import VueGtag from 'vue-gtag';
import localStorage from 'localStorage';
import DateTimePicker from 'vue-vanilla-datetime-picker';
import VueDisqus from 'vue-disqus';

library.add(fas, fab)

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.prototype.$route = (...args) => route(...args).url();
Vue.prototype.$redirect = (url) => { window.location.href = url }
Vue.prototype.$local = localStorage
Vue.use(LazyLoad);
Vue.use(ScrollSpy);
Vue.component('Icon', FontAwesomeIcon)
Vue.component('date-time-picker', DateTimePicker);


Vue.use(VueGtag, {
    config: {
        id: process.env.MIX_ANALYTICS_APP_KEY,
    },
    bootstrap: false,
    globalObjectName: "analytics",
})

Vue.use(VueDisqus, {
    shortname: process.env.MIX_DISQUS_SHORTNAME,
})

Vue.mixin({
    methods: {
        error(field, errorBag = "default") {
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

const app = document.getElementById("app");

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => import(`@/Pages/${name}`)
                    .then(({ default: page }) => {
                        if (page.layout === undefined) {
                            page.layout = Layout
                        }
                        return page
                    }),
            }
        })
}).$mount(app);
