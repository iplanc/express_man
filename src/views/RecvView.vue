<template>
  <div class="recv">
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
  name: 'RecvView',
  data() {
    return {
      activeNames: "arrived",
      api: "//localhost/api/arrived.php"
    }
  },
  components: {
    listComponent
  },
}
</script>

<style scoped>
.time {
  font-size: 12px;
  color: #999;
}

.bottom {
  margin-top: 13px;
  line-height: 12px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.button {
  padding: 0;
  min-height: auto;
}

.image {
  width: 100%;
  display: block;
}
</style>
