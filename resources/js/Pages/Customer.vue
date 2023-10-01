<script setup>
import {computed, ref} from "vue";
import { router } from '@inertiajs/vue3'

import Layout from "../Layouts/Layout.vue";
import CustomerForm from "../Components/CustomerForm.vue";


const props = defineProps({customers : Object, successMessage : String })
defineOptions({layout: Layout})


const CustomerFormDialog = ref(false);
const handleClose = () => CustomerFormDialog.value = !CustomerFormDialog;
const search = ref('');
const editCustomer = ref(null);

const filterTableData = computed(() =>
    props.customers.filter(
        (data) =>
            !search.value ||
            data.name.toLowerCase().includes(search.value.toLowerCase())
    )
)
    

const handleEdit = (index ,row) =>{


    editCustomer.value = row
    CustomerFormDialog.value = true;


}

const handleDelete = (index, row) =>{
    router.post('customer/delete', {id : row.id});
}


</script>

<template>
    <div>

        {{ successMessage }}
        <el-alert v-if="successMessage" :title="successMessage" type="success" />

        <el-button class="add-button" type="primary" button @click="CustomerFormDialog = true">
            Add New Customer
        </el-button>

        <el-table :data="filterTableData" border style="width: 100%">
            <el-table-column prop="name" label="Name" width="180" />
            <el-table-column prop="tax" label="Tax" width="180" />
            <el-table-column prop="address" label="Address" />
            <el-table-column align="right">
                <template #header>
                    <el-input v-model="search" size="small" placeholder="Type to search" />
                </template>
                <template #default="scope">
                    <el-button size="small" @click="handleEdit(scope.$index, scope.row)">Edit</el-button>
                    <el-button
                        size="small"
                        type="danger"
                        @click="handleDelete(scope.$index, scope.row)"
                    >Delete
                    </el-button>
                </template>
            </el-table-column>
        </el-table>

        <el-dialog v-model="CustomerFormDialog" title="Customer Form" width="30%" :before-close="handleClose">
            <CustomerForm @closeEmit="CustomerFormDialog = !CustomerFormDialog" :editCustomer="editCustomer"/>
        </el-dialog>
    </div>


</template>

<style scoped>
.add-button
{
    margin-bottom: 10px;
}
</style>
