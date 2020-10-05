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

    <div
      class="hotel-list shadow mb-4"
      v-for="(item, index) in category.vouchers"
      :key="index"
    >
      <div class="row">
        <div class="col-md-3">
          <img :src="item.image_url" width="100%" height="100%" />
        </div>
        <div class="col-md-9">
          <b-card-text>
            <div class="card-body">
              <h5 class="card-title">{{ item.title }}</h5>
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
                        :to="{ name: 'hotel.detail', params: { id: item.id } }"
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
</template>

<script>
import { vouchers } from "../../dataMockup";
export default {
  middleware: "auth",
  data: () => ({
    categories: vouchers
  }),
  computed: {
    key() {
      return this.$route.params.key;
    },
    category() {
      return this.categories.find(el => el.key == this.key);
    }
  },
  metaInfo() {
    return { title: "Hotel" };
  }
};
</script>

<style></style>
