<template>
  <div>
    <b-card>
      <b-list-group flush>
        <b-list-group-item
          class="d-flex justify-content-between align-items-center"
          @click="
            $router.push({
              name: `lifestyle.${item.name}`,
              params: { type: item.name }
            })
          "
          v-for="(item, index) in types"
          :key="index"
        >
          {{ item.type }}
          <button class="ml-auto btn">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
          </button>
        </b-list-group-item>
      </b-list-group>
    </b-card>
  </div>
</template>

<script>
export default {
  data: () => ({
    types: [
      { type: "พฤติกรรมการท่องเที่ยว", name: "lifestyle_travel" },
      { type: "จังหวัด", name: "province" },
      { type: "จำนวนของนักท่องเที่ยว", name: "number_of_tourists" },
      { type: "ประเภทห้องพัก", name: "room_type" },
      { type: "ช่วงเวลาที่ทำการท่องเที่ยว", name: "what_do_you_travel" },
      { type: "วิธีการเดินทาง", name: "how_to_get_there" }
    ]
  })
};
</script>

<style></style>
