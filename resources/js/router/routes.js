function page(path) {
  return () =>
    import( /* webpackChunkName: '' */ `~/pages/${path}`).then(
      m => m.default || m
    );
}

export default [{
    path: "/",
    name: "welcome",
    component: page("welcome.vue")
  },

  {
    path: "/login",
    name: "login",
    component: page("auth/login.vue")
  },
  {
    path: "/register",
    name: "register",
    component: page("auth/register.vue")
  },
  {
    path: "/home",
    name: "home",
    component: page("home.vue")
  },
  {
    path: "/home/:id",
    name: "home.detail",
    component: page("home_detail.vue")
  },
  {
    path: "/hotel",
    name: "hotel",
    component: page("hotel/hotel.vue")
  },
  {
    path: "/restaurant",
    name: "restaurant",
    component: page("restaurant/restaurant.vue")
  },
  {
    path: "/tourist",
    name: "tourist",
    component: page("tourist/tourist.vue")
  },
  {
    path: "/travel_guide",
    name: "travel_guide",
    component: page("travel_guide/travel_guide.vue")
  },

  {
    path: "/password/reset",
    name: "password.request",
    component: page("auth/password/email.vue")
  },
  {
    path: "/password/reset/:token",
    name: "password.reset",
    component: page("auth/password/reset.vue")
  },
  {
    path: "/email/verify/:id",
    name: "verification.verify",
    component: page("auth/verification/verify.vue")
  },
  {
    path: "/email/resend",
    name: "verification.resend",
    component: page("auth/verification/resend.vue")
  },
  {
    path: "/email/resend",
    name: "verification.resend",
    component: page("auth/verification/resend.vue")
  },

  {
    path: "/lifestyle",
    name: "lifestyle",
    component: page("lifestyle/lifestyle.vue")
  },
  {
    path: "/lifestyle/number_of_tourists",
    name: "lifestyle.number_of_tourists",
    component: page("lifestyle/number_of_tourists.vue")
  },
  {
    path: "/lifestyle/lifestyle_travel",
    name: "lifestyle.lifestyle_travel",
    component: page("lifestyle/lifestyle_travel.vue")
  },
  {
    path: "/lifestyle/what_do_you_travel",
    name: "lifestyle.what_do_you_travel",
    component: page("lifestyle/what_do_you_travel.vue")
  },
  {
    path: "/lifestyle/how_to_get_there",
    name: "lifestyle.how_to_get_there",
    component: page("lifestyle/how_to_get_there.vue")
  },
  {
    path: "/lifestyle/province",
    name: "lifestyle.province",
    component: page("lifestyle/province.vue")
  },
  {
    path: "/settings",
    component: page("settings/index.vue"),
    children: [{
        path: "",
        redirect: {
          name: "settings.profile"
        }
      },
      {
        path: "profile",
        name: "settings.profile",
        component: page("settings/profile.vue")
      },
      {
        path: "password",
        name: "settings.password",
        component: page("settings/password.vue")
      }
    ]
  },

  {
    path: "*",
    component: page("errors/404.vue")
  }
];
