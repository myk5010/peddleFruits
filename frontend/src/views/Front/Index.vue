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
                    <el-carousel-item v-for="(item, key) in pictrue_list" :key="key">
                        <img :src="getImgUrl(item)">
                    </el-carousel-item>
                </el-carousel>
                <el-row type="flex" class="row-bg" justify="space-around" style="margin-top:40px;">
                    <el-col :span="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>参数</span>
                            </div>
                            <div class="text item">
                                规格: {{ fruitsContent.spec }}
                            </div>
                            <div class="text item">
                                品牌: {{ fruitsContent.brand }}
                            </div>
                            <div class="text item">
                                单位: {{ fruitsContent.unit }}
                            </div>
                        </el-card>
                    </el-col>
                    <el-col :span="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>报价</span>
                            </div>
                            <div class="text item">
                                上次报价: {{ fruitsContent.last_offer }}元
                            </div>
                            <div class="text item">
                                本次报价: {{ fruitsContent.current_offer }}元
                            </div>
                            <div class="text item">
                                核定报价: {{ fruitsContent.final_offer }}元
                            </div>
                        </el-card>
                    </el-col>
                    <el-col :span="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>质量承诺(保质期)</span>
                            </div>
                            <div class="text item" style="min-height: 62px;">
                                {{ fruitsContent.quality }}
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
            // 水果详情
            fruitsContent: {},
            pictrue_list: [],
        }
    },
    methods: {
        // 动态调用组件
        handleSelect(key) {
            this.selectCategory(key)
        },
        getCategory() {
            this.loading = true
            this.$ajax({
                method: 'get',
                url: '/admin/fruits/category',
            }).then(function(res){
                this.categoryData = res.data
                this.activeMenu = (this.categoryData[0]['children'][0]['id']).toString()
                this.selectCategory(this.activeMenu)
            }.bind(this))
        },
        // 获取分类详情
        selectCategory (value) {
            this.loading = true
            // 获取分类详情
            this.$ajax({
                method: 'post',
                url: '/admin/fruits/detail',
                data: {'categoryId' : value},
            }).then(function(res){
                this.$message({
                    message: res.data.message,
                    type: res.data.status,
                })
                this.fruitsContent = res.data.data
                this.pictrue_list = res.data.data.pictrue_list
                this.loading = false
            }.bind(this))
        },
        // 拼接图片路径
        getImgUrl(item){
            return process.env.VUE_APP_BASE_HOST + item.url;
        }
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
    .el-carousel__item {
        font-size: 14px;
        opacity: 0.75;
        line-height: 200px;
        margin: 0;
        text-align: center;
    }
</style>