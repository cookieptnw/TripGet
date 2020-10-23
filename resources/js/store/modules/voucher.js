import axios from "axios";

let name = "vouchers";

// state
export const state = {
  items: [],
  item: null
};

// getters
export const getters = {
  items: state => state.items,
  item: state => state.item
};

// mutations
export const mutations = {
  [`set_${name}`](state, data) {
    state.items = data;
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
  async show({ commit }, { id, query }) {
    const { data } = await axios.get(`/api/${name}/${id}`, { params: query });
    commit(`set_${name}_show`, data.result);
  }
};
