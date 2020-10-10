<template>
  <div>
    <div class="head-content text-center mt-5">
      <h3>กำลังมาแรง</h3>
    </div>

    <div class="vc-box shadow mt-2">
      <div class="row">
        <div class="col-md-4 same-shop-img mb-2">
          <img src="/images/content1.jpg" />
          <router-link :to="{ name: 'content.detail', params: { id: 1 } }"
            ><button class="same-shop-price w-100">
              ดูเพิ่มเติม
            </button></router-link
          >
        </div>
        <div class="col-md-4 same-shop-img mb-2">
          <img src="/images/content2.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
        </div>
        <div class="col-md-4 same-shop-img mb-2">
          <img src="/images/content3.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
        </div>
      </div>
    </div>

    <div class="head-content text-center mt-5">
      <h3>ข่าวน่าสนใจ</h3>
    </div>

    <div class="vc-box shadow mt-2">
      <div class="row">
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content4.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
        </div>
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content5.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
        </div>
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content6.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
        </div>
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content1.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
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
