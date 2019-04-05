import Vue from 'vue';
import { router } from './router';
import request from './service/request';
import moment from 'moment';
import App from './App';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCheck, faSpinner } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faCheck, faSpinner);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.config.productionTip = false;

Vue.prototype.$http = request;
Vue.prototype.$moment = moment;

new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
