<template>
    <el-row>
        <el-col :span="8">
            <el-date-picker
                v-model="selectDate"
                type="daterange"
                range-separator="至"
                start-placeholder="开始日期"
                end-placeholder="结束日期">
            </el-date-picker>
        </el-col>
        <el-col :span="7">
            <el-input placeholder="请输入内容" v-model="input3" class="input-with-select">
                <el-select v-model="select" slot="prepend" placeholder="请选择" style="width:100px">
                    <el-option label="餐厅名" value="1"></el-option>
                    <el-option label="订单号" value="2"></el-option>
                    <el-option label="用户电话" value="3"></el-option>
                </el-select>
                <el-button slot="append" icon="el-icon-search"></el-button>
            </el-input>
        </el-col>
        <el-col :span="24">
            <el-table
                :data="tableData"
                :height="tableHeight"
                highlight-current-row
                style="width: 100%;">
                <el-table-column
                    :filters="[{ text: '工具类', value: '工具类' }, { text: 'IT类', value: 'IT类' }, { text: '设备小治具', value: '设备小治具' }, { text: '消耗品', value: '消耗品' }]"
                    :filter-method="filterTag"
                    align="center"
                    width="120"
                    prop="date"
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
                    label="数量">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="单位">
                </el-table-column>
                <el-table-column
                    prop="name"
                    align="center"
                    label="领用人">
                </el-table-column>
                <el-table-column
                    sortable
                    align="center"
                    prop="name"
                    label="出库日期">
                </el-table-column>
                <el-table-column
                    align="center"
                    fixed="right"
                    label="操作"
                    width="120">
                    <template slot-scope="scope">
                        <el-button
                        @click.native.prevent="deleteRow(scope.$index, tableData)"
                        type="text"
                        size="small">
                        归还
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>
        </el-col>
    </el-row>
</template>

<script>

export default {
    // 盘点
    name: "historyRecord",
    components: {
    },
    data() {
        return {
            // 搜索
            select: '',
            input3: '',
            // 日期选择
            selectDate: 0,
            // table表
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
        deleteRow(index, rows) {
            rows.splice(index, 1)
        },
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