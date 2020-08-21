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
      { type: "Province", name: "province" },
      { type: "Number of tourists", name: "number_of_tourists" },
      { type: "Lifestyle Travel", name: "lifestyle_travel" },
      { type: "What do you travel ?", name: "what_do_you_travel" },
      { type: "How to get there ?", name: "how_to_get_there" }
    ]
  })
};
</script>

<style></style>
