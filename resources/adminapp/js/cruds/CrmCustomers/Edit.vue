<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.crmCustomer.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.platform,
                      'is-focused': activeField == 'platform'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.platform')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.platform"
                      @input="updatePlatform"
                      @focus="focusField('platform')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.platform_type,
                      'is-focused': activeField == 'platform_type'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.platform_type')
                    }}</label>
                    <v-select
                      name="platform_type"
                      :key="'platform_type-field'"
                      :value="entry.platform_type"
                      :options="lists.platform_type"
                      :reduce="entry => entry.value"
                      @input="updatePlatformType"
                      @search.focus="focusField('platform_type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.trade_account,
                      'is-focused': activeField == 'trade_account'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.trade_account')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.trade_account"
                      @input="updateTradeAccount"
                      @focus="focusField('trade_account')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.password,
                      'is-focused': activeField == 'password'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.password')
                    }}</label>
                    <input
                      class="form-control"
                      type="password"
                      :value="entry.password"
                      @input="updatePassword"
                      @focus="focusField('password')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status_id !== null,
                      'is-focused': activeField == 'status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.status')
                    }}</label>
                    <v-select
                      name="status"
                      label="name"
                      :key="'status-field'"
                      :value="entry.status_id"
                      :options="lists.status"
                      :reduce="entry => entry.id"
                      @input="updateStatus"
                      @search.focus="focusField('status')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.a_b_stock,
                      'is-focused': activeField == 'a_b_stock'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.a_b_stock')
                    }}</label>
                    <v-select
                      name="a_b_stock"
                      :key="'a_b_stock-field'"
                      :value="entry.a_b_stock"
                      :options="lists.a_b_stock"
                      :reduce="entry => entry.value"
                      @input="updateABStock"
                      @search.focus="focusField('a_b_stock')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.name,
                      'is-focused': activeField == 'name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name"
                      @input="updateName"
                      @focus="focusField('name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.last_deposit_time,
                      'is-focused': activeField == 'last_deposit_time'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.last_deposit_time')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.last_deposit_time"
                      @input="updateLastDepositTime"
                      @focus="focusField('last_deposit_time')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.deposit_amount,
                      'is-focused': activeField == 'deposit_amount'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.deposit_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.deposit_amount"
                      @input="updateDepositAmount"
                      @focus="focusField('deposit_amount')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.withdraw_account,
                      'is-focused': activeField == 'withdraw_account'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.withdraw_account')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.withdraw_account"
                      @input="updateWithdrawAccount"
                      @focus="focusField('withdraw_account')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.last_withdraw_time,
                      'is-focused': activeField == 'last_withdraw_time'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.last_withdraw_time')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.last_withdraw_time"
                      @input="updateLastWithdrawTime"
                      @focus="focusField('last_withdraw_time')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.withdraw_amount,
                      'is-focused': activeField == 'withdraw_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.withdraw_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.withdraw_amount"
                      @input="updateWithdrawAmount"
                      @focus="focusField('withdraw_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.belong_id !== null,
                      'is-focused': activeField == 'belong'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.belong')
                    }}</label>
                    <v-select
                      name="belong"
                      label="user_name"
                      :key="'belong-field'"
                      :value="entry.belong_id"
                      :options="lists.belong"
                      :reduce="entry => entry.id"
                      @input="updateBelong"
                      @search.focus="focusField('belong')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.ib,
                      'is-focused': activeField == 'ib'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.ib')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.ib"
                      @input="updateIb"
                      @focus="focusField('ib')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.second_ib,
                      'is-focused': activeField == 'second_ib'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.second_ib')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.second_ib"
                      @input="updateSecondIb"
                      @focus="focusField('second_ib')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.bonus,
                      'is-focused': activeField == 'bonus'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.bonus')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.bonus"
                      @input="updateBonus"
                      @focus="focusField('bonus')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.rebate,
                      'is-focused': activeField == 'rebate'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.rebate')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.rebate"
                      @input="updateRebate"
                      @focus="focusField('rebate')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.email,
                      'is-focused': activeField == 'email'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.email"
                      @input="updateEmail"
                      @focus="focusField('email')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.mobile,
                      'is-focused': activeField == 'mobile'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.mobile')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.mobile"
                      @input="updateMobile"
                      @focus="focusField('mobile')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.vps,
                      'is-focused': activeField == 'vps'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.vps')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.vps"
                      @input="updateVps"
                      @focus="focusField('vps')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.vps_account,
                      'is-focused': activeField == 'vps_account'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmCustomer.fields.vps_account')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.vps_account"
                      @input="updateVpsAccount"
                      @focus="focusField('vps_account')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.vps_password,
                      'is-focused': activeField == 'vps_password'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.vps_password')
                    }}</label>
                    <input
                      class="form-control"
                      type="password"
                      :value="entry.vps_password"
                      @input="updateVpsPassword"
                      @focus="focusField('vps_password')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.mm_strategy,
                      'is-focused': activeField == 'mm_strategy'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.mm_strategy')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.mm_strategy"
                      @input="updateMmStrategy"
                      @focus="focusField('mm_strategy')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.mm_mutiple,
                      'is-focused': activeField == 'mm_mutiple'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.mm_mutiple')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.mm_mutiple"
                      @input="updateMmMutiple"
                      @focus="focusField('mm_mutiple')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.trade_strategy,
                      'is-focused': activeField == 'trade_strategy'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.trade_strategy')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.trade_strategy"
                      @input="updateTradeStrategy"
                      @focus="focusField('trade_strategy')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.trade_multiple,
                      'is-focused': activeField == 'trade_multiple'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.trade_multiple')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.trade_multiple"
                      @input="updateTradeMultiple"
                      @focus="focusField('trade_multiple')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.leverage,
                      'is-focused': activeField == 'leverage'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.leverage')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.leverage"
                      @input="updateLeverage"
                      @focus="focusField('leverage')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.predict_rebate,
                      'is-focused': activeField == 'predict_rebate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.predict_rebate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.predict_rebate"
                      @input="updatePredictRebate"
                      @focus="focusField('predict_rebate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.total_profit,
                      'is-focused': activeField == 'total_profit'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.total_profit')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.total_profit"
                      @input="updateTotalProfit"
                      @focus="focusField('total_profit')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.day_profit,
                      'is-focused': activeField == 'day_profit'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.day_profit')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.day_profit"
                      @input="updateDayProfit"
                      @focus="focusField('day_profit')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.total_volume,
                      'is-focused': activeField == 'total_volume'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.total_volume')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.total_volume"
                      @input="updateTotalVolume"
                      @focus="focusField('total_volume')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.balance,
                      'is-focused': activeField == 'balance'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.balance')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.balance"
                      @input="updateBalance"
                      @focus="focusField('balance')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.equity,
                      'is-focused': activeField == 'equity'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.equity')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.equity"
                      @input="updateEquity"
                      @focus="focusField('equity')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.floating,
                      'is-focused': activeField == 'floating'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.floating')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.floating"
                      @input="updateFloating"
                      @focus="focusField('floating')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.order_number,
                      'is-focused': activeField == 'order_number'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.order_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.order_number"
                      @input="updateOrderNumber"
                      @focus="focusField('order_number')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.missing,
                      'is-focused': activeField == 'missing'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.missing')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.missing"
                      @input="updateMissing"
                      @focus="focusField('missing')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.connect_status,
                      'is-focused': activeField == 'connect_status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.connect_status')
                    }}</label>
                    <v-select
                      name="connect_status"
                      :key="'connect_status-field'"
                      :value="entry.connect_status"
                      :options="lists.connect_status"
                      :reduce="entry => entry.value"
                      @input="updateConnectStatus"
                      @search.focus="focusField('connect_status')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.comment,
                      'is-focused': activeField == 'comment'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.crmCustomer.fields.comment')
                    }}</label>
                    <textarea
                      class="form-control"
                      rows="5"
                      :value="entry.comment"
                      @input="updateComment"
                      @focus="focusField('comment')"
                      @blur="clearFocus"
                    ></textarea>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.crmCustomer.fields.archive_status')
                    }}</label>
                    <v-radio
                      :value="entry.archive_status"
                      :options="lists.archive_status"
                      @change="updateArchiveStatus"
                    >
                    </v-radio>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('CrmCustomersSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('CrmCustomersSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setPlatform',
      'setPlatformType',
      'setTradeAccount',
      'setPassword',
      'setStatus',
      'setABStock',
      'setName',
      'setLastDepositTime',
      'setDepositAmount',
      'setWithdrawAccount',
      'setLastWithdrawTime',
      'setWithdrawAmount',
      'setBelong',
      'setIb',
      'setSecondIb',
      'setBonus',
      'setRebate',
      'setEmail',
      'setMobile',
      'setVps',
      'setVpsAccount',
      'setVpsPassword',
      'setMmStrategy',
      'setMmMutiple',
      'setTradeStrategy',
      'setTradeMultiple',
      'setLeverage',
      'setPredictRebate',
      'setTotalProfit',
      'setDayProfit',
      'setTotalVolume',
      'setBalance',
      'setEquity',
      'setFloating',
      'setOrderNumber',
      'setMissing',
      'setConnectStatus',
      'setComment',
      'setArchiveStatus'
    ]),
    updatePlatform(e) {
      this.setPlatform(e.target.value)
    },
    updatePlatformType(value) {
      this.setPlatformType(value)
    },
    updateTradeAccount(e) {
      this.setTradeAccount(e.target.value)
    },
    updatePassword(e) {
      this.setPassword(e.target.value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    updateABStock(value) {
      this.setABStock(value)
    },
    updateName(e) {
      this.setName(e.target.value)
    },
    updateLastDepositTime(e) {
      this.setLastDepositTime(e.target.value)
    },
    updateDepositAmount(e) {
      this.setDepositAmount(e.target.value)
    },
    updateWithdrawAccount(e) {
      this.setWithdrawAccount(e.target.value)
    },
    updateLastWithdrawTime(e) {
      this.setLastWithdrawTime(e.target.value)
    },
    updateWithdrawAmount(e) {
      this.setWithdrawAmount(e.target.value)
    },
    updateBelong(value) {
      this.setBelong(value)
    },
    updateIb(e) {
      this.setIb(e.target.value)
    },
    updateSecondIb(e) {
      this.setSecondIb(e.target.value)
    },
    updateBonus(e) {
      this.setBonus(e.target.value)
    },
    updateRebate(e) {
      this.setRebate(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updateMobile(e) {
      this.setMobile(e.target.value)
    },
    updateVps(e) {
      this.setVps(e.target.value)
    },
    updateVpsAccount(e) {
      this.setVpsAccount(e.target.value)
    },
    updateVpsPassword(e) {
      this.setVpsPassword(e.target.value)
    },
    updateMmStrategy(e) {
      this.setMmStrategy(e.target.value)
    },
    updateMmMutiple(e) {
      this.setMmMutiple(e.target.value)
    },
    updateTradeStrategy(e) {
      this.setTradeStrategy(e.target.value)
    },
    updateTradeMultiple(e) {
      this.setTradeMultiple(e.target.value)
    },
    updateLeverage(e) {
      this.setLeverage(e.target.value)
    },
    updatePredictRebate(e) {
      this.setPredictRebate(e.target.value)
    },
    updateTotalProfit(e) {
      this.setTotalProfit(e.target.value)
    },
    updateDayProfit(e) {
      this.setDayProfit(e.target.value)
    },
    updateTotalVolume(e) {
      this.setTotalVolume(e.target.value)
    },
    updateBalance(e) {
      this.setBalance(e.target.value)
    },
    updateEquity(e) {
      this.setEquity(e.target.value)
    },
    updateFloating(e) {
      this.setFloating(e.target.value)
    },
    updateOrderNumber(e) {
      this.setOrderNumber(e.target.value)
    },
    updateMissing(e) {
      this.setMissing(e.target.value)
    },
    updateConnectStatus(value) {
      this.setConnectStatus(value)
    },
    updateComment(e) {
      this.setComment(e.target.value)
    },
    updateArchiveStatus(value) {
      this.setArchiveStatus(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'crm_customers.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
