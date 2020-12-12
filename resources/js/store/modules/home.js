

// state
export const state = {
  count:1
};

// getters
export const getters = {
count: state => state.count,
};

// mutations
export const mutations = {
  [`set_count`](state,value) {
    state.count+=value;
  },
  [`set_count_m`](state,value) {
    state.count-=value;
  },
  
};

// actions
export const actions = {
  plus({commit},value = 1){
    commit(`set_count`, value)
  },
  min({commit},value = 1){
    commit(`set_count_m`, value)
  }
};
