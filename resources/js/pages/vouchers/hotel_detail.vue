<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="head-content text-center">
          <h3>{{ voucher.title }}</h3>
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
            <b-list-group-item>✅ ฟรีอาหารเช้า </b-list-group-item>
            <b-list-group-item>✅ ฟรีไวไฟ</b-list-group-item>

            <b-list-group-item>✅ ราคาพิเศษ</b-list-group-item>
            <b-list-group-item>✅ หมดอายุ: 31/12/2021</b-list-group-item>
            <b-list-group-item
              >✅ พักได้ยาวแม้เป็นวันหยุดนักขัตฤกษ์</b-list-group-item
            >
          </b-list-group>
        </div>
        <div class="col-md-4 detail-price">
          <h3 class="mt-5">
            Two Bedroom Pool Villa
            <hr />
            {{ voucher.price }} บาท
          </h3>
        </div>
      </div>
    </div>

    <hr />

    <div class="hotel-detail-content">
      <div class="row">
        <div class="adult col-md-8 detail-list">
          <b-list-group>
            <b-list-group-item>✅ เด็กอายุ 4-10 ปี </b-list-group-item>
            <b-list-group-item>✅ ฟรีอาหารเช้า</b-list-group-item>
            <b-list-group-item>✅ ไลฟ์สไตล์ท่องเที่ยว</b-list-group-item>

            <b-list-group-item>✅ ราคาพิเศษ</b-list-group-item>
            <b-list-group-item>✅ หมดอายุ: 31/12/2021</b-list-group-item>
            <b-list-group-item
              >✅ พักได้ยาวแม้เป็นวันหยุดนักขัตฤกษ์</b-list-group-item
            >
          </b-list-group>
        </div>
        <div class="col-md-4 detail-price">
          <h3 class="mt-5">
            One Bedroom Duplex Pool Suit
            <hr />
            {{ voucher.child_price }} บาท
          </h3>
        </div>
      </div>
    </div>

    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img4.jpg" alt="" width="100%" />
        </div>
        <div class="col-md-5 mt-2">
          <p>VoucherChiangMai</p>
          <p>🚩 เชียงใหม่</p>
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
        </div>
      </div>
    </div>

    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-4 text-center mb-2">
          <h6>20</h6>
          <small class="text-muted">รายการ</small>
        </div>
        <div class="col-md-4 text-center mb-2">
          <h6>4</h6>
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
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img3.jpg" />
          <div class="same-shop-price">1,200 บาท</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img4.jpg" />
          <div class="same-shop-price">1,590 บาท</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img5.jpg" />
          <div class="same-shop-price">1,100 บาท</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img6.jpg" />
          <div class="same-shop-price">1,090 บาท</div>
        </div>
      </div>
      <hr />
    </div>

    <div class="vc-box shadow mt-5 mb-5">
      <div class="row">
        <div class="col-md-4 text-center mb-2">
          <router-link :to="{ name: 'hotel.chat', params: { id: id } }"
            ><button class="btn btn-primary btn-buy">
              ติดต่อร้านค้า
            </button></router-link
          >
        </div>
        <div class="col-md-4 text-center mb-2">
          <router-link :to="{ name: 'hotel.stock', params: { id: id } }"
            ><button class="btn btn-primary btn-buy">
              เพิ่มลงตะกร้า
            </button></router-link
          >
        </div>
        <div class="col-md-4 text-center mb-2">
          <router-link :to="{ name: 'hotel.detail', params: { id: id } }"
            ><button class="btn btn-primary btn-buy">
              ซื้อเลย
            </button></router-link
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { vouchers } from "../../dataMockup";

export default {
  middleware: "auth",
  data: () => ({
    vouchers,
  }),
  computed: {
    id() {
      return this.$route.params.id;
    },
    voucher() {
      let vouchersItems = [];
      this.vouchers.forEach((el) => {
        let v = el.vouchers;

        if (v) {
          vouchersItems.push(...v);
        }
      });
      return vouchersItems.find((el) => el.id == this.id);
    },
  },
};
</script>

<style>
</style>
