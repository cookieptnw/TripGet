<template>
  <div class="main-layout">
    <div class="admin--nav" v-if="user.role_id == 2">
      <div class="clearfix">
        <div class="wrapper-abc">
          <navbar />
          <div
            class="float-left"
            style="width:300px; abackground-color:#2a2a2e;height: 100vh;"
          >
            <div class="wrapper-sidebar">
              <sidebar-menu :menu="menu" width="300" class="bg-admin">
                <div slot="header" class="text-center pt-3">
                  <img
                    :src="aAssetUrl('ais_esport_logo.png', 'images')"
                    width="70%"
                  />
                  <hr />
                </div>
              </sidebar-menu>
            </div>
          </div>
          <div
            class="float-left"
            style="width:calc(100% - 300px); height:100vh; overflow: scroll;"
          >
            <child />
          </div>
        </div>
      </div>
    </div>
    <div class="mh-800" v-else>
      <navbar />
      <div class="container">
        <child />
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "~/components/Navbar";
import { SidebarMenu } from "vue-sidebar-menu";

export default {
  name: "MainLayout",

  components: {
    Navbar,
    SidebarMenu
  },
  data: () => ({
    menu: [
      {
        header: true,
        title: "Main Navigation",
        hiddenOnCollapse: true
      },
      {
        href: "/home",
        title: "Dashboard",
        icon: "fas fa-home"
      },
      {
        href: "/event_calendar",
        title: "Events Calendar",
        icon: "far fa-calendar-alt"
      },
      {
        title: "eSports Studio",
        icon: "fas fa-folder",
        child: [
          {
            href: "/hero_banner",
            title: "Hero Banner"
          },
          {
            href: "/up_coming",
            title: "Up Coming"
          }
        ]
      }
    ]
  })
};
</script>

<style lang="scss">
body {
  overflow-x: hidden;
}
.v-sidebar-menu .vsm--link_level-1.vsm--link_exact-active,
.v-sidebar-menu .vsm--link_level-1.vsm--link_active {
  -webkit-box-shadow: 3px 0px 0px 0px #28a745 inset !important;
  box-shadow: 5px 0px 0px 0px #28a745 inset !important;
}

.v-sidebar-menu.vsm_expanded .vsm--item_open .vsm--link_level-1 {
  color: #fff;
  background-color: #28a745 !important;
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
