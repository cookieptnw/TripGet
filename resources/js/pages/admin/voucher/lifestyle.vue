<template>
<div class="container">
  <h4> {{item.name}}(Life Style)</h4>
<p>{{item.description}}</p>
<hr>
  <div class="row m-2">
    <div class="col-md-4">
      <div class="card p-4">
        <travel :vid="id"/>
      </div>

      <div class="card p-4 mt-3">
        <numberoftourists :vid="id" />
      </div>
      <div class="card p-4 mt-3">
        <how_to_get_there :vid="id" />
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4">
        <province :vid="id" />
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-4">
        <room_type :vid="id"/>
      </div>

      <div class="card p-4 mt-3">
        <what_do_you_travel :vid="id"/>
      </div>
    </div>
  </div>
</div>

</template>

<script>
import travel from "../../lifestyle/lifestyle_travel";
import province from "../../lifestyle/province";
import numberoftourists from "../../lifestyle/number_of_tourists";
import room_type from "../../lifestyle/room_type";
import what_do_you_travel from "../../lifestyle/what_do_you_travel";
import how_to_get_there from "../../lifestyle/how_to_get_there";
import axios from 'axios'
export default {
  data:()=>({item:{}}),
  components: {
    travel,
    province,
    numberoftourists,
    room_type,
    what_do_you_travel,
    how_to_get_there,
  },
  computed:{
    id(){
      return this.$route.params.id
    }
  },
  methods:{
     async fetchShow() {
      const { data } = await axios
        .get(this.$api("vouchers/" + this.id))
        .catch();
      this.item = data.result;
    },
  },
  created(){
    this.fetchShow()
  }
};
</script>

<style>
</style>
