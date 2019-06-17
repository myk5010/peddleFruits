<template>
    <el-row>
        <h1 style="margin-top: 0;">导入库存信息Excel文件</h1>
        <el-col :span="8">
            <p><span style="color:red;margin-right:10px;">!!!</span>请先下载模板, 根据模板填入对应项再导入</p>
            <el-button type="primary">下载模板</el-button>
        </el-col>
        <el-col :span="8">
            <el-upload
                class="upload-demo"
                drag
                action="https://jsonplaceholder.typicode.com/posts/"
                multiple>
                <i class="el-icon-upload"></i>
                <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
                <div class="el-upload__tip" slot="tip">只能上传excel格式文件</div>
            </el-upload>
        </el-col>
    </el-row>
</template>

<script>

export default {
    name: "importFile",
    components: {
    },
    data() {
        return {
        }
    },
    methods: {
    }
};
</script>

<style>
    
</style>