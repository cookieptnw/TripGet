<template>
  <div>{{ $route.params }}</div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: this.$t("home") };
  }
};
</script>
