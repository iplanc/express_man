import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import axios from 'axios'
import VueAxios from 'vue-axios'
import ElementUI from 'element-plus'
import "@/master.css";
import 'element-plus/theme-chalk/dark/css-vars.css'
import 'element-plus/dist/index.css'

import * as ElementPlusIconsVue from "@element-plus/icons-vue"

const app = createApp(App)
for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
  app.component(key, component)
}
app.use(store).use(router).use(VueAxios, axios).use(ElementUI).mount('#app')
