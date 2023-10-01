<script setup>
import {reactive, ref} from "vue"
import { useForm } from "@inertiajs/vue3";

const customerForm = useForm({
    name: '',
    address: '',
    tax: ''
})

const customerRef = ref()
const emit = defineEmits(['closeEmit'])
const props = defineProps({editCustomer : Object});
const submitForm = (customerRef) => {

    if (!customerRef) return

    customerRef.validate((valid) => {
        if(valid)
            emit("closeEmit");
            customerForm.post('customer/create')
    })
}

const rules = reactive({
    name: [
        {
            required: true,
            message: "Please fill company name",
            trigger: 'blue'
        }
    ],
    tax: [
        {
            required: true,
            message: "Please fill tax number",
            trigger: 'blue'
        }
    ],
    address: [
        {
            required: true,
            message: 'Please fill address',
            trigger: 'blue'
        }
    ]
})
</script>

<template>

    {{ editCustomer }}
    <el-form
        ref="customerRef"
        :rules="rules"
        :model="customerForm"
        label-position="right"
        label-width="100px"
    >
        <el-form-item label="Name" prop="name">
            <el-input v-model="customerForm.name"/>
        </el-form-item>
        <el-form-item label="Tax" prop="tax">
            <el-input v-model="customerForm.tax"/>
        </el-form-item>
        <el-form-item label="Address" prop="address">
            <el-input type="textarea" v-model="customerForm.address"/>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="submitForm(customerRef)">Save</el-button>
        </el-form-item>
    </el-form>
</template>

<style scoped>

</style>
