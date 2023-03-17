<template>
  <router-view/>
</template>

<script>
export default {
  name: 'HomeView',
  created() {
    if (sessionStorage.getItem("username") == null) {
    this.$router.push("/")
  }
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
