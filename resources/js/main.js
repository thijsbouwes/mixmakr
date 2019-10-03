import Vue from 'vue';
import { router } from './router';
import request from './service/request';
import Auth from "./service/auth-service";
import moment from 'moment';
import Echo from "laravel-echo"
import Pusher from "pusher-js"
import App from './App';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCheck, faSpinner, faPlus, faMinus, faChevronLeft, faChevronRight, faList, faCocktail, faCog, faArrowLeft, faTimes } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faCheck, faSpinner, faPlus, faMinus, faChevronLeft, faChevronRight, faList, faCocktail, faCog, faArrowLeft, faTimes);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.filter('formatNumber', value => {
    let number = parseFloat(value);
    let options = { minimumFractionDigits: 2, style: 'currency', currency: 'EUR' };
    return number.toLocaleString("nl-NL", options);
});

Vue.config.productionTip = false;

Vue.prototype.$http = request;
Vue.prototype.$moment = moment;

Vue.prototype.$echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    auth: {headers: { Authorization: Auth.getToken() }},
    cluster: 'eu',
    encrypted: true
});

new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
