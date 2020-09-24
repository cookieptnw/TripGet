<template>
  <div>tourist</div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: "Tourist" };
  },
};
</script>
