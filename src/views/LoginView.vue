<!--
 * @Author: PlanC
 * @Date: 2023-03-17 11:26:23
 * @LastEditTime: 2023-03-18 11:17:03
 * @FilePath: \express_man\src\views\LoginView.vue
-->
<template>
  <el-form class="form" label-width="50px">
    <el-form-item label="账户">
      <el-input v-model="username" class="input" />
    </el-form-item>

    <el-form-item label="密码">
      <el-input v-model="password" class="input" type="password" />
    </el-form-item>

    <el-form-item>
      <el-button type="primary" class="login" @click="login">登录</el-button>
    </el-form-item>
  </el-form>
</template>

<script>
export default {
  data() {
    return {
      username: "zhangsan",
      password: "zhangsan",
    }
  },
  created() {
    if (sessionStorage.getItem("username") != null) {
      this.$router.push("/recv")
    }
  },
  methods: {
    login: function() {
      var that = this;
      this.axios({
        url: "http://localhost/api/test.php",
        method: "POST",
        data: {
          username: that.username,
          password: that.password,
        },
        headers: {"Content-Type": "application/x-www-form-urlencoded"}
      })
      .then(function (response) {
        console.log(response.data)
        if (response.data.result == true) {
          sessionStorage.setItem("username", response.data.param.username)
          that.$router.push("/recv")
        }
      })
      .catch(function (err) {
        console.log(err)
      })
    }
  },
}
</script>

<style>
.form {
  width: 100%;
  height: 100%;
  align-content: center;
  justify-content: center;
}
.form .input {
  width: 100%;
}
.form .login {
  width: 100%;
}
</style>
