import Cookies from 'js-cookie'
import * as types from '../mutation-types'
import {sumBy} from 'lodash'
import createPersistedState from "vuex-persistedstate";

export const  plugins = [createPersistedState({
    storage: {
      getItem: key => Cookies.get(key),
      setItem: (key, value) => Cookies.set(key, value, { expires: 3, secure: true }),
      removeItem: key => Cookies.remove(key)
    }
  })]

// state
export const state = {
  carts: [{
    "id": 5,
    "name": "Seafood & International Buffet Dinner",
    "description": "คุ้มสุดๆราคาเดียว 539 บาท มีทั้งซีฟู๊ด ซาซิมิ และอีกมากมาย",
    "image_url": "/uploads/images/1603483638.png",
    "price": 538,
    "start_date": "2020-10-28",
    "end_date": "2020-12-11",
    "holiday_open": 1,
    "weekend_open": 1,
    "discount": 15,
    "discount_promotion": null,
    "day_use": 1,
    "not_refund": 0,
    "pet_allow": 0,
    "category_id": 2,
    "hotel_id": 1,
    "created_at": "2020-10-23T20:07:21.000000Z",
    "updated_at": "2020-10-23T20:07:21.000000Z",
    "created_at_text": "24/10/2020 03:07:21",
    "details": [
      {
        "id": 12,
        "description": "สำหรับผู้ใหญ่ 1 ท่าน",
        "amount": 1,
        "voucher_id": 5,
        "created_at": "2020-10-23T20:07:21.000000Z",
        "updated_at": "2020-10-23T20:07:21.000000Z"
      },
      {
        "id": 13,
        "description": "เครื่องดื่ม Soft Drink, ชา, กาแฟ",
        "amount": 1,
        "voucher_id": 5,
        "created_at": "2020-10-23T20:07:21.000000Z",
        "updated_at": "2020-10-23T20:07:21.000000Z"
      },
      {
        "id": 14,
        "description": "ใช้บริการที่ห้องอาหารกอนโดล่า A-One Bangkok",
        "amount": 1,
        "voucher_id": 5,
        "created_at": "2020-10-23T20:07:21.000000Z",
        "updated_at": "2020-10-23T20:07:21.000000Z"
      }
    ],
    "hotel": {
      "id": 1,
      "name": "bkk hotel สาขา 1",
      "description": "lorem",
      "google_map_url": "http://google.com",
      "tel_no": "0900000000",
      "lat": 100,
      "long": 200,
      "approved_at": "2020-10-23 19:32:13",
      "sub_district": "2",
      "district": "1",
      "province_id": 1,
      "main_hotel_id": 1,
      "created_at": null,
      "updated_at": null,
      "created_at_text": "-",
      "vouchers": [
        {
          "id": 1,
          "name": "Rodina Beach Hotel",
          "description": "Rodina Beach Hotel ที่พักติดทะเลพัทยา หาดจอมเทียน สไตล์สุดล้ำเหมือนอยู่โลกอนาคตห้องพักรวมอาหารเช้าและ Free flow Mocktail ไม่อั้น!",
          "image_url": "/uploads/images/1603482355.png",
          "price": 1499,
          "start_date": "2020-10-30",
          "end_date": "2021-01-16",
          "holiday_open": 1,
          "weekend_open": 1,
          "discount": 13,
          "discount_promotion": null,
          "day_use": 2,
          "not_refund": 1,
          "pet_allow": 0,
          "category_id": 1,
          "hotel_id": 1,
          "created_at": "2020-10-23T19:54:08.000000Z",
          "updated_at": "2020-10-23T19:54:08.000000Z",
          "created_at_text": "24/10/2020 02:54:08"
        },
        {
          "id": 4,
          "name": "SYN Boutique Hotel",
          "description": "โรงแรมใหม่สุดชิคใจกลางเมือง ราคาเริ่มต้นเพียง 3,299 บาทเท่านั้น",
          "image_url": "/uploads/images/1603483390.png",
          "price": 3299,
          "start_date": "2020-10-29",
          "end_date": "2021-01-21",
          "holiday_open": 1,
          "weekend_open": 1,
          "discount": 10,
          "discount_promotion": null,
          "day_use": 2,
          "not_refund": 1,
          "pet_allow": 0,
          "category_id": 1,
          "hotel_id": 1,
          "created_at": "2020-10-23T20:03:13.000000Z",
          "updated_at": "2020-10-23T20:03:13.000000Z",
          "created_at_text": "24/10/2020 03:03:13"
        },
        {
          "id": 5,
          "name": "Seafood & International Buffet Dinner",
          "description": "คุ้มสุดๆราคาเดียว 539 บาท มีทั้งซีฟู๊ด ซาซิมิ และอีกมากมาย",
          "image_url": "/uploads/images/1603483638.png",
          "price": 538,
          "start_date": "2020-10-28",
          "end_date": "2020-12-11",
          "holiday_open": 1,
          "weekend_open": 1,
          "discount": 15,
          "discount_promotion": null,
          "day_use": 1,
          "not_refund": 0,
          "pet_allow": 0,
          "category_id": 2,
          "hotel_id": 1,
          "created_at": "2020-10-23T20:07:21.000000Z",
          "updated_at": "2020-10-23T20:07:21.000000Z",
          "created_at_text": "24/10/2020 03:07:21"
        }
      ],
      "province": {
        "id": 1,
        "name": "กรุงเทพมหานคร",
        "group": "ภาคกลาง",
        "type": "province",
        "created_at": null,
        "updated_at": null
      }
    }
  }]
}

// getters
export const getters = {
  carts: state => state.carts,
  sum: state=> {
    return sumBy(state.carts, el=> el.price)
  },
    cart_ids: state=> state.carts.map(el=>el.id)
}

// mutations
export const mutations = {
  ['cart'] (state,  cart ) {
    state.carts.push(cart)
  },
    ['remove'] (state,  index ) {
       state.carts.splice(index,1)
  },


}

// actions
export const actions = {
  add ({ commit, dispatch }, {cart}) {
    commit('cart' ,cart)
  },
  remove ({ commit, dispatch }, index) {
    commit('remove' ,index)
  }
}
