<template>
  <div class="container" v-if="myvoucher" centered>
    <b-modal ref="my-modal" hide-footer title="ประวัติการใช้">
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
        <hr />
        <img :src="myvoucher.qr" width="300" class="img-fluid mb-3" /> <br />
        หมายเลข <br />
        <span
          ><span class="badge badge-primary">{{ myvoucher.key }}</span>
        </span>

        <hr />
      </div>

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
              </div>
            </div>
          </div>
        </b-tab>

        <b-tab title="รายละเอียดอื่นๆ">
          <div class="row">
            <div class="col-md-4 mt-4" v-for="item in detailsR" :key="item.id">
              <div class="card w-100 p-4">
                <h4 class="h6">{{ item.description }}</h4>
              </div>
            </div>
          </div>
        </b-tab>
        <b-tab title="ใช้งานแล้วหมดแล้ว">
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

export default {
  data: () => ({
    qr: "",
    name: "",
    mvus: "",
  }),
  computed: {
    id() {
      return this.$route.params.id;
    },
    ...mapGetters({
      myvoucher: "voucher/myvoucherShow",
    }),
    details() {
      return this.myvoucher.voucher.details.filter(
        (el) => el.amount > 0 && el.use < el.amount
      );
    },
    detailsR() {
      return this.myvoucher.voucher.details.filter((el) => el.amount == 0);
    },
    detailsUse() {
      return this.myvoucher.voucher.details.filter(
        (el) => el.amount > 0 && el.use >= el.amount
      );
    },
  },
  methods: {
    ...mapActions({
      fetchMyVoucher: "voucher/fetchMyVoucherShow",
    }),
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
