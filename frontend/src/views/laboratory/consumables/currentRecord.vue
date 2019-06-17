<template>
    <el-row>
        <el-col :span="24">
            <el-badge :value="12" class="item" style="float:right;margin-right:30px;">
                <el-button>待处理</el-button>
            </el-badge>
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
    name: "currentRecord",
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
        deleteRow(index, rows) {
            rows.splice(index, 1)
        },
        filterTag(value, row) {
            return row.tag === value;
        },
    },
    mounted: function() {
        //window.innerHeight:浏览器的可用高度
        this.tableHeight = window.innerHeight-180;
    },
};
</script>

<style>
    
</style>