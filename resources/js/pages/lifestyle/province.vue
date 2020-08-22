<template>
  <div>
    <h2 class="text-primary">
      Province
    </h2>
    <hr />
    <section>
      <h3>ภาคกลาง</h3>
      <button
        class="btn  mr-2 mb-2"
        :class="activeClass(item.active)"
        v-for="(item, index) in getProvinceByGeo('ภาคกลาง')"
        v-if="index <= g1"
        :key="item.id"
        @click="setActive(item.id)"
      >
        {{ item.name }}
      </button>
      <div class="w-100">
        <button
          class="btn btn-outline-secondary w-100"
          @click="g1 += 6"
          v-if="g1 <= getProvinceByGeo('ภาคกลาง').length"
        >
          Other
        </button>
      </div>
    </section>
    <hr />

    <section>
      <h3>ภาคเหนือ</h3>
      <button
        class="btn  mr-2 mb-2"
        :class="activeClass(item.active)"
        v-for="(item, index) in getProvinceByGeo('ภาคเหนือ')"
        v-if="index <= g2"
        :key="item.id"
        @click="setActive(item.id)"
      >
        {{ item.name }}
      </button>
      <div class="w-100">
        <button
          class="btn btn-outline-secondary w-100"
          @click="g2 += 6"
          v-if="g2 <= getProvinceByGeo('ภาคเหนือ').length"
        >
          Other
        </button>
      </div>
    </section>
    <hr />

    <section>
      <h3>ภาคตะวันออกเฉียงเหนือ</h3>
      <button
        class="btn mr-2 mb-2"
        :class="activeClass(item.active)"
        v-for="(item, index) in getProvinceByGeo('ภาคตะวันออกเฉียงเหนือ')"
        v-if="index <= g3"
        :key="item.id"
        @click="setActive(item.id)"
      >
        {{ item.name }}
      </button>
      <div class="w-100">
        <button
          class="btn btn-outline-secondary w-100"
          @click="g3 += 6"
          v-if="g3 <= getProvinceByGeo('ภาคตะวันออกเฉียงเหนือ').length"
        >
          Other
        </button>
      </div>
    </section>
    <hr />
    <section>
      <h3>ภาคใต้</h3>
      <button
        class="btn mr-2 mb-2"
        :class="activeClass(item.active)"
        v-for="(item, index) in getProvinceByGeo('ภาคใต้')"
        v-if="index <= g4"
        :key="item.id"
        @click="setActive(item.id)"
      >
        {{ item.name }}
      </button>
      <div class="w-100">
        <button
          class="btn btn-outline-secondary w-100"
          @click="g4 += 6"
          v-if="g4 <= getProvinceByGeo('ภาคใต้').length"
        >
          Other
        </button>
      </div>
    </section>

    <br />
    <br />
  </div>
</template>

<script>
import axios from "axios";
import { findIndex, find } from "lodash";

export default {
  data: () => ({
    provinces: [],
    g1: 6,
    g2: 6,
    g3: 6,
    g4: 6
  }),
  methods: {
    async getProvince() {
      const { data } = await axios.get("/api/lifestyle/province");
      this.provinces = data.result;
    },
    getProvinceByGeo(geo) {
      return this.provinces.filter(el => el.group == geo);
    },
    async setActive(id) {
      let i = findIndex(this.provinces, el => el.id == id);
      this.provinces[i].active = !this.provinces[i].active;
      console.log(this.provinces[i]);
      const { data } = await axios.post(`/api/lifestyle/set/${id}`);
    },
    activeClass(status) {
      return status ? "btn-primary" : "btn-outline-primary";
    }
  },
  created() {
    this.getProvince();
  }
};
</script>

<style></style>
