<template>
  <div>
    <div
      id="carouselExampleIndicators"
      class="carousel slide"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="/images/img1.jpg" alt="First slide" />
        </div>
        <div class="carousel-item">
          <img
            class="d-block w-100"
            src="/images/img2.jpg"
            alt="Second slide"
          />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="/images/img3.jpg" alt="Third slide" />
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="head-content text-center">
          <h3>Monna Padong</h3>
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
            <b-list-group-item>✅ Breakfast free </b-list-group-item>
            <b-list-group-item>✅ Free Wi-Fi</b-list-group-item>

            <b-list-group-item
              >✅ Extra low price! (non-refundable)</b-list-group-item
            >
            <b-list-group-item>✅ Expire: 31/12/2021</b-list-group-item>
            <b-list-group-item
              >✅ Can stay everyday Except for long holidays and public
              holidays</b-list-group-item
            >
          </b-list-group>
        </div>
        <div class="col-md-4 detail-price">
          <h3 class="mt-5">Adult | $699</h3>
        </div>
      </div>
    </div>

    <hr />

    <div class="hotel-detail-content">
      <div class="row">
        <div class="adult col-md-8 detail-list">
          <b-list-group>
            <b-list-group-item>✅ Children 4-10 years </b-list-group-item>
            <b-list-group-item>✅ Breakfast free</b-list-group-item>
            <b-list-group-item>✅ Free Wi-Fi</b-list-group-item>

            <b-list-group-item
              >✅ Extra low price! (non-refundable)</b-list-group-item
            >
            <b-list-group-item>✅ Expire: 31/12/2021</b-list-group-item>
            <b-list-group-item
              >✅ Can stay everyday Except for long holidays and public
              holidays</b-list-group-item
            >
          </b-list-group>
        </div>
        <div class="col-md-4 detail-price">
          <h3 class="mt-5">Child | $499</h3>
        </div>
      </div>
    </div>

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
          <router-link :to="{ name: 'hotel.shop', params: { id: 2 } }"
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

    <div class="head-content text-center mt-5">
      <h3>From The Same Shop</h3>
      <hr />
      <div class="row">
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img3.jpg" />
          <div class="same-shop-price">399$</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img4.jpg" />
          <div class="same-shop-price">499$</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img5.jpg" />
          <div class="same-shop-price">599$</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img6.jpg" />
          <div class="same-shop-price">699$</div>
        </div>
      </div>
      <hr />
    </div>

    <div class="vc-box shadow mt-5 mb-5">
      <div class="row">
        <div class="col-md-4 text-center mb-2">
          <router-link :to="{ name: 'hotel.chat', params: { id: 3 } }"
            ><button class="btn btn-primary btn-buy">
              Chat now
            </button></router-link
          >
        </div>
        <div class="col-md-4 text-center mb-2">
          <router-link :to="{ name: 'hotel.stock', params: { id: 1 } }"
            ><button class="btn btn-primary btn-buy">
              Add to Cart
            </button></router-link
          >
        </div>
        <div class="col-md-4 text-center mb-2">
          <router-link :to="{ name: 'hotel.detail', params: { id: 1 } }"
            ><button class="btn btn-primary btn-buy">
              Buy Now
            </button></router-link
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: "Hotel" };
  },
};
</script>

<style>
</style>