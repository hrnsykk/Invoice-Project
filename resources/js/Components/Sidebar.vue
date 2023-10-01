<script setup>


import {Link} from "@inertiajs/vue3";
import { Connection, House, Money, SwitchButton} from "@element-plus/icons-vue";
</script>

<template>
    <el-menu
        default-active="1"
        class="el-menu-vertical-demo"
    >
        <Link href="/">
        <el-menu-item index="1">
            <el-icon><House /></el-icon>
            <span>Home</span>
        </el-menu-item>
        </Link>

        <Link href="/invoice">
            <el-menu-item index="2">
                <el-icon><Money /></el-icon>
                <span>Invoice</span>
            </el-menu-item>
        </Link>

        <Link href="/customer">
            <el-menu-item index="3">
                <el-icon><Connection /></el-icon>
                <span>Customer</span>
            </el-menu-item>
        </Link>

        <Link href="/logout">
            <el-menu-item index="4">
                <el-icon><SwitchButton /></el-icon>
                <span>Logout</span>
            </el-menu-item>
        </Link>
    </el-menu>
</template>


<style>

.el-menu{
    height: 100vh;
}
</style>
