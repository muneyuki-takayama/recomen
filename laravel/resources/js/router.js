import Vue from 'vue'
import VueRouter from 'vue-router'

import ProductList from './pages/ProductList.vue'
import Login from './pages/Login.vue'

Vue.use(VueRouter)

const routes = [
{
    path: '/',
    component: ProductList
},
{
    path: '/login',
    component: Login
}
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router