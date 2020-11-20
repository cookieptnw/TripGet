<template>
  <div class="main-layout">
    <div class="mh-800">
      <div>
        <Navbar />
        <child />

        <div>My Cart</div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "~/components/Navbar";
console.log("wef");
export default {
  name: "MainLayout",
  components: {
    Navbar,
  },
};
</script>
