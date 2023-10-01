<script setup>

const props = defineProps({ user : Object})
</script>

<template>
<el-row>
    <el-col>Ixir Logo</el-col>
    <el-col> {{ user.name }}</el-col>
</el-row>
</template>

<style>

</style>

