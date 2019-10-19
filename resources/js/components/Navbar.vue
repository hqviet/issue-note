<template>
    <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect" :router="true">
  <el-menu-item index="/">Home</el-menu-item>
</el-menu>
</template>
<script>
    export default {
        mounted() {
            console.log('NavBar mounted')
        },
        data() {
            return {
                isCollapse: true,
                activeIndex: "/"
            }
        },
        methods: {
            handleOpen() {

            },
            handleClose() {

            },
            handleSelect() {

            }
        }
    }

</script>
