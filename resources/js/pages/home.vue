<template>
  <div>
    <bannerSlider />
  </div>
</template>

<script>
import bannerSlider from "~/components/home/Slider";
export default {
  middleware: "auth",
  components: {
    bannerSlider
  },
  metaInfo() {
    return { title: this.$t("home") };
  }
};
</script>
