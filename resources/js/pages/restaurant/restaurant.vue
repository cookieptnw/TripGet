<template>
  <div>restaurant</div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: "Restaurant" };
  },
};
</script>
