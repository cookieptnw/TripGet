<template>
  <div class="container">
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

    <CatSearch />

    <div class="mt-5 mb-5">
      <div class="row">
        <div class="col-md-6" v-for="category in items.data" :key="category.id">
          <div class="category-home text-center shadow mb-3">
            <routerLink :to="`/category/${category.id}`">
              <h3 class="text-white">{{ category.name }}</h3>
            </routerLink>
          </div>
        </div>
      </div>
    </div>

    <matches />

    <div class="head-content mt-5">
      <div class="row">
        <div class="col col-md-8">
          <h3>กำลังมาแรง</h3>
        </div>
        <div class="col col-md-4 text-right mt-3">
          <a href="#" class="text-right">ดูทั้งหมด</a>
        </div>
      </div>
    </div>

    <div class="card-deck mb-5">
      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://img.wongnai.com/p/1920x0/2019/01/20/f4325cc6a7c74144a04a93273f40d866.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">สวนป่าดอยบ่อหลวง</h5>
          <p class="card-text">
            ‘สวนป่าดอยบ่อหลวง’ ที่พักเชียงใหม่สุดชิลท่ามกลางสวนสน
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar">
              <div
                class="progress-bar bg-info"
                role="progressbar"
                style="width: 50%"
                aria-valuenow="50"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
              <p class="hotdeal-sold-total p-3">15 ขายแล้ว</p>
            </div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">1,999 บาท</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://img.wongnai.com/p/1968x0/2019/07/26/e3409fb82fba49caa834d0ef762f0d1e.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">ม่อนอิงดาวรีสอร์ท</h5>
          <p class="card-text">
            ‘ม่อนอิงดาวรีสอร์ท’ ที่พักเชียงใหม่ ที่พักม่อนแจ่มสุดฮิต!
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar">
              <div
                class="progress-bar bg-info"
                role="progressbar"
                style="width: 40%"
                aria-valuenow="50"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
              <p class="hotdeal-sold-total p-3">11 ขายแล้ว</p>
            </div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">1,590 บาท</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://ed.edtfiles-media.com/ud/images/1/138/413917/Liu_Xiang_Fong.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">ภัตตาคารจีน หลิวเซียงฟง</h5>
          <p class="card-text">
            ภัตตาคารจีนสไตล์กวางตุ้ง ซึ่งชื่อร้านหมายถึง อาหารที่ดี อร่อย
            มีกลิ่นหอม
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar">
              <div
                class="progress-bar bg-info"
                role="progressbar"
                style="width: 20%"
                aria-valuenow="50"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
              <p class="hotdeal-sold-total p-3">4 ขายแล้ว</p>
            </div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">1,999 บาท</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import { vouchers } from "../dataMockup";
import matches from "./lifestyle/match";
export default {
  middleware: "auth",
  computed: {
    ...mapGetters({
      items: "category/items",
    }),
  },
  components: {
    matches,
  },

  methods: {
    ...mapActions({
      fetch: "category/fetch",
    }),
  },
  created() {
    this.fetch();
  },

  metaInfo() {
    return { title: this.$t("home") };
  },
};
</script>

<style></style>
