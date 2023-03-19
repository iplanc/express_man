<!--
 * @Author: PlanC
 * @Date: 2023-03-18 14:59:25
 * @LastEditTime: 2023-03-19 10:44:31
 * @FilePath: \express_man\src\components\cardComponent.vue
-->

<template>
  <div class="border">
    <el-row :gutter="12">
      <el-col :span="6">
        <img :src="imageLink" class="image"/>
      </el-col>
      <el-col :span="18">
        <p class="title">{{ title }}</p>
        <p class="description">{{ description }}</p>
        <p class="position">{{ shelf_position }}</p>
        <el-button type="success">取出<el-icon><ArrowRight /></el-icon></el-button>
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
  background-color: rgb(54, 54, 54);
}

.image {
  width: 100%;
  border-radius: 0.5em;
}

p {
  margin: 0px;
  padding: 0px;
}
.title {
  font-size: 1.25rem;
}
.description {
  font-size: 0.5rem;
}
.position {
  font-size: 1.25rem;
  position: absolute;
  bottom: 0px;
  right: 15px;
  color: var(--el-color-danger);
}
</style>
