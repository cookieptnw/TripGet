<template>
  <div class="text-center ">
    <img src="/images/logo.png" class="w-75" />

    <div class="mt-4">
      <template v-if="authenticated">
        <div>
          <router-link :to="{ name: 'home' }">
            <button class="btn btn-primary w-100 ">home</button>
          </router-link>
        </div>
      </template>
      <template v-else>
        <div class="container py-5">
          <div>
            <router-link :to="{ name: 'register' }">
              <button class="btn btn-primary w-100 ">Signup</button>
            </router-link>
          </div>
          <div class="mt-2">
            <router-link :to="{ name: 'login' }" class="mt-4">
              <button class=" btn btn-outline-primary w-100">Login</button>
            </router-link>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  layout: "basic",

  metaInfo() {
    return { title: this.$t("home") };
  },

  data: () => ({
    title: window.config.appName
  }),

  computed: mapGetters({
    authenticated: "auth/check"
  })
};
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}
</style>
