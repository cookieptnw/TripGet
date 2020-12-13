function page(path) {
  return () =>
    import(/* webpackChunkName: '' */ `~/pages/${path}`).then(
      m => m.default || m
    );
}

function cruGen(path, name) {
  return [
    {
      path: `${path}`,
      name: path,
      component: page(`admin/${name}/${name}.vue`)
    },
    {
      path: `${path}/create`,
      name: `${path}.create`,
      component: page(`admin/${name}/form.vue`)
    },
    {
      path: `${path}/:id/edit`,
      name: `${path}.edit`,
      component: page(`admin/${name}/form.vue`)
    }
  ];
}

export default [
  {
    path: "/",
    name: "welcome",
    component: page("welcome.vue")
  },

  {
    path: "/qr",
    name: "qr",
    component: page("admin/qr/qr.vue")
  },
  {
    path: "/qr/use/:key",
    name: "qrUse",
    component: page("admin/qr/use.vue")
  },
  {
    path: "/cart",
    name: "cart",
    component: page("cart/cart.vue")
  },

  {
    path: "/payment",
    name: "payment",
    component: page("cart/payment.vue")
  },

  {
    path: "/myvoucher",
    name: "myvoucher",
    component: page("myvoucher/myvoucher.vue")
  },

  {
    path: "/myvoucher/:id",
    name: "myvoucherqr",
    component: page("myvoucher/myvoucherqr.vue")
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
    path: "/category/:key",
    name: "category",
    component: page("vouchers/category.vue")
  },
  {
    path: "/voucher/:id",
    name: "hotel.detail",
    component: page("vouchers/hotel_detail.vue")
  },
  {
    path: "/voucher/:id/stock",
    name: "hotel.stock",
    component: page("vouchers/hotel_stock.vue")
  },
  {
    path: "/voucher/:id/shop",
    name: "hotel.shop",
    component: page("vouchers/hotel_shop.vue")
  },
  {
    path: "/voucher/:id/chat",
    name: "hotel.chat",
    component: page("vouchers/hotel_chat.vue")
  },
  {
    path: "/content",
    name: "content",
    component: page("content/content.vue")
  },
  {
    path: "/content/:id",
    name: "content.detail",
    component: page("content/content_detail.vue")
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
    path: "/lifestyle/room_type",
    name: "lifestyle.room_type",
    component: page("lifestyle/room_type.vue")
  },
  {
    path: "/lifestyle/province",
    name: "lifestyle.province",
    component: page("lifestyle/province.vue")
  },
  {
    path: "/settings",
    component: page("settings/index.vue"),
    children: [
      {
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
    path: "/admin",
    component: page("admin/index.vue"),
    children: [
      {
        path: "",
        name: "adminHome",
        component: page("admin/adminDashboard.vue")
      },

      {
        path: "vouchers/lifestyle/:id",
        name: "vouchers.lifestyle",
        component: page("admin/voucher/lifestyle.vue")
      },
      ...cruGen("voucher_categories", "voucherCategory"),
      ...cruGen("hotels", "hotel"),
      ...cruGen("main_hotels", "mainHotel"),
      ...cruGen("vouchers", "voucher"),
      ...cruGen("users", "user")

    ]
  },

  {
    path: "/admin_hotel",
    component: page("adminH/index.vue"),
    children: [
      {
        path: "",
        name: "adminHotelHome",
        component: page("adminH/adminDashboard.vue")
      },
      {
        path: "buy/history",
        name: "voucher_hotels",
        component: page("adminH/voucher/voucher.vue")
      },
    ]
  },

  {
    path: "*",
    component: page("errors/404.vue")
  }
];
