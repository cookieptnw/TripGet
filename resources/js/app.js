import Vue from "vue";
import store from "~/store";
import router from "~/router";
import i18n from "~/plugins/i18n";
import App from "~/components/App";
import Mixins from "./mixins";

import "~/plugins";
import "~/adminImport";

import "~/components";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.mixin(Mixins);

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
Vue.config.productionTip = false;
import VueCarousel from "vue-carousel";
Vue.use(VueCarousel);

// Addd Directrive

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
});
