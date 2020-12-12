<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <input
            type="text"
            v-model="result"
            class="form-control"
            placeholder="กรอกรหัส"
          />
        </div>
        <div class="col-4">
          <button class="btn btn-primary w-100" @click="go()">ไป</button>
        </div>
      </div>
    </div>

    <hr />
    <qrcode-stream @decode="onDecode" @init="onInit"></qrcode-stream>
  </div>
</template>

<script>
import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from "vue-qrcode-reader";

export default {
  components: {
    QrcodeStream,
    QrcodeDropZone,
    QrcodeCapture,
  },

  data() {
    return {
      result: "",
      error: "",
    };
  },
  middleware: "auth",

  methods: {
    onDecode(result) {
      this.result = result;
      this.go();
    },
    go() {
      this.$router.push({
        name: "qrUse",
        params: {
          key: this.result,
        },
      });
    },

    async onInit(promise) {
      try {
        await promise;
      } catch (error) {
        if (error.name === "NotAllowedError") {
          this.error = "ERROR: you need to grant camera access permisson";
        } else if (error.name === "NotFoundError") {
          this.error = "ERROR: no camera on this device";
        } else if (error.name === "NotSupportedError") {
          this.error = "ERROR: secure context required (HTTPS, localhost)";
        } else if (error.name === "NotReadableError") {
          this.error = "ERROR: is the camera already in use?";
        } else if (error.name === "OverconstrainedError") {
          this.error = "ERROR: installed cameras are not suitable";
        } else if (error.name === "StreamApiNotSupportedError") {
          this.error = "ERROR: Stream API is not supported in this browser";
        }
      }
    },
  },
};
</script>

<style>
</style>
