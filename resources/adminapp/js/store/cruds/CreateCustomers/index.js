const set = key => (state, val) => {
  state[key] = val
}

function initialState() {
  return {
    data: {
      message: ''
    }
  }
}

const route = 'create-customers'

const getters = {
  message: state => state.data.message
}

const actions = {
  fetchIndexData({ commit, state }) {
    axios
      .get(route, { params: state.query })
      .then(response => {
        commit('setData', response.data.data)
      })
      .catch(error => {
        message = error.response.data.message || error.message
        // TODO error handling
      })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setData: set('data'),
  resetState(state) {
    Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
