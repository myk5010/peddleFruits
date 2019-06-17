<template>
    <el-row>
       <el-col :span="4">
            <div class="block">
                <p>自定义低耗申购分类</p>
                <el-tree
                    :data="data"
                    show-checkbox
                    node-key="id"
                    default-expand-all
                    :expand-on-click-node="false"
                    :render-content="renderContent">
                </el-tree>
                <div style="margin-top:20px;text-align:center;">
                    <el-button type="primary" size="small">提 交</el-button>
                </div>
            </div>
       </el-col>
    </el-row>
</template>

<script>
let id = 1000;
export default {
    // 库存分类
    name: "category",
    components: {
    },
    data() {
        const data = [{
            id: 1,
            label: '工具类',
            children: []
        }, {
            id: 2,
            label: 'IT类',
            children: []
        }, {
            id: 4,
            label: '设备小治具',
            children: []
        }, {
            id: 5,
            label: '消耗品',
            children: [{
                id: 6,
                label: '化学品'
            }, {
                id: 7,
                label: '化妆品'
            }, {
                id: 8,
                label: '办公用品'
            }, {
                id: 9,
                label: '其他'
            }]
        }];
        return {
            data: JSON.parse(JSON.stringify(data)),
        }
    },
    methods: {
        append(data) {
            const newChild = { id: id++, label: 'testtest', children: [] };
            if (!data.children) {
            this.$set(data, 'children', []);
            }
            data.children.push(newChild);
        },
        remove(node, data) {
            const parent = node.parent;
            const children = parent.data.children || parent.data;
            const index = children.findIndex(d => d.id === data.id);
            children.splice(index, 1);
        },
        renderContent(h, { node, data, store }) {
            return (
            <span class="custom-tree-node">
                <span>{node.label}</span>
                <span>
                <el-button size="mini" type="text" on-click={ () => this.append(data) }>Append</el-button>
                <el-button size="mini" type="text" on-click={ () => this.remove(node, data) }>Delete</el-button>
                </span>
            </span>);
        }
    }
};
</script>

<style>
    
</style>