<template>
  <div class="container">
     <b-tabs content-class="mt-3">
    <b-tab title="ซื้อแล้ว" active>
      <div v-for="(ms,index) in myvouchers" :key="index" class="card mt-4">
      <div class="card-header p-3">
        <h6>        คำสั่งซื้อ#{{ms[0].no}}
</h6>
      </div>
          <hr>
        <div class="card p-4 m-4" v-for="m in ms">

     <div class="row" >
          <div class="col-md-3"><img :src="m.voucher.image_url" class="w-100"></div>
          <div class="col-md-9 p-4">
            <h1>{{m.voucher.name}}</h1>
            <p>{{m.voucher.description}}</p>
          </div>
        </div>
        </div>

      </div>
      </b-tab>
    <b-tab title="ใช้งานแล้ว"><p>ยังไม่มีรายการในขณะนี้</p></b-tab>
    <b-tab title="รายการยกเลิก"><p>ยังไม่มีรายการในขณะนี้</p></b-tab>

  </b-tabs>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
computed:{
  ...mapGetters({
    myvouchers:'voucher/myvoucher'
  })

},
methods:{
  ...mapActions({
    fetchMyVoucher:'voucher/fetchMyVoucher'
  })
},
created(){
  this.fetchMyVoucher()
}
}
</script>

<style>

</style>
