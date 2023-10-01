<script setup>

import {ref, reactive} from "vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({errors: Object})

const user = useForm({email: '', password: ''});
const loginRef = ref();
const submitForm = (loginRef) => {
    if (!loginRef) return

    loginRef.validate((valid) => {
        if (valid)
            user.post('login-check')
    })
}

console.log(props.errors)

const emailValidation = (rule, value, callback) => {

    if (!value) {
        return callback(new Error('Please input the e-mail'))
    } else if (!value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        return callback(new Error('You have entered an invalid email address!'))
    } else {
        callback();
    }
}

const passValidation = (rule, value, callback) => {
    if (!value) return callback(new Error('Please input the password'))
    callback();
}

const rules = reactive({
    email: [{validator: emailValidation, trigger: 'blur'}],
    password: [{validator: passValidation, trigger: 'blue'}]
})


const checkEnter = () =>{
    console.log("enter check")
}
</script>

<template>
    <el-row>
        <el-col :span="12">
            <div class="grid-content">
                <img src="images/Fingerprint-rafiki.svg" alt="">
            </div>
        </el-col>
        <el-col :span="12">
            <div class="grid-content">

                <el-form label-position="top" ref="loginRef" :rules="rules" :model="user" size="large" @submit.prevent.native="checkEnter">
                    <h1>Ixir Invoice System</h1>
                    <el-form-item label="E-Mail" prop="email">
                        <el-input v-model="user.email" placeholder="Please E-Mail Address"></el-input>
                    </el-form-item>

                    <el-form-item label="Password" prop="password">
                        <el-input type="password" v-model="user.password" placeholder="Password"></el-input>
                    </el-form-item>

                    <el-form-item>
                        <el-button type="primary" @click="submitForm(loginRef)">Login</el-button>
                    </el-form-item>

                    <el-text class="mx-1" type="danger" v-for="error in user.errors" :key="error"> {{ error }}</el-text>
                </el-form>

            </div>
        </el-col>
    </el-row>

</template>

<style scoped>
.grid-content {
    display: flex;
    //flex-direction: column;
    width: calc(100% - 50px);
    height: 100%;
    align-items: center;
}


.el-form{
    width: 100%;
}
</style>


