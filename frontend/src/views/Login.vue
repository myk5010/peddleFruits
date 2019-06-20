<template>
    <el-row>
        <el-col :span="6" :offset="14">
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="80px" class="demo-ruleForm">
                <el-form-item label="账号" prop="email">
                    <el-input v-model="ruleForm.email"></el-input>
                </el-form-item>
                <el-form-item label="密码" prop="password">
                    <el-input type="password" v-model="ruleForm.password"></el-input>
                </el-form-item>
                <el-form-item style="text-align:center;">
                    <el-button type="primary" @click="submitForm('ruleForm')">登录</el-button>
                </el-form-item>
            </el-form>
        </el-col>
    </el-row>
</template>

<script>

export default {
    name: "Login",
    components: {
    },
    data() {
        return {
            ruleForm: {
                email: '',
                password: ''
            },
            rules: {
                email: [
                    { required: true, message: '请输入账号', trigger: 'blur' },
                ],
                password: [
                    { required: true, message: '请输入密码', trigger: 'blur' },
                ],
            }
        }
    },
    methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    this.$ajax({
                        method: 'post',
                        url: '/login',
                        data: this.ruleForm,
                    }).then(function(res){
                        this.$message({
                            showClose: true,
                            message: '登录成功',
                            type: 'success'
                        })
                        // 设置token
                        this.$ajax.defaults.headers.Authorization = 'Bearer '+res.data.token
                        // 保存用户信息
                        this.$store.commit('ADD_LOGIN_USER', {'authKey': res.data.token, 'userInfo': res.data.userInfo})
                        // 跳转
                        this.$router.push('/Admin/Index')
                    }.bind(this))
                } else {
                    console.log('error login!!');
                    return false;
                }
            });
        }
    }
};
</script>

<style scoped>
    .demo-ruleForm {
        margin-top: 50%
    }
</style>