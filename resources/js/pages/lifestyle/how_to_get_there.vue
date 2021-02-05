<template>
  <div class="container">
    <div class="clearfix">
      <div class="float-left">
        <router-link to="/lifestyle">
          <i class="fas fa-arrow-left fa-2x pr-2 text-dark"></i>
        </router-link>
      </div>
      <div class="float-left">
        <h2 class="text-primary">วิธีการเดินทาง</h2>
      </div>
    </div>
    <hr />

    <button
      class="w-100 btn mb-2"
      v-for="item in items"
      :class="activeClass(item.active)"
      :key="item.id"
      @click="setActive(item.id)"
    >
      {{ item.name }}
    </button>
  </div>
</template>

<script>
import axios from "axios";
import { findIndex, find } from "lodash";

export default {
  props: {
    vid: {
      default: false
    }
  },
  data: () => ({
    items: []
  }),
  methods: {
    async getData() {
      const { data } = await axios.get(
        `/api/lifestyle/how_to_get_there/${
          this.vid ? `?voucher_id=${this.vid}` : ""
        }`
      );
      this.items = data.result;
    },
    async setActive(id) {
      let i = findIndex(this.items, el => el.id == id);
      this.items[i].active = !this.items[i].active;
      const { data } = await axios.post(
        `/api/lifestyle/set/${id}/${this.vid ? `?voucher_id=${this.vid}` : ""}`
      );
    },
    activeClass(status) {
      return status ? "btn-primary" : "btn-outline-primary";
    }
  },
  created() {
    this.getData();
  }
};
</script>

<style></style>
