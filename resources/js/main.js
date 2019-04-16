import Vue from 'vue';
import { router } from './router';
import request from './service/request';
import moment from 'moment';
import App from './App';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCheck, faSpinner, faPlus, faMinus, faChevronLeft, faChevronRight, faList, faCocktail } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faCheck, faSpinner, faPlus, faMinus, faChevronLeft, faChevronRight, faList, faCocktail);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.filter('formatNumber', value => {
    let number = parseFloat(value);
    let options = { minimumFractionDigits: 2, style: 'currency', currency: 'EUR' };
    return number.toLocaleString("nl-NL", options);
});

Vue.config.productionTip = false;

Vue.prototype.$http = request;
Vue.prototype.$moment = moment;

new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
