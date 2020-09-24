<template>
  <div>
    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img4.jpg" alt="" width="100%" />
        </div>
        <div class="col-md-5 mt-2">
          <p>VoucherChiang Mai</p>
          <p>🚩 Chiang Mai</p>
        </div>
        <div class="col-md-4 mt-2">
          <router-link :to="{ name: 'hotel.detail', params: { id: 1 } }"
            ><button class="btn btn-outline-primary btn-buy">
              VIEW
            </button></router-link
          >
          <router-link :to="{ name: 'hotel.shop', params: { id: 1 } }"
            ><button class="btn btn-outline-primary btn-buy">
              SHOP
            </button></router-link
          >
        </div>
      </div>
    </div>

    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-4 text-center mb-2">
          <h6>20</h6>
          <small class="text-muted">Product</small>
        </div>
        <div class="col-md-4 text-center mb-2">
          <h6>4</h6>
          <small class="text-muted">Rating</small>
        </div>
        <div class="col-md-4 text-center mb-2">
          <h6>98%</h6>
          <small class="text-muted">Chat Response</small>
        </div>
      </div>
    </div>

    <div class="head-content">
      <div class="row">
        <div class="col col-md-8">
          <h3>Flash Sale</h3>
        </div>
        <div class="col col-md-4 text-right mt-3">
          <a href="#" class="text-right">SEE ALL ></a>
        </div>
      </div>
    </div>

    <div class="head-content text-center mt-2">
      <hr />
      <div class="row">
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img3.jpg" />
          <div class="flash-sale-shop-price">399$</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img4.jpg" />
          <div class="flash-sale-shop-price">499$</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img5.jpg" />
          <div class="flash-sale-shop-price">599$</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img6.jpg" />
          <div class="flash-sale-shop-price">699$</div>
        </div>
      </div>
      <hr />
    </div>

    <div class="card-deck">
      <div class="card shadow">
        <img class="card-img-top" src="/images/img1.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img2.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img3.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img4.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="card-deck mt-3">
      <div class="card shadow">
        <img class="card-img-top" src="/images/img5.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img6.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img1.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img2.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
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