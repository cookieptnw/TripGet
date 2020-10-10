import Vue from "vue";

Vue.component("pagination", require("laravel-vue-pagination"));
import "vue-sidebar-menu/dist/vue-sidebar-menu.css";

const APIUrl = window.config.apiUrl;
const api = p => `${APIUrl}api/${p}`;
Vue.prototype.$api = api;

import vUploader from "v-uploader";

// v-uploader plugin global config
const uploaderConfig = {
  // file uploader service url
  uploadFileUrl: api("image/upload"),
  // file delete service url
  deleteFileUrl: "http://xxx/upload/deleteUploadFile",
  // set the way to show upload message(upload fail message)
  showMessage: (vue, message) => {
    //using v-dialogs to show message
    vue.$dlg.alert(message, { messageType: "error" });
  }
};

// install plugin with options
Vue.use(vUploader, uploaderConfig);
