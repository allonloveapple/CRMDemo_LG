function initialState() {
  return {
    entry: {
      id: null,
      platform: '',
      platform_type: '1',
      trade_account: '',
      password: null,
      status_id: null,
      a_b_stock: '1',
      name: '',
      last_deposit_time: '',
      deposit_amount: '',
      withdraw_account: '',
      last_withdraw_time: '',
      withdraw_amount: '',
      belong_id: null,
      ib: '',
      second_ib: '',
      bonus: '',
      rebate: '',
      email: '',
      mobile: '',
      vps: '',
      vps_account: '',
      vps_password: null,
      mm_strategy: '',
      mm_mutiple: '',
      trade_strategy: '',
      trade_multiple: '',
      leverage: '',
      predict_rebate: '',
      total_profit: '',
      day_profit: '',
      total_volume: '',
      balance: '',
      equity: '',
      floating: '',
      order_number: '',
      missing: '',
      connect_status: '1',
      comment: '',
      archive_status: '1',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      platform_type: [],
      status: [],
      a_b_stock: [],
      belong: [],
      connect_status: [],
      archive_status: []
    },
    loading: false
  }
}

const route = 'crm-customers'

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
  setPlatform({ commit }, value) {
    commit('setPlatform', value)
  },
  setPlatformType({ commit }, value) {
    commit('setPlatformType', value)
  },
  setTradeAccount({ commit }, value) {
    commit('setTradeAccount', value)
  },
  setPassword({ commit }, value) {
    commit('setPassword', value)
  },
  setStatus({ commit }, value) {
    commit('setStatus', value)
  },
  setABStock({ commit }, value) {
    commit('setABStock', value)
  },
  setName({ commit }, value) {
    commit('setName', value)
  },
  setLastDepositTime({ commit }, value) {
    commit('setLastDepositTime', value)
  },
  setDepositAmount({ commit }, value) {
    commit('setDepositAmount', value)
  },
  setWithdrawAccount({ commit }, value) {
    commit('setWithdrawAccount', value)
  },
  setLastWithdrawTime({ commit }, value) {
    commit('setLastWithdrawTime', value)
  },
  setWithdrawAmount({ commit }, value) {
    commit('setWithdrawAmount', value)
  },
  setBelong({ commit }, value) {
    commit('setBelong', value)
  },
  setIb({ commit }, value) {
    commit('setIb', value)
  },
  setSecondIb({ commit }, value) {
    commit('setSecondIb', value)
  },
  setBonus({ commit }, value) {
    commit('setBonus', value)
  },
  setRebate({ commit }, value) {
    commit('setRebate', value)
  },
  setEmail({ commit }, value) {
    commit('setEmail', value)
  },
  setMobile({ commit }, value) {
    commit('setMobile', value)
  },
  setVps({ commit }, value) {
    commit('setVps', value)
  },
  setVpsAccount({ commit }, value) {
    commit('setVpsAccount', value)
  },
  setVpsPassword({ commit }, value) {
    commit('setVpsPassword', value)
  },
  setMmStrategy({ commit }, value) {
    commit('setMmStrategy', value)
  },
  setMmMutiple({ commit }, value) {
    commit('setMmMutiple', value)
  },
  setTradeStrategy({ commit }, value) {
    commit('setTradeStrategy', value)
  },
  setTradeMultiple({ commit }, value) {
    commit('setTradeMultiple', value)
  },
  setLeverage({ commit }, value) {
    commit('setLeverage', value)
  },
  setPredictRebate({ commit }, value) {
    commit('setPredictRebate', value)
  },
  setTotalProfit({ commit }, value) {
    commit('setTotalProfit', value)
  },
  setDayProfit({ commit }, value) {
    commit('setDayProfit', value)
  },
  setTotalVolume({ commit }, value) {
    commit('setTotalVolume', value)
  },
  setBalance({ commit }, value) {
    commit('setBalance', value)
  },
  setEquity({ commit }, value) {
    commit('setEquity', value)
  },
  setFloating({ commit }, value) {
    commit('setFloating', value)
  },
  setOrderNumber({ commit }, value) {
    commit('setOrderNumber', value)
  },
  setMissing({ commit }, value) {
    commit('setMissing', value)
  },
  setConnectStatus({ commit }, value) {
    commit('setConnectStatus', value)
  },
  setComment({ commit }, value) {
    commit('setComment', value)
  },
  setArchiveStatus({ commit }, value) {
    commit('setArchiveStatus', value)
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
  setPlatform(state, value) {
    state.entry.platform = value
  },
  setPlatformType(state, value) {
    state.entry.platform_type = value
  },
  setTradeAccount(state, value) {
    state.entry.trade_account = value
  },
  setPassword(state, value) {
    state.entry.password = value
  },
  setStatus(state, value) {
    state.entry.status_id = value
  },
  setABStock(state, value) {
    state.entry.a_b_stock = value
  },
  setName(state, value) {
    state.entry.name = value
  },
  setLastDepositTime(state, value) {
    state.entry.last_deposit_time = value
  },
  setDepositAmount(state, value) {
    state.entry.deposit_amount = value
  },
  setWithdrawAccount(state, value) {
    state.entry.withdraw_account = value
  },
  setLastWithdrawTime(state, value) {
    state.entry.last_withdraw_time = value
  },
  setWithdrawAmount(state, value) {
    state.entry.withdraw_amount = value
  },
  setBelong(state, value) {
    state.entry.belong_id = value
  },
  setIb(state, value) {
    state.entry.ib = value
  },
  setSecondIb(state, value) {
    state.entry.second_ib = value
  },
  setBonus(state, value) {
    state.entry.bonus = value
  },
  setRebate(state, value) {
    state.entry.rebate = value
  },
  setEmail(state, value) {
    state.entry.email = value
  },
  setMobile(state, value) {
    state.entry.mobile = value
  },
  setVps(state, value) {
    state.entry.vps = value
  },
  setVpsAccount(state, value) {
    state.entry.vps_account = value
  },
  setVpsPassword(state, value) {
    state.entry.vps_password = value
  },
  setMmStrategy(state, value) {
    state.entry.mm_strategy = value
  },
  setMmMutiple(state, value) {
    state.entry.mm_mutiple = value
  },
  setTradeStrategy(state, value) {
    state.entry.trade_strategy = value
  },
  setTradeMultiple(state, value) {
    state.entry.trade_multiple = value
  },
  setLeverage(state, value) {
    state.entry.leverage = value
  },
  setPredictRebate(state, value) {
    state.entry.predict_rebate = value
  },
  setTotalProfit(state, value) {
    state.entry.total_profit = value
  },
  setDayProfit(state, value) {
    state.entry.day_profit = value
  },
  setTotalVolume(state, value) {
    state.entry.total_volume = value
  },
  setBalance(state, value) {
    state.entry.balance = value
  },
  setEquity(state, value) {
    state.entry.equity = value
  },
  setFloating(state, value) {
    state.entry.floating = value
  },
  setOrderNumber(state, value) {
    state.entry.order_number = value
  },
  setMissing(state, value) {
    state.entry.missing = value
  },
  setConnectStatus(state, value) {
    state.entry.connect_status = value
  },
  setComment(state, value) {
    state.entry.comment = value
  },
  setArchiveStatus(state, value) {
    state.entry.archive_status = value
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
