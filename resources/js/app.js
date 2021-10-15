import "./bootstrap";

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("dropdown", require("./components/Dropdown.vue").default);
Vue.component("flash", require("./components/Flash.vue").default);
Vue.component("reply", require("./components/Reply.vue").default);
Vue.component("favorite", require("./components/Favorite.vue").default);

const app = new Vue({
    el: "#app"
});
