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
                <strong>{{ $t('cruds.crmDocument.title_singular') }}</strong>
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
                      'has-items': entry.customer_id !== null,
                      'is-focused': activeField == 'customer'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmDocument.fields.customer')
                    }}</label>
                    <v-select
                      name="customer"
                      label="trade_account"
                      :key="'customer-field'"
                      :value="entry.customer_id"
                      :options="lists.customer"
                      :reduce="entry => entry.id"
                      @input="updateCustomer"
                      @search.focus="focusField('customer')"
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
                      $t('cruds.crmDocument.fields.name')
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
                      'has-items': entry.type,
                      'is-focused': activeField == 'type'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.crmDocument.fields.type')
                    }}</label>
                    <v-select
                      name="type"
                      :key="'type-field'"
                      :value="entry.type"
                      :options="lists.type"
                      :reduce="entry => entry.value"
                      @input="updateType"
                      @search.focus="focusField('type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.crmDocument.fields.document_file')
                    }}</label>
                    <attachment
                      :route="getRoute('crm-documents')"
                      :collection-name="'crm_document_document_file'"
                      :media="entry.document_file"
                      :max-file-size="20"
                      @file-uploaded="insertDocumentFileFile"
                      @file-removed="removeDocumentFileFile"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.crmDocument.fields.photo') }}</label>
                    <attachment
                      :route="getRoute('crm-documents')"
                      :collection-name="'crm_document_photo'"
                      :media="entry.photo"
                      :max-file-size="20"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertPhotoFile"
                      @file-removed="removePhotoFile"
                    />
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
import Attachment from '@components/Attachments/Attachment'

export default {
  components: {
    Attachment
  },
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('CrmDocumentsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('CrmDocumentsSingle', [
      'storeData',
      'resetState',
      'setCustomer',
      'setName',
      'setType',
      'insertDocumentFileFile',
      'removeDocumentFileFile',
      'insertPhotoFile',
      'removePhotoFile',
      'fetchCreateData'
    ]),
    updateCustomer(value) {
      this.setCustomer(value)
    },
    updateName(e) {
      this.setName(e.target.value)
    },
    updateType(value) {
      this.setType(value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'crm_documents.index' })
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
