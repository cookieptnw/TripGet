<template>
  <div>
     <div class="head-content mt-5">
      <h3>ไลฟ์สไตล์ท่องเที่ยว</h3>
    </div>
    <div class="row mb-5">
      <div class="col-md-4"  v-for="m in matches.data" :key="m.id">
  <div class="card shadow">
    <button style="position: absolute;
    right: 20px;
    top: 20px;
    background-color: #00a267;
    color: #fff;
    padding: 5px 10px;
    border: none;
    border-radius: 20px;
    font-size: 14px;
}">แนะนำ</button>
        <img
          class="card-img-top"
          :src="m.image_url"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">{{m.name}}</h5>
          <p class="card-text">
            {{m.description}}
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold pr-4">
            มีความตรงกันกับคุณ
                <b-progress :max="100" class="mt-3">

    <b-progress-bar :value="m.match_percent" variant="success" show-progress animated  :label="`${((m.match_percent / 100) * 100).toFixed(2)}%`"></b-progress-bar>
                </b-progress>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">{{m.price}} บาท</h6>
             <router-link :to="{ name: 'hotel.detail', params: { id: m.id } }"
            ><button class="btn btn-primary btn-buy">
              ซื้อเลย
            </button></router-link
          >
          </div>
        </div>
      </div>

      </div>


    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  computed:{
   ...mapGetters({
     'matches' : 'voucher/matches'
   })
  },
methods:{
  ...mapActions({
    'fetch':'voucher/fetchMatch'
  })
},
created(){
  this.fetch()
}
}
</script>

<style>

</style>
