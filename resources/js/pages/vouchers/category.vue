<template>
  <div class="container">
    <h1 class="py-3">{{ show.name }}</h1>
    <hr />
    <form class="mb-5">
      <div class="form-filter">
        <div class="row">
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>จังหวัด</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>ราคา</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>วัน</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group-search float-left">
              <input
                type="text"
                class="form-control"
                id="validationDefault03"
                placeholder="ค้นหา"
              />
            </div>
            <button
              class="btn btn-warning form-group-submit float-left"
              type="submit"
            >
              +
            </button>
          </div>
        </div>
      </div>
    </form>

    <div v-if="show.vouchers_approves && show.vouchers_approves.length">
      <div
        class="hotel-list shadow mb-4"
        v-for="(item, index) in show.vouchers_approves"
        :key="index"
      >
        <div class="row">
          <div class="col-md-3">
            <img :src="item.image_url" width="100%" height="100%" />
          </div>
          <div class="col-md-9">
            <b-card-text>
              <div class="card-body">
                <h5 class="card-title">{{ item.name }}</h5>
                <p class="card-text">
                  {{ item.description }}
                </p>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <div class="hotel-rating-bar">
                      <div>
                        <b-form-rating
                          id="rating-inline"
                          inline
                          value="4"
                        ></b-form-rating>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <div class="hotel-price">
                      <h6 class="text-right mt-3 mb-3 w-100">
                        {{ item.price }} บาท
                      </h6>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="hotel-voucher">
                      <h6 class="text-right">
                        <router-link
                          :to="{
                            name: 'hotel.detail',
                            params: { id: item.id },
                          }"
                          ><button class="btn btn-outline-primary btn-buy">
                            ซื้อเลย
                          </button></router-link
                        >
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </b-card-text>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  middleware: "auth",
  data: () => ({
    name: "Loading..",
  }),
  computed: {
    key() {
      return this.$route.params.key;
    },

    ...mapGetters({
      show: "category/item",
    }),
  },
  methods: {
    ...mapActions({
      fetch: "category/show",
    }),
  },
  async created() {
    await this.fetch({ id: this.key });
    this.name = this.show.name;
  },
  metaInfo() {
    return { title: this.name };
  },
};
</script>

<style></style>
