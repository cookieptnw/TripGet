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
              <input
                type="checkbox"
                v-if="input.type == 'checkbox'"
                v-model="form[input.name]"
                :required="input.required"
                class="ml-2"
              />
              <br />
              <label class="text-secondary" v-if="input.description"
                >{{ input.description }}
              </label>

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
                    :step="input.step ? input.step : false"
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

              <div v-if="input.type == 'textarea'">
                <textarea
                  :required="input.required"
                  :placeholder="`Enter ${input.title}...`"
                  v-model="form[input.name]"
                  cols="150"
                  class="w-100 form-control mb-3"
                ></textarea>
              </div>

              <div v-if="input.type == 'relationSelect'">
                <select
                  :required="input.required"
                  :placeholder="`Enter ${input.title}...`"
                  v-model="form[input.name]"
                  cols="150"
                  class="w-100 form-control mb-3"
                  v-if="input.items"
                >
                  <option :value="null">-- Please Select --</option>
                  <option
                    v-for="item in input.items.data"
                    :key="item.id"
                    :value="item.id"
                  >
                    {{ item.name }}
                  </option>
                </select>
              </div>
            </div>

            <hr />
            <h4>Detail</h4>
            <div class="row py-4">
              <div
                v-for="(item, index) in form.details"
                :key="index"
                class="col-4"
              >
                <card class="mt-4" v-if="item">
                  <!-- <button
                    @click="addDetailMore()"
                    type="button"
                    class="btn btn-info position-absolute"
                    style="right: 10px; margin-top: -30px"
                    v-if="index + 1 >= form.details.length"
                  >
                    +
                  </button> -->

                  <button
                    @click="delDetail(index)"
                    type="button"
                    class="btn btn-danger position-absolute"
                    style="right: 70px; margin-top: -30px"
                    v-if="index != 0"
                  >
                    -
                  </button>
                  <div class="form-group">
                    <label for="">Description</label>
                    <input
                      type="text"
                      :name="index + 'd'"
                      :id="index + 'd'"
                      v-model="form.details[index]['description']"
                      class="form-control"
                    />
                  </div>

                  <div class="form-group" v-if="item">
                    <label for="">Amount</label>
                    <input
                      type="text"
                      :name="index + 'a'"
                      :id="index + 'd'"
                      v-model="form.details[index]['amount']"
                      class="form-control"
                    />

                    <small id="helpId" class="text-muted"
                      >จำนวนครั้งที่ใช้ได้ หากเป็นคำอธิบายให้กรอก 0</small
                    >
                  </div>
                </card>
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
      category_id: null,
      hotel_id: null,
      name: "",
      description: "",
      price: "",
      start_date: "",
      end_date: "",
      holiday_open: 0,
      weekend_open: 0,
      discount: "",
      day_use: "",
      not_refund: 0,
      pet_allow: 0,
      details: [
        {
          description: null,
          amount: 0,
        },
        {
          description: null,
          amount: 0,
        },
        {
          description: null,
          amount: 0,
        },
        {
          description: null,
          amount: 0,
        },
        {
          description: null,
          amount: 0,
        },
        {
          description: null,
          amount: 0,
        },
        {
          description: null,
          amount: 0,
        },
        {
          description: null,
          amount: 0,
        },
      ],
    }),
    detailTemplate: {
      description: null,
      amount: 0,
    },
    item: {},
    details: [],
    isCreate: true,
    pageTitle: "Voucher",
    uploadName: "",
    inputs: [
      {
        title: "Image",
        name: "image_url",
        type: "image",
      },
      {
        title: "hotel",
        name: "hotel_id",
        type: "relationSelect",
        relationName: "hotels_me",
        items: [],
      },
      {
        title: "Category",
        name: "category_id",
        type: "relationSelect",
        relationName: "voucher_categories",
        items: [],
      },
      {
        title: "Name",
        name: "name",
        type: "text",
        required: true,
      },
      {
        title: "Description",
        name: "description",
        type: "textarea",
        required: true,
      },
      {
        title: "Price",
        name: "price",
        type: "number",
        step: "0.01",
        required: true,
      },
      {
        title: "Start Date",
        name: "start_date",
        type: "date",
        required: true,
      },
      {
        title: "End Date",
        name: "end_date",
        type: "date",
        required: true,
      },
      {
        title: "Holiday Open",
        name: "holiday_open",
        type: "checkbox",
      },
      {
        title: "Weekend Open",
        name: "weekend_open",
        type: "checkbox",
      },
      {
        title: "Discount",
        name: "discount",
        type: "number",
        required: true,
      },
      {
        title: "Day use",
        name: "day_use",
        type: "number",
        required: true,
      },
      {
        title: "Not Refund",
        name: "not_refund",
        type: "checkbox",
      },
      {
        title: "Pet Allow",
        name: "pet_allow",
        type: "checkbox",
      },
    ],
  }),
  methods: {
    addDetailMore() {
      this.form.details.push(this.detailTemplate);
    },
    delDetail(index) {
      this.form.details.splice(index, 1);
    },
    async fetchShow() {
      const { data } = await this.form
        .get(this.$api(this.pageName + "/" + this.id))
        .catch();
      this.item = data.result;
    },
    async fetchRelation(name, index) {
      const { data } = await this.form
        .get(this.$api(name), {
          params: {
            item: 99,
          },
        })
        .catch();

      if (!this.inputs[index]["items"]) {
        console.log("please add items on " + name);
      }
      this.inputs[index]["items"] = data.items;
    },
    async checkRelation() {
      let inputs = this.inputs;
      if (inputs.length) {
        let _this = this;
        inputs.forEach(async (el, index) => {
          if (el.type == "relationSelect") {
            if (el.relationName) {
              await _this.fetchRelation(el.relationName, index);
            } else {
              console.log(`${el.name} need relationName`);
            }
          }
        });
      }
    },
    async submitForm() {
      if (this.isCreate) {
        const { data } = await this.form.post(this.$api(this.pageName)).catch();
        this.$router.push({ name: this.pageName });
      } else {
        const { data } = await this.form
          .post(this.$api(this.pageName + `/${this.id}/update`))
          .catch();
        this.$router.push({ name: this.pageName });
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
    this.checkRelation();
    this.addDetailMore();

    if (this.id) {
      this.isCreate = false;
      await this.fetchShow();
      this.form.keys().forEach((key) => {
        this.form[key] = this.item[key];
      });

      let _this = this;

      while (this.form.details.length < 9) {
        this.addDetailMore();
      }

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
