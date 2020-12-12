<template>
  <div>
    <div class="clearfix">
      <div class="wrapper-abc">
        <div
          class="float-left"
          style="width: 300px; abackground-color: #2a2a2e; height: 100vh"
        >
          <div class="wrapper-sidebar">
            <sidebar-menu :menu="menu" width="300" class="bg-admin">
              <div slot="header" class="text-center pt-3 text-white">
                <div style="height: 50px"></div>
                <hr />
              </div>
            </sidebar-menu>
          </div>
        </div>
        <div
          class="float-left"
          style="width: calc(100% - 300px); height: 100vh; overflow: scroll"
        >
          <child />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { SidebarMenu } from "vue-sidebar-menu";

export default {
  components: {
    SidebarMenu,
  },
  data: () => ({
    menu: [
      {
        header: true,
        title: "Main Navigation",
        hiddenOnCollapse: true,
      },
      {
        href: "/admin_hotel",
        title: "แดชบอร์ด",
        icon: "fas fa-home",
      },

      {
        title: "ประวัติการขาย",
        icon: "fas fa-home",
        child: [
          {
            href: "/admin_hotel/buy/history",
            title: "ประวัติการขายทั้งหมด",
          },
        ],
      },
    ],
  }),
};
</script>

<style lang="scss">
body {
  overflow-x: hidden;
}
.v-sidebar-menu .vsm--link_level-1.vsm--link_exact-active,
.v-sidebar-menu .vsm--link_level-1.vsm--link_active {
  -webkit-box-shadow: 3px 0px 0px 0px #1c5cff inset !important;
  box-shadow: 5px 0px 0px 0px #1c5cff inset !important;
}

.v-sidebar-menu.vsm_expanded .vsm--item_open .vsm--link_level-1 {
  color: #fff;
  background-color: #1c5cff !important;
}

.v-sidebar-menu.vsm_expanded .vsm--item_open .vsm--link_level-1 .vsm--icon {
  background-color: #141517 !important;
}
.mh-800 {
  min-height: 800px;
}
.v-sidebar-menu .vsm--toggle-btn {
  display: none !important;
}
.v-sidebar-menu .vsm--toggle-btn:after {
  content: "";
}
.wrapper-sidebar {
  top: 0;
  position: fixed;
  max-width: 300px;
  .bg-admin {
    position: fixed;
    width: 300px;
  }
}
</style>
