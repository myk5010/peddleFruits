<template>
    <el-row
    v-loading="loading"
    element-loading-text="拼命加载中"
    element-loading-spinner="el-icon-loading"
    element-loading-background="rgba(0, 0, 0, 0.8)">
        <el-container>
            <el-aside width="200px">
                <el-col :span="24">
                    <h3 style="height:60px;line-height:60px;text-align:center;">小麦报价单</h3>
                    <el-menu
                        @select="handleSelect"
                        :default-active="activeMenu"
                        class="el-menu-vertical-demo">
                        <el-submenu :index="String(key)" v-for="(item, key) in categoryData" :key="key">
                            <template slot="title">
                                <span>{{ item.name }}</span>
                            </template>
                            <el-menu-item-group v-for="(childrenItem, childrenKey) in item.children" :key="childrenKey">
                                <el-menu-item :index="String(childrenItem.id)">{{ childrenItem.name }}</el-menu-item>
                            </el-menu-item-group>
                        </el-submenu>
                    </el-menu>
                </el-col>
            </el-aside>
            <el-main>
                <el-carousel :interval="4000" type="card" height="400px">
                    <el-carousel-item v-for="item in 6" :key="item">
                        <h3 class="medium">{{ item }}</h3>
                        <!-- <img src="/public/upload/pictures/fruits/1/02f27ab953c3506ad8ff80a4a0643230.jpg"> -->
                    </el-carousel-item>
                </el-carousel>
                <el-row type="flex" class="row-bg" justify="space-around" style="margin-top:40px;">
                    <el-col :span="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>参数</span>
                            </div>
                            <div class="text item">
                                规格: 
                            </div>
                            <div class="text item">
                                品牌: 
                            </div>
                            <div class="text item">
                                单位: 
                            </div>
                        </el-card>
                    </el-col>
                    <el-col :span="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>报价</span>
                            </div>
                            <div class="text item">
                                上次报价: 元
                            </div>
                            <div class="text item">
                                本次报价: 元
                            </div>
                            <div class="text item">
                                核定报价: 元
                            </div>
                        </el-card>
                    </el-col>
                    <el-col :span="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>质量承诺(保质期)</span>
                            </div>
                            <div class="text item">
                                1 : 
                            </div>
                            <div class="text item">
                                2 : 
                            </div>
                            <div class="text item">
                                3 : 
                            </div>
                        </el-card>
                    </el-col>
                </el-row>
                <el-row style="margin-top:40px;">
                    <el-divider content-position="right">联系人: 高先生</el-divider>
                    <el-divider content-position="right">电话:12345678910</el-divider>
                </el-row>
                <div style="position: absolute; bottom: 0px; left: 50%;">
                    <a href="http://www.miitbeian.gov.cn" style="color: rgb(48, 49, 51); text-decoration: none;">粤ICP备17145461号</a>
                </div>
            </el-main>
        </el-container>
    </el-row>
</template>

<script>

export default {
    name: "Index",
    components: {
    },
    data() {
        return {
            loading: false,
            // 水果分类
            categoryData: [],
            activeMenu: '',
        }
    },
    methods: {
        // 动态调用组件
        handleSelect(key) {
            console.log(key);
            // this.currentModel = key
        },
        getCategory() {
            this.$ajax({
                method: 'get',
                url: '/admin/fruits/category',
            }).then(function(res){
                this.categoryData = res.data
                this.activeMenu = (this.categoryData[0]['children'][0]['id']).toString()
                this.loading = false
            }.bind(this))
        },
    },
    mounted () {
        this.getCategory()
        
    },
};
</script>

<style>
    .el-header {
        padding: 0;
    }
    .el-carousel__item h3 {
        color: #475669;
        font-size: 14px;
        opacity: 0.75;
        line-height: 200px;
        margin: 0;
    }
    
    .el-carousel__item:nth-child(2n) {
        background-color: #99a9bf;
    }
    
    .el-carousel__item:nth-child(2n+1) {
        background-color: #d3dce6;
    }
</style>