<template>
  <div>
    <div class="content py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <span class="anchor" id="formPayment"></span>

            <!-- form card cc payment -->
            <div class="card">
              <div class="card-body">
                <h3 class="text-center">ชำระเงินผ่านบัตรเครดิต</h3>
                <hr />
                <!-- <div class="alert alert-info p-2 pb-3">
                                <a class="close font-weight-normal initialism" data-dismiss="alert" href="#"><samp>×</samp></a>
                                CVC code is required.
                            </div> -->
                <form
                  class="form"
                  role="form"
                  autocomplete="off"
                  @submit.prevent="addToCart()"
                >
                  <div class="form-group">
                    <label for="cc_name">ชื่อ นามสกุลบนบัตร</label>
                    <input
                      type="text"
                      class="form-control"
                      id="cc_name"
                      pattern="\w+ \w+.*"
                      title="ชื่อ นามสกุล"
                    />
                  </div>
                  <div class="form-group">
                    <label>หมายเลขบัตรเครดิต 16 หลัก</label>
                    <input
                      type="text"
                      class="form-control"
                      autocomplete="off"
                      maxlength="20"
                      pattern="\d{16}"
                      title="หมายเลขบัตรเครดิต"
                    />
                  </div>
                  <div class="form-group row">
                    <label class="col-md-12">วันหมดอายุบัตร</label>
                    <div class="col-md-4">
                      <select class="form-control" name="cc_exp_mo" size="0">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <select
                        class="form-control"
                        name="cc_exp_yr"
                        size="0"
                        required
                      >
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <input
                        type="text"
                        class="form-control"
                        autocomplete="off"
                        maxlength="3"
                        pattern="\d{3}"
                        title="Three digits at back of your card"
                        required=""
                        placeholder="CVC"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-md-12">ยอดรวมทั้งหมด</label>
                  </div>
                  <div class="form-inline">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control text-right"
                        id="exampleInputAmount"
                        :value="sum"
                        :disabled="true"
                      />
                      <div class="input-group-append">
                        <span class="input-group-text">฿</span>
                      </div>
                    </div>
                  </div>
                  <hr />
                  <div class="form-group row">
                    <div class="col-md-6">
                      <button
                        type="reset"
                        class="btn btn-default btn-lg btn-block"
                      >
                        ยกเลิก
                      </button>
                    </div>
                    <div class="col-md-6">
                      <button
                        type="submit"
                        class="btn btn-success btn-lg btn-block"
                      >
                        ยืนยันการชำระ
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form card cc payment -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from "vuex";
import axios from "axios";
export default {
  computed: {
    ...mapGetters({
      cart_ids: "cart/cart_ids",
      sum: "cart/sum"
    })
  },
  methods: {
    async addToCart() {
      const { data } = await axios.post("/api/carts", {
        sum: this.sum,
        cart_ids: this.cart_ids
      });
      this.$bvToast.toast("ทำการชำระเงินสำเร็จ", {
        title: "แจ้งเตือน",
        autoHideDelay: 5000,
        appendToast: true
      });
      this.$router.push({ name: "myvoucher" });
      this.$router.go(0);
      console.log(data);
    }
  }
};
</script>

<style></style>
