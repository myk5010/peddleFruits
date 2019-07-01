<template>
    <el-row>
        <el-container>
            <el-aside width="200px">
                <el-col :span="24">
                    <div style="height:60px"></div>
                    <el-menu
                        @select="handleSelect"
                        default-active="category"
                        class="el-menu-vertical-demo">
                        <el-submenu index="1">
                            <template slot="title">
                                <span>水果分类</span>
                            </template>
                            <el-menu-item-group>
                                <el-menu-item index="category">编辑分类</el-menu-item>
                            </el-menu-item-group>
                        </el-submenu>
                        <el-submenu index="2">
                            <template slot="title">
                                <span>水果内容</span>
                            </template>
                            <el-menu-item-group>
                                <el-menu-item index="contents">编辑内容</el-menu-item>
                            </el-menu-item-group>
                        </el-submenu>
                    </el-menu>
                </el-col>
            </el-aside>
            <el-container>
                <el-header>
                    <el-menu default-active="1" class="el-menu-demo" mode="horizontal">
                        <el-menu-item index="1">小麦报价单</el-menu-item>
                        <el-menu-item index="2">Markdown解析</el-menu-item>
                    </el-menu>
                </el-header>
                <el-main>
                    <div :is='currentModel'></div>
                </el-main>
            </el-container>
        </el-container>
    </el-row>
</template>

<script>
// 分类
import category from '@/views/Admin/Fruits/Category'
import contents from '@/views/Admin/Fruits/Contents'

export default {
    name: "Index",
    components: {
        category,
        contents,
    },
    data() {
        return {
            // 当前主体内容组件
            currentModel: 'category'
        }
    },
    methods: {
        // 动态调用组件
        handleSelect(key) {
            this.currentModel = key
        },
    },
    // mounted () {
    //     this.getList()
    // },
};
</script>

<style>
    .el-header {
        padding: 0;
    }
</style>