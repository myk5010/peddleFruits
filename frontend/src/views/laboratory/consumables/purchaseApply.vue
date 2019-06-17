<template>
    <el-row>
        <h1 style="margin-top: 0;">低消耗品申购</h1>
        <el-col :span="24">
            <el-form ref="form" :model="form" label-width="80px">
                <el-col :span="6">
                    <el-form-item label="分类">
                        <el-cascader
                            v-model="form.region"
                            placeholder="请选择分类"
                            :options="options"
                            @change="handleChange()">
                        </el-cascader>
                    </el-form-item>
                </el-col>
                <el-col :span="6">
                    <el-form-item label="组别">
                        <el-select v-model="form.region" placeholder="请选择组别">
                            <el-option label="技术四组" value="4"></el-option>
                            <el-option label="测试五组" value="5"></el-option>
                        </el-select>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="物品名称">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="规格型号">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="数量">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="单位">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="单价">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="金额">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="申请原因">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="经理审核">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="申请人">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="24">
                    <el-form-item label="备注/链接">
                        <el-input type="textarea" v-model="form.desc"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="24">
                    <div style="text-align:center;margin-left:0;">
                        <el-button type="primary" @click="onSubmit">立即创建</el-button>
                        <el-button>取消</el-button>
                    </div>
                </el-col>
            </el-form>
        </el-col>
    </el-row>
</template>

<script>

export default {
    name: "purchaseApply",
    components: {
    },
    data() {
        return {
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
            options: [{
                value: '1',
                label: '工具类',
            }, {
                value: '2',
                label: 'IT类',
            }, {
                value: '3',
                label: '设备小治具',
            }, {
                value: '4',
                label: '消耗品',
                children: [{
                    value: '5',
                    label: '化学品'
                }, {
                    value: '6',
                    label: '化妆品'
                }, {
                    value: '7',
                    label: '办公用品'
                }, {
                    value: '8',
                    label: '其他'
                }]
            }],
        }
    },
    methods: {
        onSubmit() {
            console.log('submit!');
        },
        handleChange(value) {
            console.log(value);
        },
    }
};
</script>

<style>
    
</style>