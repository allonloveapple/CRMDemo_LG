function initialState() {
  return {
    entry: {
      id: null,
      customer_id: null,
      name: '',
      type: '1',
      document_file: [],
      photo: [],
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      customer: [],
      type: []
    },
    loading: false
  }
}

const route = 'crm-documents'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setCustomer({ commit }, value) {
    commit('setCustomer', value)
  },
  setName({ commit }, value) {
    commit('setName', value)
  },
  setType({ commit }, value) {
    commit('setType', value)
  },
  insertDocumentFileFile({ commit }, file) {
    commit('insertDocumentFileFile', file)
  },
  removeDocumentFileFile({ commit }, file) {
    commit('removeDocumentFileFile', file)
  },
  insertPhotoFile({ commit }, file) {
    commit('insertPhotoFile', file)
  },
  removePhotoFile({ commit }, file) {
    commit('removePhotoFile', file)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setCustomer(state, value) {
    state.entry.customer_id = value
  },
  setName(state, value) {
    state.entry.name = value
  },
  setType(state, value) {
    state.entry.type = value
  },
  insertDocumentFileFile(state, file) {
    state.entry.document_file.push(file)
  },
  removeDocumentFileFile(state, file) {
    state.entry.document_file = state.entry.document_file.filter(item => {
      return item.id !== file.id
    })
  },
  insertPhotoFile(state, file) {
    state.entry.photo.push(file)
  },
  removePhotoFile(state, file) {
    state.entry.photo = state.entry.photo.filter(item => {
      return item.id !== file.id
    })
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
