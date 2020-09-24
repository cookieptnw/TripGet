<template>
  <div>
    <routerLink :to="{ name: 'home.detail', params: { id: 1 } }">
      <button class="btn btn-primary">1</button>
    </routerLink>
    <routerLink :to="{ name: 'home.detail', params: { id: 2 } }">
      <button class="btn btn-primary">2</button>
    </routerLink>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: "Search" };
  },
};
</script>
