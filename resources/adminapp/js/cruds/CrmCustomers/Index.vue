<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.table') }}
              <strong>{{ $t('cruds.crmCustomer.title') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <router-link
              class="btn btn-primary"
              v-if="$can(xprops.permission_prefix + 'create')"
              :to="{ name: xprops.route + '.create' }"
            >
              <i class="material-icons">
                add
              </i>
              {{ $t('global.add') }}
            </router-link>
            <button
              type="button"
              class="btn btn-default"
              @click="fetchIndexData"
              :disabled="loading"
              :class="{ disabled: loading }"
            >
              <i class="material-icons" :class="{ 'fa-spin': loading }">
                refresh
              </i>
              {{ $t('global.refresh') }}
            </button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-overlay" v-show="loading">
                  <div class="table-overlay-container">
                    <material-spinner></material-spinner>
                    <span>Loading...</span>
                  </div>
                </div>
                <datatable
                  :columns="columns"
                  :data="data"
                  :total="total"
                  :query="query"
                  :xprops="xprops"
                  :HeaderSettings="false"
                  :pageSizeOptions="[10, 25, 50, 100]"
                >
                  <global-search :query="query" class="pull-left" />
                  <header-settings :columns="columns" class="pull-right" />
                </datatable>
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
import DatatableActions from '@components/Datatables/DatatableActions'
import TranslatedHeader from '@components/Datatables/TranslatedHeader'
import HeaderSettings from '@components/Datatables/HeaderSettings'
import GlobalSearch from '@components/Datatables/GlobalSearch'
import DatatableEnum from '@components/Datatables/DatatableEnum'
import DatatableSingle from '@components/Datatables/DatatableSingle'

export default {
  components: {
    GlobalSearch,
    HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'cruds.crmCustomer.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.crmCustomer.fields.platform',
          field: 'platform',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.platform_type',
          field: 'platform_type',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.crmCustomer.fields.trade_account',
          field: 'trade_account',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.status',
          field: 'status.name',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.a_b_stock',
          field: 'a_b_stock',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.crmCustomer.fields.name',
          field: 'name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.last_deposit_time',
          field: 'last_deposit_time',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.deposit_amount',
          field: 'deposit_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.withdraw_account',
          field: 'withdraw_account',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.last_withdraw_time',
          field: 'last_withdraw_time',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.withdraw_amount',
          field: 'withdraw_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.belong',
          field: 'belong.user_name',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.ib',
          field: 'ib',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.second_ib',
          field: 'second_ib',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.bonus',
          field: 'bonus',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.rebate',
          field: 'rebate',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.email',
          field: 'email',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.mobile',
          field: 'mobile',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.vps',
          field: 'vps',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.vps_account',
          field: 'vps_account',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.mm_strategy',
          field: 'mm_strategy',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.mm_mutiple',
          field: 'mm_mutiple',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.trade_strategy',
          field: 'trade_strategy',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.trade_multiple',
          field: 'trade_multiple',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.leverage',
          field: 'leverage',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.predict_rebate',
          field: 'predict_rebate',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.total_profit',
          field: 'total_profit',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.day_profit',
          field: 'day_profit',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.total_volume',
          field: 'total_volume',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.balance',
          field: 'balance',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.equity',
          field: 'equity',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.floating',
          field: 'floating',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.order_number',
          field: 'order_number',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.missing',
          field: 'missing',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.connect_status',
          field: 'connect_status',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.crmCustomer.fields.comment',
          field: 'comment',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.crmCustomer.fields.archive_status',
          field: 'archive_status',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'global.actions',
          thComp: TranslatedHeader,
          tdComp: DatatableActions,
          visible: true,
          thClass: 'text-right',
          tdClass: 'text-right td-actions',
          colStyle: 'width: 150px;'
        }
      ],
      query: { sort: 'trade_account', order: 'asc', limit: 100, s: '' },
      xprops: {
        module: 'CrmCustomersIndex',
        route: 'crm_customers',
        permission_prefix: 'crm_customer_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('CrmCustomersIndex', ['data', 'total', 'loading'])
  },
  watch: {
    query: {
      handler(query) {
        this.setQuery(query)
        this.fetchIndexData()
      },
      deep: true
    }
  },
  methods: {
    ...mapActions('CrmCustomersIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
