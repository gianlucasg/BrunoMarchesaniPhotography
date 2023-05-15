require('./bootstrap');

import Vuetify from "../plugins/vuetify"
import Vue from 'vue';
import CoolLightBox from 'vue-cool-lightbox'
import 'vue-cool-lightbox/dist/vue-cool-lightbox.min.css'
import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import VueMasonry from 'vue-masonry-css'
import CKEditor from '@ckeditor/ckeditor5-vue';
import 'animate.css/animate.css';

import AOS from 'aos'
import 'aos/dist/aos.css'


Vue.component('modal', require('./Pages/Modal.vue').default);
Vue.component('modalventa', require('./Pages/modalVenta.vue').default);
Vue.component('card', require('./Pages/card.vue').default);
Vue.component('colorpicker', require('./Pages/ColorPicker.vue').default);
Vue.component('editormodulo', require('./Pages/editor.vue').default);


Vue.use( CKEditor );
Vue.use(CoolLightBox)
Vue.use(VueMasonry);
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);


/*
if(window.location.pathname == "/login"){

	Vue.component('login-component', require('./Pages/login.vue').default);

	const app = document.getElementById('app');
	new Vue({
	    vuetify: Vuetify,
	}).$mount(app);

}else {*/


const app = document.getElementById('app');
new Vue({
    vuetify: Vuetify,
    created () {
        AOS.init()
    },
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);

/*}*/
