<template>
  <div>
    <nav
      class="navbar navbar-expand-lg navbar-light bg-white position-fixed w-100"
      style="z-index: 99"
    >
      <div class="container">
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarToggler"
          aria-controls="navbarToggler"
          aria-expanded="false"
        >
          <span class="navbar-toggler-icon" />
        </button>

        <div class="m-auto">
          <router-link
            :to="{ name: user ? 'home' : 'welcome' }"
            class="navbar-brand"
          >
            <img src="/images/logo.png" height="40" />
          </router-link>
        </div>

        <div id="navbarToggler" class="collapse navbar-collapse">
          <ul class="navbar-nav"></ul>

          <ul class="navbar-nav ml-auto">
            <!-- Authenticated -->
            <li class="nav-item" v-if="user">
              <router-link to="/cart" class="nav-link">
                <button type="button" class="btn btn-primary">
                  <i class="fas fa-shopping-cart"></i> ตะกร้าของคุณ
                  <span class="badge badge-light">{{ carts.length }}</span>
                  <span class="sr-only">unread messages</span>
                </button>
              </router-link>
            </li>
            <li v-if="user" class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-dark"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <img
                  :src="user.photo_url"
                  class="rounded-circle profile-photo mr-1"
                />
                {{ user.name }}
              </a>
              <div class="dropdown-menu">
                <router-link
                  :to="{ name: 'myvoucher' }"
                  class="dropdown-item pl-3"
                >
                  <fa icon="card" fixed-width />
                  My Vouchers
                </router-link>
                <div class="dropdown-divider" />

                <router-link
                  :to="{ name: 'settings.profile' }"
                  class="dropdown-item pl-3"
                >
                  <fa icon="cog" fixed-width />
                  {{ $t("settings") }}
                </router-link>

                <router-link
                  :to="{ name: 'lifestyle' }"
                  class="dropdown-item pl-3"
                >
                  <fa icon="cog" fixed-width />
                  Lifestyle Setting
                </router-link>

                <router-link
                  :to="{ name: 'adminHome' }"
                  class="dropdown-item pl-3"
                  v-if="user.role_id == 2"
                >
                  <fa icon="cog" fixed-width />
                  Admin
                </router-link>

                <router-link
                  :to="{ name: 'adminHotelHome' }"
                  class="dropdown-item pl-3"
                  v-if="user.role_id == 3"
                >
                  <fa icon="cog" fixed-width />
                  Admin
                </router-link>

                <div class="dropdown-divider" />
                <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
                  <fa icon="sign-out-alt" fixed-width />
                  {{ $t("logout") }}
                </a>
              </div>
            </li>
            <!-- Guest -->
            <template v-else>
              <li class="nav-item">
                <router-link
                  :to="{ name: 'login' }"
                  class="nav-link"
                  active-class="active"
                >
                  {{ $t("login") }}
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  :to="{ name: 'register' }"
                  class="nav-link"
                  active-class="active"
                >
                  {{ $t("register") }}
                </router-link>
              </li>
            </template>
          </ul>
        </div>

        <div
          class="ml-0"
          v-if="user ? (user.role_id == 3 ? true : false) : false"
        >
          <router-link to="/qr" class="navbar-brand">
            <i class="fas fa-qrcode"></i>
          </router-link>
        </div>
      </div>
    </nav>
    <div style="height: 90px"></div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import LocaleDropdown from "./LocaleDropdown";

export default {
  components: {
    LocaleDropdown,
  },

  data: () => ({
    appName: window.config.appName,
  }),

  computed: mapGetters({
    user: "auth/user",
    carts: "cart/carts",
  }),

  methods: {
    async logout() {
      // Log out the user.
      await this.$store.dispatch("auth/logout");

      // Redirect to login.
      this.$router.push({ name: "login" });
    },
  },
};
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -0.375rem 0;
}
</style>
