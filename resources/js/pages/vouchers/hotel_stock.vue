<template>
  <div>
    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img6.jpg" alt="" width="100%" />
        </div>
        <div class="col-md-5 mt-2">
          <h3>{{ voucher.child_price }} - {{ voucher.price }} บาท</h3>
          <h5>คงเหลือ : 12</h5>
        </div>
        <div class="col-md-4 mt-2">
          <button class="btn btn-primary btn-buy">ผู้ใหญ่</button>
          <button class="btn btn-outline-primary btn-buy">เด็ก</button>
        </div>
      </div>
    </div>

    <div class="vc-box shadow mt-3 mb-5">
      <div class="head-content">
        <h3>ข้อมูลลูกค้า</h3>
      </div>
      <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">ชื่อ - นามสกุล</label>
          <input
            type="text"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="FirstName LastName "
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">รหัสบัตรประจำตัวประชาชน</label>
          <input
            type="number"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="1-xxxx-xxxxx-xx-x"
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">ที่อยู่อีเมล</label>
          <input
            type="email"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="name@example.com"
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">เบอร์โทรติดต่อ</label>
          <input
            type="number"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="087-xxx-xxxx"
          />
        </div>
        <small class="text-muted">
          *เด็กจะได้รับบัตรกำนัลเมื่อเดินทางมาถึง</small
        >
      </form>

      <div class="total">
        <hr />
        <div class="row">
          <div class="col-md-9 text-right">จำนวน</div>
          <div class="col-md-1 text-center">-</div>
          <div class="col-md-1 text-center total-num">1</div>
          <div class="col-md-1 text-center">+</div>
        </div>
        <hr />
      </div>

      <button class="btn btn-primary w-100">เพิ่มลงตะกร้า</button>
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