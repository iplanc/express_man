<template>
  <div class="send">
    <el-skeleton :loading="arrived_loading" animated :count="2">
      <template #template>
        <div style="padding: 10px; margin: 10px; border-radius: 1em; background-color: gray;">
          <el-row :gutter="12">
            <el-col :span="6">
              <el-skeleton-item variant="image" style="height: 100%; border-radius: 0.5em;"/>
            </el-col>
            <el-col :span="18">
              <el-skeleton-item variant="p" style="height: 20px; width: 65%" />
              <el-skeleton-item variant="text" style="height: 10px" />
              <el-skeleton-item variant="text" style="height: 10px" />
              <el-skeleton-item variant="text" style="height: 15px; width: 35%" />
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
          <cardComponent :imageLink="item.imageLink" :title="item.title" :description="item.description" :shelf_position="item.shelf_position"></cardComponent>
        </div>
      </template>
    </el-skeleton>
  </div>
</template>

<script>
import cardComponent from "@/components/cardComponent.vue"

export default {
  name: 'SendView',
  data() {
    return {
      arrived_loading: true,
      lists: [
        {
          imageLink: "https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png",
          title: "汉堡包",
          description: "好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃好吃",
          shelf_position: "1-2-3456"
        },
      ]
    }
  },
  mounted() {
    setTimeout(() => {
      this.arrived_loading = false
    }, 500);
  },
  components: {
    cardComponent
  },
}
</script>

<style scoped></style>
