<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="head-content text-center">
          <h3>{{ voucher.name }}</h3>
        </div>
      </div>
      <div class="col-md-6">
        <b-form-rating
          class="detail-rating text-center"
          id="rating-inline"
          inline
          value="4"
        ></b-form-rating>
      </div>
    </div>

    <div class="hotel-detail-content">
      <div class="row">
        <div class="adult col-md-8 detail-list">
          <b-list-group>
            <b-list-group-item
              v-for="detail in voucher.details"
              :key="detail.id"
              >✅ {{ detail.description }}
              {{ detail.amount ? `x ${detail.amount}` : "" }}
            </b-list-group-item>
          </b-list-group>
        </div>
        <div class="col-md-4 detail-price">
          <h3 class="mt-5">
            ราคาห้องพัก
            <hr />
            {{ voucher.price }} บาท
          </h3>
        </div>
      </div>
    </div>

    <hr />
    <div class="mt-5 mb-5">
      <div class="row">
        <div class="col-md-6 text-center mb-2">
          <button
            class="btn btn-success btn-buy"
            @click="addCart({ cart: voucher })"
          >
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
            &nbsp;เพิ่มลงตะกร้า
          </button>
        </div>
        <div class="col-md-6 text-center mb-2">
          <router-link :to="{ name: 'hotel.detail', params: { id: id } }"
            ><button class="btn btn-info btn-buy">
              <i class="fas fa-money-bill-wave"></i> &nbsp; ซื้อเลย
            </button></router-link
          >
        </div>
      </div>
    </div>

    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img4.jpg" alt="" width="100%" />
        </div>
        <div class="col-md-5 mt-2">
          <p>{{ voucher.hotel.name }}</p>
          <p>🚩 {{ voucher.hotel.province.name }}</p>
        </div>
        <div class="col-md-4 mt-2">
          <router-link :to="{ name: 'hotel.detail', params: { id: 1 } }"
            ><button class="btn btn-outline-primary btn-buy">
              ดูรายละเอียดร้านค้า
            </button></router-link
          >
          <router-link :to="{ name: 'hotel.shop', params: { id: 2 } }"
            ><button class="btn btn-outline-primary btn-buy">
              ดูร้านค้าเพิ่มเติม
            </button></router-link
          >
          <router-link :to="{ name: 'hotel.chat', params: { id: id } }"
            ><button class="btn btn-outline-primary btn-buy">
              ติดต่อร้านค้า
            </button></router-link
          >
        </div>
      </div>
    </div>

    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-4 text-center mb-2">
          <h6>20 <i class="fas fa-clipboard-list"></i></h6>

          <small class="text-muted">รายการ</small>
        </div>
        <div class="col-md-4 text-center mb-2">
          <h6>4 <i class="fas fa-store"></i></h6>
          <small class="text-muted">คะแนนร้านค้า</small>
        </div>
        <div class="col-md-4 text-center mb-2">
          <h6>98%</h6>
          <small class="text-muted">การตอบกลับ</small>
        </div>
      </div>
    </div>

    <div class="head-content text-center mt-5">
      <h3>รายการอื่น ๆ จากร้านค้านี้</h3>
      <hr />
      <div class="row">
        <div
          class="col-md-3 same-shop-img mb-2 d-flex"
          v-for="item in voucher.hotel.vouchers"
          :key="item.id"
        >
          <a :href="`/voucher/${item.id}`" style="display: block; width: 100%">
            <img :src="item.image_url" />
            <div class="same-shop-price">฿ &nbsp;{{ item.price }} บาท</div>
          </a>
        </div>
      </div>
      <hr />
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
      return this.$route.params.id;
    },
    query() {
      return this.$route.query;
    },

    ...mapGetters({
      voucher: "voucher/item",
    }),
  },
  methods: {
    ...mapActions({
      fetch: "voucher/show",
      addCart: "cart/add",
    }),
  },
  async created() {
    console.log(this.query);
    await this.fetch({ id: this.key, query: this.query });
    this.name = this.voucher.name;
  },
  metaInfo() {
    return { title: this.name };
  },
};
</script>

<style>
</style>
