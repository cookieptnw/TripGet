<template>
  <div class="main-layout">
    <div class="mh-800">
      <navbar v-if="user ? user.role_id != 2 : false" />
      <div class="container" v-if="user ? user.role_id != 2 : false" >
        <child />
      </div>
       <div  v-else >
        <child />
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "~/components/Navbar";

export default {
  name: "MainLayout",

  components: {
    Navbar,
    SidebarMenu
  },
}
