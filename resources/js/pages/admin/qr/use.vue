<template>
  <div class="container" v-if="myvoucher">
    <b-modal ref="my-modal" hide-footer title="ประวัติการใช้" centered>
      <div class="d-block text-center">
        <div v-for="(item, index) in mvus" :key="item.id">
          {{ index + 1 }}) {{ item.created_at_text }} โดย
          {{ item.staff.first_name }} {{ item.staff.last_name }}
          <hr />
        </div>
      </div>
    </b-modal>
    <div class="card p-4">
      <div class="text-center" v-if="myvoucher.voucher">
        <h1>ใช้ตั๋ว {{ myvoucher.voucher.name }}</h1>
      </div>

      <hr />
      <input
        type="text"
        class="form-control"
        v-model="q"
        placeholder="พิมพ์เพื่อค้นหา"
      />
      <hr />
      <b-tabs content-class="mt-3">
        <b-tab title="ใช้งานได้">
          <div class="row">
            <div class="col-md-4 mt-4" v-for="item in details" :key="item.id">
              <div class="card w-100 p-4">
                <div style="position: absolute; right: 20px; cursor: pointer">
                  <i
                    class="fas fa-info-circle"
                    @click="showModal(item.mvus)"
                  ></i>
                </div>
                <h4 class="text-primary">{{ item.description }}</h4>
                <div class="clearfix">
                  <div class="float-left">
                    ใช้งานแล้ว {{ item.use }}/{{ item.amount }} ครั้ง
                  </div>
                </div>
                <hr />
                <button class="btn btn-primary" @click="use(item.id)">
                  ใช้งาน
                </button>
              </div>
            </div>
          </div>
        </b-tab>
        <b-tab title="ใช้งานหมดแล้ว">
          <div class="row" v-if="detailsUse.length">
            <div
              class="col-md-4 mt-4"
              v-for="item in detailsUse"
              :key="item.id"
            >
              <div class="card w-100 p-4 bg-secondary">
                <div style="position: absolute; right: 20px; cursor: pointer">
                  <i
                    class="fas fa-info-circle"
                    @click="showModal(item.mvus)"
                  ></i>
                </div>
                <h1 class="">{{ item.description }}</h1>
                <div class="clearfix">
                  <div class="float-left">
                    ใช้งานแล้วหมดแล้ว จาก {{ item.amount }} ครั้ง
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="" v-else>
            <div class="card mt-3 p-4">ยังไม่มีรายการ</div>
          </div>
        </b-tab>
      </b-tabs>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import axios from "axios";
export default {
  data: () => ({
    qr: "",
    name: "",
    q: "",
    mvus: "",
  }),
  computed: {
    id() {
      return this.$route.params.key;
    },
    ...mapGetters({
      myvoucher: "voucher/myvoucherShow",
    }),
    details() {
      let a = this.myvoucher.voucher.details.filter(
        (el) => el.amount > 0 && el.use < el.amount
      );
      console.log(a);
      if (this.q) {
        a = a.filter((el) => el.description.includes(this.q));
      }
      return a;
    },
    detailsUse() {
      return this.myvoucher.voucher.details.filter(
        (el) => el.amount > 0 && el.use >= el.amount
      );
    },
  },
  methods: {
    ...mapActions({
      fetchMyVoucher: "voucher/fetchMyVoucherKey",
    }),
    async use(id) {
      let f = this.myvoucher.voucher.details.find((el) => el.id == id);
      this.$swal
        .fire({
          title: "กรุณายืนยันการใช้งาน",
          text: `${f.description}`,
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "ยืนยัน",
          cancelButtonText: "ยกเลิก",
        })
        .then(async (result) => {
          console.log(result);
          if (result.value) {
            const { data } = await axios.get(
              `/api/myVouchers/${this.myvoucher.key}/use`,
              {
                params: {
                  voucher_detail_id: id,
                },
              }
            );

            this.$swal
              .fire(
                "ใช้งานสำเร็จ!",
                `ทำการใช้งาน ${f.description} เรียบร้อย`,
                "success"
              )
              .then(() => {
                this.fetchMyVoucher(this.id);
                this.q = "";
              });
          }
        });
    },
    showModal(mvus) {
      this.mvus = mvus;

      this.$refs["my-modal"].show();
    },
  },
  created() {
    this.fetchMyVoucher(this.id);
  },
};
</script>

<style>
</style>
