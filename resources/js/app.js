import './bootstrap';

Vue.component('example-component', require('./components/ExampleComponent.vue'  ).default);
Vue.component('dropdown', require('./components/Dropdown.vue').default);
Vue.component('flash', require('./components/Flash.vue').default);

const app = new Vue({
    el: '#app',
});
