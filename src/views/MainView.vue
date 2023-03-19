<!--
 * @Author: PlanC
 * @Date: 2023-03-17 16:51:17
 * @LastEditTime: 2023-03-19 10:10:36
 * @FilePath: \express_man\src\views\MainView.vue
-->
<template>
  <nav>
    <navComponent :username="username"></navComponent>
  </nav>
  <router-view />
  <el-button-group class="newEx">
    <el-button type="primary"><el-icon><Upload /></el-icon></el-button>
    <el-button type="primary"><el-icon><Plus /></el-icon></el-button>
  </el-button-group>
</template>

<script>
// @ is an alias to /src
import navComponent from '@/components/navComponent.vue'

export default {
  name: 'HomeView',
  data() {
    return {
      username: sessionStorage.getItem("username"),
    }
  },
  created() {
    if (sessionStorage.getItem("username") == null) {
      this.$router.push("/")
    }
  },
  components: {
    navComponent
  },
}
</script>

<style>
nav a {
  font-weight: bold;
  color: var(--el-color-info);
}

nav a.router-link-exact-active {
  color: var(--el-color-primary);
}

.newEx {
  position: fixed;
  right: 10px;
  bottom: 10px;
}
</style>
