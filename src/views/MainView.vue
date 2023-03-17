<!--
 * @Author: PlanC
 * @Date: 2023-03-17 16:51:17
 * @LastEditTime: 2023-03-17 17:23:52
 * @FilePath: \express_man\src\views\MainView.vue
-->
<template>
  <nav>
    <nav_component :username="username"></nav_component>
  </nav>
  <el-divider />
  <router-view />
</template>

<script>
// @ is an alias to /src
import nav_component from '@/components/nav_component.vue'

export default {
  name: 'HomeView',
  data() {
    return {
      username: sessionStorage.getItem("username"),
    }
  },
  created() {
    console.log(sessionStorage.getItem("username").username)
    if (sessionStorage.getItem("username") == null) {
      this.$router.push("/")
    }
  },
  components: {
    nav_component
  },
}
</script>

<style>
#app {
  font-family: 'Genshin', Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: var(--ep-text-color-primary);
}

nav a {
  font-weight: bold;
  color: var(--el-color-info);
}

nav a.router-link-exact-active {
  color: var(--el-color-primary);
}
</style>
