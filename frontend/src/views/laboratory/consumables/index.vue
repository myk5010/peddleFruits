<template>
    <el-row>
        <el-container>
            <el-aside width="201px">
                <el-col :span="24">
                    <div style="text-align: center;">
                        <img src="../../../../public/images/logo.png" style="height: 55px; margin-top: 3px;">
                    </div>
                    <el-menu
                        id="menu-height"
                        unique-opened
                        :default-active="activeIndex"
                        @select="handleSelect">
                        <el-submenu index="1">
                            <template slot="title">
                                <span slot="title">库存</span>
                            </template>
                            <el-menu-item-group>
                                <el-menu-item index="census">状态</el-menu-item>
                                <!-- <el-menu-item index="category">分类</el-menu-item> -->
                                <el-menu-item index="check">盘点</el-menu-item>
                            </el-menu-item-group>
                        </el-submenu>
                        <el-submenu index="2">
                            <template slot="title">
                                <span slot="title">入库</span>
                            </template>
                            <el-menu-item-group>
                                <el-menu-item index="enter">录入</el-menu-item>
                                <el-menu-item index="importFile">导入</el-menu-item>
                            </el-menu-item-group>
                        </el-submenu>
                        <el-submenu index="3">
                            <template slot="title">
                                <span slot="title">申请</span>
                            </template>
                            <el-menu-item-group>
                                <el-menu-item index="purchaseApply">低耗申购</el-menu-item>
                                <el-menu-item index="outputApply">出库申请</el-menu-item>
                            </el-menu-item-group>
                        </el-submenu>
                        <el-submenu index="4">
                            <template slot="title">
                                <span slot="title">记录</span>
                            </template>
                            <el-menu-item-group>
                                <el-menu-item index="currentRecord">当前记录</el-menu-item>
                                <el-menu-item index="historyRecord">历史记录</el-menu-item>
                            </el-menu-item-group>
                        </el-submenu>
                    </el-menu>
                </el-col>
            </el-aside>
            <el-container>
                <el-header>
                    <el-menu class="el-menu-demo" mode="horizontal">
                        <el-menu-item index="1">选项1</el-menu-item>
                        <el-submenu index="2">
                            <template slot="title">选项2</template>
                            <el-menu-item index="2-1">选项1</el-menu-item>
                            <el-menu-item index="2-2">选项2</el-menu-item>
                            <el-menu-item index="2-3">选项3</el-menu-item>
                            <el-submenu index="2-4">
                                <template slot="title">选项4</template>
                                <el-menu-item index="2-4-1">选项1</el-menu-item>
                                <el-menu-item index="2-4-2">选项2</el-menu-item>
                                <el-menu-item index="2-4-3">选项3</el-menu-item>
                            </el-submenu>
                        </el-submenu>
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
// 库存状态(统计)
import census from '@/views/laboratory/consumables/census'
// 分类
// import category from '@/views/laboratory/consumables/category'
// 盘点
import check from '@/views/laboratory/consumables/check'
// 入库-录入
import enter from '@/views/laboratory/consumables/enter'
// 入库-导入
import importFile from '@/views/laboratory/consumables/importFile'
// 申请-低耗申购
import purchaseApply from '@/views/laboratory/consumables/purchaseApply'
// 申请-出库申请
import outputApply from '@/views/laboratory/consumables/outputApply'
// 记录-当前记录
import currentRecord from '@/views/laboratory/consumables/currentRecord'
// 记录-历史记录
import historyRecord from '@/views/laboratory/consumables/historyRecord'

export default {
    name: "index",
    components: {
        census,
        // category,
        check,
        enter,
        importFile,
        purchaseApply,
        outputApply,
        currentRecord,
        historyRecord,
    },
    data() {
        return {
            activeIndex: 'census',
            currentModel: 'census'
        }
    },
    methods: {
        // 动态调用组件
        handleSelect(key, keyPath) {
            this.currentModel = key
        },
    },
    mounted: function() {
        //window.innerHeight:浏览器的可用高度
        console.log(window.innerHeight);
        var menu = document.getElementById('menu-height')
        menu.style.height = (window.innerHeight-62) + 'px'
        console.log(menu.style.height);
    },
};
</script>

<style>
    .el-header {
        padding: 0;
    }
</style>