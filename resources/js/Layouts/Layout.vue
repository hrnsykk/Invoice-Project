<script setup lang="ts">

import Header from "../Components/Header.vue";
import Sidebar from "../Components/Sidebar.vue";

defineProps({ user : Object})
</script>

<template>

    <div class="common-layout">
        <el-container>
            <el-header>
                <Header :user="user"/>
            </el-header>
            <el-container>
                <el-aside width="200px">
                    <Sidebar/>
                </el-aside>
                <el-container>
                    <el-main>
                        <slot/>
                    </el-main>
                    <el-footer>Ixir Interactive 2023</el-footer>
                </el-container>
            </el-container>
        </el-container>
    </div>

</template>


<style>
.el-header{
    background-color: white;
    border-bottom: 1px solid #dddfe6;
    line-height: 60px;

}

.el-main{
    z-index: 1;
}
</style>
