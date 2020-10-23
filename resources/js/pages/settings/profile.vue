<template>
  <card :title="$t('your_info')">
    <form @submit.prevent="update" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('info_updated')" />

      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">ชื่อ</label>
        <div class="col-md-7">
          <input
            v-model="form.first_name"
            :class="{ 'is-invalid': form.errors.has('first_name') }"
            class="form-control"
            type="text"
            name="name"
          />
          <has-error :form="form" field="first_name" />
        </div>
      </div>

      <!-- LName -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">นามสกุล</label>
        <div class="col-md-7">
          <input
            v-model="form.last_name"
            :class="{ 'is-invalid': form.errors.has('last_name') }"
            class="form-control"
            type="text"
            name="last_name"
          />
          <has-error :form="form" field="last_name" />
        </div>
      </div>

      <!-- LName -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">วันเกิด</label>
        <div class="col-md-7">
          <input
            v-model="form.birth_date"
            :class="{ 'is-invalid': form.errors.has('birth_date') }"
            class="form-control"
            type="date"
            name="birth_date"
          />
          <has-error :form="form" field="birth_date" />
        </div>
      </div>

      <!-- Email -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{
          $t("email")
        }}</label>
        <div class="col-md-7">
          <input
            v-model="form.email"
            :class="{ 'is-invalid': form.errors.has('email') }"
            class="form-control"
            type="email"
            name="email"
          />
          <has-error :form="form" field="email" />
        </div>
      </div>

      <!-- Mobile -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">เบอร์โทร</label>
        <div class="col-md-7">
          <input
            v-model="form.tel"
            :class="{ 'is-invalid': form.errors.has('tel') }"
            class="form-control"
            type="tel"
            name="tel"
          />
          <has-error :form="form" field="email" />
        </div>
      </div>

      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button :loading="form.busy" type="success">อัพเดท</v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
import Form from "vform";
import { mapGetters } from "vuex";

export default {
  scrollToTop: false,

  metaInfo() {
    return { title: this.$t("settings") };
  },

  data: () => ({
    form: new Form({
      first_name: "",
      last_name: "",
      tel: "",
      birth_date: "",
      email: "",
    }),
  }),

  computed: mapGetters({
    user: "auth/user",
  }),

  created() {
    // Fill the form with user data.
    this.form.keys().forEach((key) => {
      this.form[key] = this.user[key];
    });
  },

  methods: {
    async update() {
      const { data } = await this.form.patch("/api/settings/profile");

      this.$store.dispatch("auth/updateUser", { user: data });
    },
  },
};
</script>
