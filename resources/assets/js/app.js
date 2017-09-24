require('./bootstrap');
window.Vue = require('vue');

import store from './store';

import Todos from './components/Todos.vue';
import Burndown from './components/Burndown.vue';

const app = new Vue({
    name: 'WSTodos',
    el: '#app',
    store,
    components: { Todos, Burndown }
});
