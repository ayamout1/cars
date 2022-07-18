import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      },
      {
        path: 'cars',
        name: 'cars.index',
        component: () => import('@cruds/Cars/Index.vue'),
        meta: { title: 'cruds.car.title' }
      },
      {
        path: 'cars/create',
        name: 'cars.create',
        component: () => import('@cruds/Cars/Create.vue'),
        meta: { title: 'cruds.car.title' }
      },
      {
        path: 'cars/:id',
        name: 'cars.show',
        component: () => import('@cruds/Cars/Show.vue'),
        meta: { title: 'cruds.car.title' }
      },
      {
        path: 'cars/:id/edit',
        name: 'cars.edit',
        component: () => import('@cruds/Cars/Edit.vue'),
        meta: { title: 'cruds.car.title' }
      },
      {
        path: 'prices',
        name: 'prices.index',
        component: () => import('@cruds/Prices/Index.vue'),
        meta: { title: 'cruds.price.title' }
      },
      {
        path: 'prices/create',
        name: 'prices.create',
        component: () => import('@cruds/Prices/Create.vue'),
        meta: { title: 'cruds.price.title' }
      },
      {
        path: 'prices/:id',
        name: 'prices.show',
        component: () => import('@cruds/Prices/Show.vue'),
        meta: { title: 'cruds.price.title' }
      },
      {
        path: 'prices/:id/edit',
        name: 'prices.edit',
        component: () => import('@cruds/Prices/Edit.vue'),
        meta: { title: 'cruds.price.title' }
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
