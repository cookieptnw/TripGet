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

    <form>
      <div class="form-filter">
        <div class="row">
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>โรงแรม</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
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
          <div class="col-md-2 col-sm-12">
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
          <div class="col-md-2 col-sm-12">
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
          <div class="col-md-4 col-sm-12">
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

    <div class="head-content mt-5">
      <h3>ไลฟ์สไตล์ท่องเที่ยว</h3>
    </div>

    <div class="card-deck mb-5">
      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://cms.dmpcdn.com/travel/2017/08/03/b831d834-c87d-46d8-9b45-672dca0e8df2.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">เกาะมุก</h5>
          <p class="card-text">
            เกาะมุก ได้ชื่อว่า “ถ้ำมรกตอันล้ำค่าแห่งอันดามัน”
            เป็นเกาะที่ใหญ่เป็นอันดับที่ 3
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">1,200 บาท</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://cms.dmpcdn.com/travel/2017/08/03/71bdbdd6-bc67-40a0-b9e5-b8155309592b.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">ไร่ชาฉุยฟง</h5>
          <p class="card-text">
            ไร่ชาฉุยฟง ตั้งอยู่ที่ อ.แม่จัน จ.เชียงราย เป็นแหล่งปลูกชาชั้นดี
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">2,200 บาท</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://cms.dmpcdn.com/travel/2017/08/03/33ae5382-06aa-4ff9-9bf4-eb30b328f29e.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">ชิงช้าต้นไม้</h5>
          <p class="card-text">
            จากจุดชมวิวบนต้นไม้นี้สามารถมองออกไปเห็นทิวเขาและพื้นที่ราบรอยต่อของ
            5 จังหวัด
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">1,590 บาท</h6>
          </div>
        </div>
      </div>
    </div>

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
export default {
  middleware: "auth",
  computed: {
    ...mapGetters({
      items: "category/items",
    }),
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
