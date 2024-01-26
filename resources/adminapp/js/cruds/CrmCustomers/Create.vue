<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
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
                    <label class="bmd-label-floating required">{{
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
                    <label class="bmd-label-floating required">{{
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
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('CrmCustomersSingle', [
      'storeData',
      'resetState',
      'setPlatform',
      'setPlatformType',
      'setTradeAccount',
      'setPassword',
      'setName',
      'setLastDepositTime',
      'setDepositAmount',
      'setIb',
      'setSecondIb',
      'setBonus',
      'setRebate',
      'setEmail',
      'setMobile',
      'setVps',
      'setVpsAccount',
      'setVpsPassword',
      'setComment',
      'fetchCreateData'
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
    updateName(e) {
      this.setName(e.target.value)
    },
    updateLastDepositTime(e) {
      this.setLastDepositTime(e.target.value)
    },
    updateDepositAmount(e) {
      this.setDepositAmount(e.target.value)
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
    updateComment(e) {
      this.setComment(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'crm_customers.index' })
          this.$eventHub.$emit('create-success')
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
