<template>
  <div class="main-layout">
    <navbar />

    <div class="container mt-4">
      <child />
    </div>
  </div>
</template>

<script>
import Navbar from "~/components/Navbar";

export default {
  name: "MainLayout",

  components: {
    Navbar,
  },
};
</script>

<style>
a {
  text-decoration: none;
}
.form-filter {
  width: 100%;
  padding: 15px;
  background-color: #4582ec;
}
.form-group-search {
  width: 80%;
}
.form-group-search input {
  border-radius: 5px 0px 0px 5px !important;
}
.form-group-submit {
  margin-top: 0.5px;
  width: 20%;
  height: 42.5px;
  border-radius: 0px 5px 5px 0px !important;
}
.head-content {
  margin-top: 35px;
  margin-bottom: 20px;
}
.hotdeal-sold {
  width: 70%;
  float: left;
}
.hotdeal-price {
  width: 30%;
  float: left;
  font-weight: 300;
}
.hotdeal-sold-total p {
  font-weight: 300;
}
.progress {
  height: 2rem !important;
}
.category-home {
  padding: 35px 20px 35px 20px;
  background-color: #195dfc;
  border-radius: 5px;
}
.hotel-list {
  border-radius: 5px;
  border: 1px solid rgb(100, 142, 255);
}
.hotel-rating-bar {
  float: left;
  height: 43.5px;
  margin-bottom: 10px;
}
.hotel-price {
  float: left;
  font-weight: 300;
}
.hotel-voucher {
  float: left;
  font-weight: 300;
}
.w-100 {
  width: 100%;
}
.btn-buy {
  width: 100% !important;
  margin-top: 5px;
}
.hotel-list img {
  object-fit: cover;
}
.hotel-detail-content {
  width: 100%;
  padding: 15px;
  font-weight: 400;
}
.detail-price {
  text-align: center;
  font-weight: 600;
  padding: 30px;
  border: 1px solid #195dfc;
  border-radius: 5px;
}
.detail-rating {
  margin-top: 35px;
  text-align: center;
  float: right;
}
.vc-box {
  width: 100%;
  padding: 25px;
  font-weight: 400;
}

.same-shop-img img {
  width: 100%;
  height: 150px;
  object-fit: cover;
}
.same-shop-price {
  text-align: center;
  padding: 15px;
  border: 1px solid #195dfc;
  border-radius: 0px 0px 5px 5px;
}
.flash-sale-shop-price {
  text-align: center;
  padding: 15px;
  border: 1px solid #ff7d7d;
  border-radius: 0px 0px 5px 5px;
}
.total {
  font-size: 24px;
  font-weight: 500;
}
.total-num {
  padding: 5px;
  border: 1px solid #195dfc;
  border-radius: 5px;
}
</style>
