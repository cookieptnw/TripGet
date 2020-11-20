import axios from "axios";

let name = "vouchers";

// state
export const state = {
  items: [],
  item: null,
  matches: [],
  myvoucher: []
};

// getters
export const getters = {
  items: state => state.items,
  matches: state => state.matches,
  item: state => state.item,
  myvoucher: state => state.myvoucher

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

  async show({ commit }, { id, query }) {
    const { data } = await axios.get(`/api/${name}/${id}`, { params: query });
    commit(`set_${name}_show`, data.result);
  }
};
