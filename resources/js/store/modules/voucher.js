import axios from "axios";

let name = "vouchers";

// state
export const state = {
  items: [],
  item: null,
  matches: [],
  myvoucher: [],
  myvoucherShow: []
};

// getters
export const getters = {
  items: state => state.items,
  matches: state => state.matches,
  item: state => state.item,
  myvoucher: state => state.myvoucher,
  myvoucherNormal: state => state.myvoucher.filter(el => el.status && !el.used),
  myvoucherUse: state => state.myvoucher.filter(el => el.used),

  myvoucherCancel: state => state.myvoucher.filter(el => !el.status),
  myvoucherShow: state => state.myvoucherShow
};

// mutations
export const mutations = {
  [`set_${name}`](state, data) {
    state.items = data;
  },
  [`set_${name}_m`](state, data) {
    state.matches = data;
  },
  [`set_${name}_myvoucher`](state, data) {
    state.myvoucher = data;
  },
  [`set_${name}_mvs`](state, data) {
    state.myvoucherShow = data;
  },
  [`set_${name}_show`](state, data) {
    state.item = data;
  }
};

// actions
export const actions = {
  async fetch({ commit }) {
    const { data } = await axios.get(`/api/${name}`);
    commit(`set_${name}`, data.items);
  },



  async fetchMatch({ commit }) {
    const { data } = await axios.get(`/api/match/${name}`);
    commit(`set_${name}_m`, data.items);
  },

  async fetchMyVoucher({ commit }) {
    const { data } = await axios.get(`/api/myVouchers`);
    commit(`set_${name}_myvoucher`, data.result);
  },

  async fetchMyVoucherShow({ commit }, id) {
    const { data } = await axios.get(`/api/myVouchers/${id}`);
    commit(`set_${name}_mvs`, data.result);
  },
  async fetchMyVoucherKey({ commit }, id) {

    var x = Math.floor((Math.random() * 1000) + 1);

    const { data } = await axios.get(`/api/myVouchers/key/${id}?x=${x}`);
    commit(`set_${name}_mvs`, data.result);
  },

  async show({ commit }, { id, query }) {
    const { data } = await axios.get(`/api/${name}/${id}`, { params: query });
    commit(`set_${name}_show`, data.result);
  }
};
