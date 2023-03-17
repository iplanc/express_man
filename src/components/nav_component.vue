<template>
  <div class="hello">
    <el-button @click="logout" type="danger" link><el-icon><TopLeft /></el-icon>退出登录</el-button>
    <h1>{{ username }},您好:</h1>
    <div class="navbar">
        <router-link class="link" to="/recv">取件</router-link>
        <router-link class="link" to="/send">寄件</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    username: String
  },
  methods: {
    logout: function () {
      sessionStorage.clear()
      this.$router.push("/");
    }
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1 {
    /*font-size: var(--el-font-size-extra-large);*/
    font-size: 2.5rem;
    font-family: 'Genshin', 'Helvetica Neue', Helvetica, 'PingFang SC', 'Hiragino Sans GB','Microsoft YaHei', '微软雅黑', Arial, sans-serif;
}

.navbar{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}
.navbar .link {
    flex: 1;
    text-align: center;
    font-size: 2rem;
}
.navbar .link:link, .navbar .link:visited {
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
}
</style>
