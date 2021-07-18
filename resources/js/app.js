import './bootstrap';

Vue.component('example-component', require('./components/ExampleComponent.vue'  ).default);
Vue.component('dropdown', require('./components/Dropdown.vue').default);

const app = new Vue({
    el: '#app',
});