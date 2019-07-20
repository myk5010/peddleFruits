<template>
    <el-row>
        <el-form ref="form" :model="form" label-width="80px">
            <el-col :span="6">
                <el-form-item label="水果分类">
                    <el-cascader
                        v-model="form.name"
                        :options="options"
                        :props="{ expandTrigger: 'hover', label: 'name',value:'id' }">
                    </el-cascader>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="规格">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="品牌">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="单位">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6" :offset="6">
                <el-form-item label="上次报价">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="本次报价">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="6">
                <el-form-item label="核定报价">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="18" :offset="6">
                <el-form-item label="质量承诺">
                    <el-input type="textarea" v-model="form.desc"></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="18" :offset="6">
                <el-form-item label="水果图片">
                    <el-upload
                        action="https://jsonplaceholder.typicode.com/posts/"
                        list-type="picture-card"
                        :on-preview="handlePictureCardPreview"
                        :on-remove="handleRemove">
                        <i class="el-icon-plus"></i>
                    </el-upload>
                    <el-dialog :visible.sync="dialogVisible">
                        <img width="100%" :src="dialogImageUrl" alt="">
                    </el-dialog>
                </el-form-item>
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
            options: [],
            form: {
                name: '',
                region: '',
                date1: '',
                date2: '',
                delivery: false,
                type: [],
                resource: '',
                desc: ''
            },
            dialogImageUrl: '',
            dialogVisible: false,
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
            }.bind(this))
        },
        // 图片上传
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePictureCardPreview(file) {
            this.dialogImageUrl = file.url;
            this.dialogVisible = true;
        }
    },
    mounted () {
        this.getCategory()
    },
};
</script>

<style>
    
</style>