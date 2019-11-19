require("./bootstrap");

window.Vue = require("vue");

Vue.component('example-component', require("./components/ExampleComponent.vue").default);
Vue.component('posts', require("./components/Posts.vue").default);



const app = new Vue({
    el: '#app'
});
