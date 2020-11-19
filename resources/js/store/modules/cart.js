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
  carts: []
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
