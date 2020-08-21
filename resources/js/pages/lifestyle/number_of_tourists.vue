<template>
  <div>
    <h2 class="text-primary">
      Number of tourists
    </h2>
    <hr />

    <button
      class="w-100 btn  mb-2"
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
  data: () => ({
    items: []
  }),
  methods: {
    async getData() {
      const { data } = await axios.get("/api/lifestyle/number_of_tourists");
      this.items = data.result;
    },
    async setActive(id) {
      let i = findIndex(this.items, el => el.id == id);
      this.items[i].active = !this.items[i].active;
      const { data } = await axios.post(`/api/lifestyle/set/${id}`);
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
