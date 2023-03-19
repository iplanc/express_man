<template>
  <div class="send">
    <el-collapse v-model="activeNames">
      <el-collapse-item name="arrived">
        <template #title>
          <h1>已送达</h1>
        </template>
        <listComponent :api="api" param="arrived"></listComponent>
      </el-collapse-item>
      <el-collapse-item name="onroad">
        <template #title>
          <h1>派送中</h1>
        </template>
        <listComponent :api="api" param="onroad"></listComponent>
      </el-collapse-item>
    </el-collapse>
  </div>
</template>

<script>
import listComponent from "@/components/listComponent.vue"

export default {
  name: 'SendView',
  data() {
    return {
      activeNames: "arrived",
      arrived_loading: true,
      lists: [],
      api: "//localhost/api/sending.php"
    }
  },
  components: {
    listComponent
  },
}
</script>

<style scoped></style>
