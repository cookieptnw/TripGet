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
          <img
            class="d-block w-100"
            src="/images/content1.jpg"
            alt="First slide"
          />
        </div>
        <div class="carousel-item">
          <img
            class="d-block w-100"
            src="/images/content2.jpg"
            alt="Second slide"
          />
        </div>
        <div class="carousel-item">
          <img
            class="d-block w-100"
            src="/images/content3.jpg"
            alt="Third slide"
          />
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

    <div class="head-content text-center mt-5">
      <h3>Popular</h3>
    </div>

    <div class="vc-box shadow mt-2">
      <div class="row">
        <div class="col-md-4 same-shop-img mb-2">
          <img src="/images/content1.jpg" />
          <div class="same-shop-price">Read More</div>
        </div>
        <div class="col-md-4 same-shop-img mb-2">
          <img src="/images/content2.jpg" />
          <div class="same-shop-price">Read More</div>
        </div>
        <div class="col-md-4 same-shop-img mb-2">
          <img src="/images/content3.jpg" />
          <div class="same-shop-price">Read More</div>
        </div>
      </div>
    </div>

    <div class="head-content text-center mt-5">
      <h3>News</h3>
    </div>

    <div class="vc-box shadow mt-2">
      <div class="row">
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content4.jpg" />
          <div class="same-shop-price">Read More</div>
        </div>
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content5.jpg" />
          <div class="same-shop-price">Read More</div>
        </div>
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content6.jpg" />
          <div class="same-shop-price">Read More</div>
        </div>
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content1.jpg" />
          <div class="same-shop-price">Read More</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: this.$t("Content") };
  },
};
</script>

<style>
</style>