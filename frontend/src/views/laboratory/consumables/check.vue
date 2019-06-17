<template>
    <el-row>
        <el-col :span="24">
            <el-table
                :data="tableData"
                :height="tableHeight"
                highlight-current-row
                style="width: 100%;">
                <el-table-column
                    prop="date"
                    align="center"
                    :filters="[{ text: '工具类', value: '工具类' }, { text: 'IT类', value: 'IT类' }, { text: '设备小治具', value: '设备小治具' }, { text: '消耗品', value: '消耗品' }]"
                    :filter-method="filterTag"
                    label="分类">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="物品名称">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="规格型号">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="单位">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="库存数量">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="库存基线">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="使用周期">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="待使用">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="使用中">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="库存预警">
                </el-table-column>
            </el-table>
        </el-col>
        <el-col :span="24">
            <div style="padding-top:20px; text-align:center;">
                <el-pagination
                    background
                    layout="prev, pager, next"
                    :total="1000">
                </el-pagination>
            </div>
        </el-col>
    </el-row>
</template>

<script>

export default {
    // 盘点
    name: "check",
    components: {
    },
    data() {
        return {
            tableHeight: 0,
            tableData: [{
                date: '2016-05-03',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-02',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-04',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-01',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-08',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-06',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-06',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-06',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-06',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-06',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-06',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-06',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-07',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }]
        }
    },
    methods: {
        filterTag(value, row) {
            return row.tag === value;
        },
    },
    mounted: function() {
        //window.innerHeight:浏览器的可用高度
        this.tableHeight = window.innerHeight-200;
    },
};
</script>

<style>
    
</style>