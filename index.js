import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../views/Dashboard.vue';
import IndexMenu from '../components/menu/IndexMenu.vue';
import IndexTambah from '../components/menu/TambahMenu.vue';

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Dashboard',
    component: Dashboard
  },

  {
    path: '/menu',
    name: 'IndexMenu',
    component: IndexMenu
  },

  {
    path: '/menu/tambah',
    name: 'IndexTambah',
    component: IndexTambah
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

