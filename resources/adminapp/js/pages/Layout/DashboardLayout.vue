<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            }
          ]
        },
        {
          title: 'cruds.basicCRM.title',
          icon: 'table_view',
          path: { name: 'basic_c_r_m' },
          gate: 'basic_c_r_m_access',
          children: [
            {
              title: 'cruds.crmStatus.title',
              icon: 'table_view',
              path: { name: 'crm_statuses.index' },
              gate: 'crm_status_access'
            },
            {
              title: 'cruds.crmCustomer.title',
              icon: 'table_view',
              path: { name: 'crm_customers.index' },
              gate: 'crm_customer_access'
            },
            {
              title: 'cruds.crmNote.title',
              icon: 'table_view',
              path: { name: 'crm_notes.index' },
              gate: 'crm_note_access'
            },
            {
              title: 'cruds.crmDocument.title',
              icon: 'table_view',
              path: { name: 'crm_documents.index' },
              gate: 'crm_document_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
