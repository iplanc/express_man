<!--
 * @Author: PlanC
 * @Date: 2023-03-18 14:59:25
 * @LastEditTime: 2023-03-18 15:49:20
 * @FilePath: \express_man\src\components\cardComponent.vue
-->

<template>
  <div class="border">
    <el-row :gutter="12">
      <el-col :span="6">
        <img :src="imageLink" class="image"/>
      </el-col>
      <el-col :span="18">
        <font size="4">{{ title }}</font><br />
        <font size="1">{{ description }}</font><br />
        <font size="3">{{ shelf_position }}</font>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  name: 'cardComponents',
  props: {
    imageLink: String,
    title: String,
    description: String,
    shelf_position: String
  },
  methods: {
    logout: function () {
      sessionStorage.clear()
      this.$router.push("/");
    }
  },
}
</script>

<style scoped>
.border {
  padding: 10px;
  margin: 10px;
  border-radius: 1em;
  background-color: gray;
}

.image {
  width: 100%;
  border-radius: 0.5em;
}
</style>
