<!--
 * @Author: PlanC
 * @Date: 2023-03-19 10:15:03
 * @LastEditTime: 2023-03-19 11:15:56
 * @FilePath: \express_man\src\components\listComponent.vue
-->

<template>
  <el-skeleton :loading="arrived_loading" animated :count="2">
    <template #template>
      <div style="padding: 10px; margin: 10px; border-radius: 1em; background-color: rgb(54, 54, 54);">
        <el-row :gutter="12">
          <el-col :span="6">
            <el-skeleton-item variant="image" style="height: 100%; border-radius: 0.5em;"/>
          </el-col>
          <el-col :span="18">
            <el-skeleton-item variant="p" style="height: 20px; width: 65%" />
            <el-skeleton-item variant="text" style="height: 15px" />
            <el-skeleton-item variant="text" style="height: 20px; width: 45%;" />
          </el-col>
        </el-row>
      </div>
    </template>
    <template #default>
      <div
        v-for="item in lists"
        :key="item.title"
        :body-style="{ padding: '10px' }"
      >
        <cardComponent :imageLink="item.image" :title="item.name" :description="item.description" :shelf_position="item.shelf_position"></cardComponent>
      </div>
    </template>
  </el-skeleton>
</template>

<script>
import cardComponent from "@/components/cardComponent.vue"
import { ElMessage } from 'element-plus'

export default {
  props: {
    api: String,
    param: String,
  },
  data() {
    return {
      arrived_loading: true,
      lists: [],
    }
  },
  created() {
    var that = this
    this.axios({
      url: that.api,
      method: "POST",
      data: {
        username: sessionStorage.getItem("username"),
        param: that.param,
      },
      headers: {"Content-Type": "application/x-www-form-urlencoded"}
    })
    .then(function (response) {
      that.lists = response.data
      setTimeout(() => {
        that.arrived_loading = false
      }, Math.floor(Math.random() * (2000 - 1000)) + 1000)
    })
    .catch(function (err) {
      ElMessage({
        message: err
      })
    })
  },
  components: {
    cardComponent
  },
}
</script>

<style scoped></style>
