<template>
    <el-row  
    v-loading="loading"
    element-loading-text="拼命加载中"
    element-loading-spinner="el-icon-loading"
    element-loading-background="rgba(0, 0, 0, 0.8)">
        <el-form ref="form" :model="form" label-width="80px">
            <el-col :span="6">
                <el-form-item label="水果分类">
                    <el-cascader
                        placeholder="可直接搜索"
                        filterable
                        @change="selectCategory"
                        v-model="categoryId"
                        :options="options"
                        :props="{ expandTrigger: 'hover', label: 'name',value:'id' }">
                    </el-cascader>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="规格">
                    <el-input v-model="form.spec"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="品牌">
                    <el-input v-model="form.brand"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="单位">
                    <el-input v-model="form.unit"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6" :offset="6">
                <el-form-item label="上次报价">
                    <el-input v-model="form.last_offer"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="本次报价">
                    <el-input v-model="form.current_offer"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="核定报价">
                    <el-input v-model="form.final_offer"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="18" :offset="6">
                <el-form-item label="质量承诺">
                    <el-input type="textarea" v-model="form.quality"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="18" :offset="6">
                <el-form-item label="水果图片">
                    <el-upload
                        :action="picture_url"
                        list-type="picture-card"
                        :on-preview="handlePictureCardPreview"
                        :headers = 'picture_headers'
                        :on-remove="handleRemove">
                        <i class="el-icon-plus"></i>
                    </el-upload>
                    <el-dialog :visible.sync="dialogVisible">
                        <img width="100%" :src="dialogImageUrl" alt="">
                    </el-dialog>
                </el-form-item>
            </el-col>
            <el-col :span="24" style="text-align:center;">
                <el-button @click="submitContent">提 交</el-button>
            </el-col>
        </el-form>
    </el-row>
</template>

<script>

export default {
    name: "Content",
    components: {
    },
    data() {
        return {
            loading: true,
            options: [],
            categoryId: '',
            form: {
                c_id: '',
                spec: '',
                brand: '',
                unit: '',
                last_offer: '',
                current_offer: '',
                final_offer: '',
                picture_address: []
            },
            dialogImageUrl: '',
            dialogVisible: false,
            picture_url: process.env.VUE_APP_API_HOST + 'admin/fruits/uploadPicture',
            picture_headers: {
                'Authorization': 'Bearer '+ sessionStorage.getItem("authKey"),
            },
        }
    },
    methods: {
        // 获取分类
        getCategory() {
            this.$ajax({
                method: 'get',
                url: '/admin/fruits/category',
            }).then(function(res){
                this.options = res.data
                this.loading = false
            }.bind(this))
        },
        // 图片上传
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePictureCardPreview(file) {
            this.dialogImageUrl = file.url;
            this.dialogVisible = true;
        },
        // 选择分类
        selectCategory (value) {
            this.loading = true
            // 获取分类详情
            this.$ajax({
                method: 'post',
                url: '/admin/fruits/detail',
                data: {'categoryId' : value[value.length - 1]},
            }).then(function(res){
                this.$message({
                    showClose: true,
                    message: res.data.message,
                    type: res.data.status,
                })
                if (res.data.status == 'success' && res.data.content.length > 0) {
                    this.form = res.data.content
                }
                this.loading = false
            }.bind(this))
        },
        // 提交修改
        submitContent () {
            console.log(this.form);
            // this.$ajax({
            //     method: 'post',
            //     url: '/admin/fruits/saveDetail',
            //     data: this.form
            // }).then(function(res){
            //     // this.options = res.data
            // }.bind(this))
        }
    },
    mounted () {
        this.getCategory()
    },
};
</script>

<style>
    
</style>