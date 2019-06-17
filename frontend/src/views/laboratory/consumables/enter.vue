<template>
    <el-row>
        <h1 style="margin-top: 0;">录入库存信息</h1>
        <el-col :span="24">
            <el-form ref="form" :model="form" label-width="80px">
                <el-col :span="12">
                    <el-form-item label="分类">
                        <el-cascader
                            v-model="form.region"
                            placeholder="请选择分类"
                            :options="options"
                            @change="handleChange()">
                        </el-cascader>
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
                    <el-form-item label="单位">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="库存数量">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="库存基线">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="使用周期">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="预警">
                        <el-input v-model="form.name"></el-input>
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
    name: "enter",
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