<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.crmCustomer.title_singular') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.platform') }}
                        </td>
                        <td>
                          {{ entry.platform }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.platform_type') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="platform_type">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.trade_account') }}
                        </td>
                        <td>
                          {{ entry.trade_account }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.password') }}
                        </td>
                        <td>
                          {{ entry.password }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.status') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="status.name">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.a_b_stock') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="a_b_stock">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.name') }}
                        </td>
                        <td>
                          {{ entry.name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.last_deposit_time') }}
                        </td>
                        <td>
                          {{ entry.last_deposit_time }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.deposit_amount') }}
                        </td>
                        <td>
                          {{ entry.deposit_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.withdraw_account') }}
                        </td>
                        <td>
                          {{ entry.withdraw_account }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.crmCustomer.fields.last_withdraw_time')
                          }}
                        </td>
                        <td>
                          {{ entry.last_withdraw_time }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.withdraw_amount') }}
                        </td>
                        <td>
                          {{ entry.withdraw_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.belong') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="belong.user_name"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.ib') }}
                        </td>
                        <td>
                          {{ entry.ib }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.second_ib') }}
                        </td>
                        <td>
                          {{ entry.second_ib }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.bonus') }}
                        </td>
                        <td>
                          {{ entry.bonus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.rebate') }}
                        </td>
                        <td>
                          {{ entry.rebate }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.email') }}
                        </td>
                        <td>
                          {{ entry.email }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.mobile') }}
                        </td>
                        <td>
                          {{ entry.mobile }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.vps') }}
                        </td>
                        <td>
                          {{ entry.vps }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.vps_account') }}
                        </td>
                        <td>
                          {{ entry.vps_account }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.vps_password') }}
                        </td>
                        <td>
                          {{ entry.vps_password }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.mm_strategy') }}
                        </td>
                        <td>
                          {{ entry.mm_strategy }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.mm_mutiple') }}
                        </td>
                        <td>
                          {{ entry.mm_mutiple }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.trade_strategy') }}
                        </td>
                        <td>
                          {{ entry.trade_strategy }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.trade_multiple') }}
                        </td>
                        <td>
                          {{ entry.trade_multiple }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.leverage') }}
                        </td>
                        <td>
                          {{ entry.leverage }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.predict_rebate') }}
                        </td>
                        <td>
                          {{ entry.predict_rebate }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.total_profit') }}
                        </td>
                        <td>
                          {{ entry.total_profit }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.day_profit') }}
                        </td>
                        <td>
                          {{ entry.day_profit }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.total_volume') }}
                        </td>
                        <td>
                          {{ entry.total_volume }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.balance') }}
                        </td>
                        <td>
                          {{ entry.balance }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.equity') }}
                        </td>
                        <td>
                          {{ entry.equity }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.floating') }}
                        </td>
                        <td>
                          {{ entry.floating }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.order_number') }}
                        </td>
                        <td>
                          {{ entry.order_number }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.missing') }}
                        </td>
                        <td>
                          {{ entry.missing }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.connect_status') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="connect_status">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.comment') }}
                        </td>
                        <td>
                          {{ entry.comment }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.crmCustomer.fields.archive_status') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="archive_status">
                          </datatable-enum>
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableEnum from '@components/Datatables/DatatableEnum'
import DatatableSingle from '@components/Datatables/DatatableSingle'

export default {
  components: {
    DatatableEnum,
    DatatableSingle
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('CrmCustomersSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('CrmCustomersSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
