import Vue from "vue";
import store from "~/store";
import router from "~/router";
import i18n from "~/plugins/i18n";
import App from "~/components/App";
import Mixins from "./mixins";

import "~/plugins";
import "~/components";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
import "vue-sidebar-menu/dist/vue-sidebar-menu.css";
Vue.mixin(Mixins);

Vue.component("pagination", require("laravel-vue-pagination"));

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
Vue.config.productionTip = false;
import VueCarousel from "vue-carousel";
Vue.use(VueCarousel);
/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
});
