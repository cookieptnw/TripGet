<template>
  <div>
    <div class="form-filter">
      <div class="row">
        <div class="col-md-2 col-sm-12">
          <div class="form-group">
            <select class="form-control" v-model="category_id">
              <option
                v-for="item in categories"
                :key="item.id"
                :value="item.id"
              >
                {{ item.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="col-md-2 col-sm-12">
          <div class="form-group">
            <select class="form-control" v-model="province_id">
              <option :value="null">จังหวัด</option>

              <option v-for="item in provinces" :key="item.id" :value="item.id">
                {{ item.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="col-md-2 col-sm-12">
          <div class="form-group">
            <select class="form-control" id="exampleFormControlSelect1">
              <option :value="null">ราคา</option>
              <option value="1">น้อยกว่า1,000</option>
              <option value="2">1,000-1,500</option>
              <option value="3">1,500-2,000</option>
              <option value="4">มากกว่า3,000</option>
            </select>
          </div>
        </div>
        <div class="col-md-2 col-sm-12">
          <div class="form-group">
            <select class="form-control" v-model="day_id">
              <option :value="null">วัน</option>
              <option value="1">1 วัน</option>
              <option value="2">2 วัน</option>
              <option value="3">3 วัน</option>
              <option value="4">4 วัน</option>
              <option value="5">5 วัน</option>
            </select>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="form-group-search float-left">
            <input
              type="text"
              class="form-control"
              id="validationDefault03"
              placeholder="ค้นหา"
              v-model="q"
            />
          </div>
          <button
            class="btn btn-warning form-group-submit float-left"
            type="submit"
            @click="search()"
          >
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "CatSearch",
  data: () => ({
    province_id: null,
    category_id: 1,
    price_id: null,
    day_id: null,
    q: "",

    provinces: [],
    categories: [],
  }),

  computed: {
    query() {
      return this.$route.query;
    },
  },
  methods: {
    async fetch(name) {
      const { data } = await axios.get(this.$api(name));
      return data.items.data;
    },
    search() {
      if (this.$route.name == "category") {
        this.$router.push({
          name: "category",
          params: { key: "search" },
          qs: {
            province_id: this.province_id,
            category_id: this.category_id,
            price_id: this.price_id,
            day_id: this.day_id,
            q: this.q,
          },
        });
      }
      this.$router.push({
        name: "category",
        params: { key: "search" },
        query: {
          province_id: this.province_id,
          category_id: this.category_id,
          price_id: this.price_id,
          day_id: this.day_id,
          q: this.q,
        },
      });
    },
  },
  async created() {
    this.provinces = await this.fetch("lifestyle/province");
    this.categories = await this.fetch("voucher_categories");
    let q = this.query;
    if (q.province_id) {
      this.province_id = q.province_id;
    }
    if (q.category_id) {
      this.category_id = q.category_id;
    }
    if (q.price_id) {
      this.price_id = q.price_id;
    }
    if (q.day_id) {
      this.day_id = q.day_id;
    }
    if (q.q) {
      this.day_id = q.q;
    }
  },
};
</script>

<style>
</style>
