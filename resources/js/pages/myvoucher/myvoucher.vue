<template>
  <div class="container">
    <b-tabs content-class="mt-3">
      <b-tab title="ซื้อแล้ว" active>
        <div class="card p-4 m-4" v-for="m in myvoucherNormal" v-if="m.status">
          <h5>คำสั่งซื้อ#{{ m.key }}</h5>

          <h6 class="text-secondary">หมายเลขบิล #{{ m.no }}</h6>
          <div class="row">
            <div class="col-md-3">
              <img :src="m.voucher.image_url" class="w-100" />
            </div>
            <div class="col-md-5 p-4">
              <h1>{{ m.voucher.name }}</h1>
              <p>{{ m.voucher.description }}</p>
            </div>
            <div class="col-md-4">
              <router-link :to="{ name: 'myvoucherqr', params: { id: m.id } }">
                <button class="btn btn-primary">ใช้ตั๋ว</button>
              </router-link>

              <button
                class="btn btn-danger"
                :disabled="!m.can_cancel"
                @click="cancel(m.id)"
              >
                ยกเลิกตั๋ว
              </button>

              <br />
              <span class="text-secondary" style="font-size: 12px">
                (ยกเลิกตั๋วได้ถึง {{ m.voucher.end_date_text_ex }})
                <br />
                หมดอายุ {{ m.voucher.end_date_text }}
              </span>
            </div>
          </div>
        </div>
      </b-tab>
      <b-tab title="ใช้งานแล้ว"><p>ยังไม่มีรายการในขณะนี้</p></b-tab>
      <b-tab title="รายการยกเลิก">
        <div class="card p-4 m-4" v-for="m in myvoucherCancel" v-if="!m.status">
          <h5>คำสั่งซื้อ#{{ m.key }}</h5>

          <h6 class="text-primary">หมายเลขบิล #{{ m.no }}</h6>

          <div class="row">
            <div class="col-md-3">
              <img :src="m.voucher.image_url" class="w-100" />
            </div>
            <div class="col-md-6 p-4">
              <h1>{{ m.voucher.name }}</h1>
              <p>{{ m.voucher.description }}</p>
            </div>
          </div>
        </div>
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import axios from "axios";
export default {
  computed: {
    ...mapGetters({
      myvouchers: "voucher/myvoucher",
      myvoucherNormal: "voucher/myvoucherNormal",
      myvoucherCancel: "voucher/myvoucherCancel",
    }),
  },
  methods: {
    ...mapActions({
      fetchMyVoucher: "voucher/fetchMyVoucher",
    }),
    async cancel(id) {
      this.$swal
        .fire({
          title: "กรุณายืนยันการยกเลิก",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "ยืนยันการยกเลิก",
          cancelButtonText: "ปิดหน้านี้",
        })
        .then(async (result) => {
          console.log(result);
          if (result.value) {
            const { data } = await axios.get(`/api/myVouchers/${id}/cancel`, {
              params: {
                voucher_detail_id: id,
              },
            });

            this.$swal.fire("ยกเลิกสำเร็จ!").then(() => {
              this.fetchMyVoucher();
            });
          }
        });
    },
  },
  created() {
    this.fetchMyVoucher();
  },
};
</script>

<style>
</style>
