<template>
  <div class="recv">
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
          <cardComponent :imageLink="item.image" :title="item.name" :description="item.description" :shelf_position="item.shelf_position"></cardComponent>
        </div>
      </template>
    </el-skeleton>
  </div>
</template>

<script>
import cardComponent from "@/components/cardComponent.vue"

export default {
  name: 'RecvView',
  data() {
    return {
      arrived_loading: true,
      lists: []
    }
  },
  created() {
    var that = this
    this.axios({
      url: "http://localhost/api/arrived.php",
      method: "POST",
      data: {
        username: sessionStorage.getItem("username"),
      },
      headers: {"Content-Type": "application/x-www-form-urlencoded"}
    })
    .then(function (response) {
      console.log(response.data)
      that.lists = response.data
      setTimeout(() => {
        that.arrived_loading = false
      }, Math.floor(Math.random() * (2000 - 1000)) + 1000);
    })
    .catch(function (err) {
      console.log(err)
    })
  },
  components: {
    cardComponent
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
