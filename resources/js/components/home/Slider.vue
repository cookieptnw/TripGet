<template>
  <carousel perPage="1" autoplay>
    <slide v-for="index in 10" :key="index">
      <img
        :src="`https://picsum.photos/seed/picsum/1000/500`"
        width="100%"
        height="200"
        class="fit"
      />
    </slide>
  </carousel>
</template>

<script>
export default {};
</script>

<style></style>
