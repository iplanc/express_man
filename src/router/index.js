import { createRouter, createWebHistory } from 'vue-router'
import RecvView from '../views/RecvView.vue'
import LoginView from '../views/LoginView.vue'
import MainView from '../views/MainView.vue'

const routes = [
  {
    path: '/',
    name: 'login',
    component: LoginView
  },
  {
    path: '/main',
    name: 'main',
    component: MainView,
    children:[
      {
        path: '/recv',
        name: 'recv',
        component: RecvView
      },
      {
        path: '/send',
        name: 'send',
        // comments: SendView
        component: () => import("@/views/SendView.vue")
      }
    ]
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
