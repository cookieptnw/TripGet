<template>
  <div class="p-5 row">
    <div class="col-11 col-lg-11 m-auto">
      <card>
        <button class="btn btn-danger" @click="backToMainPage()">Back</button>
        <h4 class="mt-4">{{ isCreate ? "Create" : "Edit" }} {{ pageTitle }}</h4>
        <hr />

        <div class="from-loop">
          <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
            <div v-for="(input, index) in inputs" :key="index" class="h-6">
              <label>{{ input.title }}</label>
              <br />
              <label class="text-secondary" v-if="input.description">{{
                input.description
              }}</label>

              <div
                class="inputText"
                v-if="
                  input.type == 'text' ||
                  input.type == 'number' ||
                  input.type == 'date'
                "
              >
                <div class="input-group mb-3">
                  <input
                    :type="input.type"
                    class="form-control"
                    id="basic-url"
                    aria-describedby="basic-addon3"
                    :placeholder="`Enter ${input.title}...`"
                    :required="input.required"
                    v-model="form[input.name]"
                  />
                </div>
              </div>

              <!-- ////////// TEXT NUMBER DATE//////////// -->

              <div v-if="input.type == 'image'">
                <v-uploader
                  @done="uploadDone"
                  :before-upload="setUploadName(input.name)"
                  language="en"
                  :preview-width="input.imageWidth"
                  :preview-height="input.imageHeight"
                  file-type-exts="jpeg,png,jpg"
                  :preview-img="input.image_url"
                ></v-uploader>
              </div>
            </div>

            <v-button :loading="form.busy" class="w-100"
              >{{ isCreate ? "Create" : "Update" }} {{ pageTitle }}</v-button
            >
          </form>
        </div>
      </card>
    </div>
  </div>
</template>

<script>
import Form from "vform";
import { findIndex } from "lodash";
export default {
  data: () => ({
    form: new Form({
      title: "",
      date: "",
      image_url: "",
    }),
    item: {},
    isCreate: true,
    pageTitle: "Voucher Categories",
    uploadName: "",
    inputs: [
      {
        title: "Image",
        name: "image_url",
        type: "image",
        description:
          "*ขนาดรูปภาพ 500 × 270 รองรับเฉพาะสกุลไฟล์ภาพ(PNG/JPEG)เท่านั้น",
        imageWidth: 500,
        imageHeight: 270,
        image_url: "",
      },
      {
        title: "Name",
        name: "name",
        type: "text",
        required: true,
      },
    ],
  }),
  methods: {
    async fetchShow() {
      const { data } = await this.form
        .get(this.$api(this.pageName + "/" + this.id))
        .catch();
      this.item = data.result;
    },
    async submitForm() {
      if (this.isCreate) {
        const { data } = await this.form.post(this.$api(this.pageName)).catch();
        this.$router.push({ name: this.pageName });
      } else {
        const { data } = await this.form
          .post(this.$api(this.pageName + `/${this.id}/update`))
          .catch();
      }
    },
    backToMainPage() {
      this.$router.push({ name: this.pageName });
    },
    uploadDone(files) {
      if (files) {
        this.form[this.uploadName] = files[0].url;
      }
    },
    setUploadName(a) {
      this.uploadName = a;
    },
  },
  computed: {
    pageName() {
      return this.$route.name.split(".")[0];
    },
    id() {
      return this.$route.params.id;
    },
  },
  async created() {
    if (this.id) {
      this.isCreate = false;
      await this.fetchShow();

      this.form.keys().forEach((key) => {
        this.form[key] = this.item[key];
      });

      let _this = this;

      this.inputs.forEach((el, key) => {
        if (el.type == "image") {
          _this.inputs[key].image_url = this.form[el.name];
        }
      });
    }
  },
};
</script>

<style></style>
