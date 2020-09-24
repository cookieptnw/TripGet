<template>
  <div>travel_guide</div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: "Travel Guide" };
  },
};
</script>
