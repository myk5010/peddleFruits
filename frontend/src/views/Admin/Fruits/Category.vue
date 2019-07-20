<template>
    <el-row  
    v-loading="loading"
    element-loading-text="拼命加载中"
    element-loading-spinner="el-icon-loading"
    element-loading-background="rgba(0, 0, 0, 0.8)">
       <el-tree
            :data="categoryData"
            show-checkbox
            node-key="id"
            default-expand-all
            :expand-on-click-node="false"
            :props="defaultProps"
            :render-content="renderContent">
        </el-tree>
    </el-row>
</template>

<script>
let id = 1000;
export default {
    name: "Category",
    components: {
    },
    data() {
        return {
            loading: true,
            categoryData: [],
            defaultProps: {
                label:'name'
            },
        }
    },
    methods: {
        // 获取分类
        getCategory() {
            this.$ajax({
                method: 'get',
                url: '/admin/fruits/category',
            }).then(function(res){
                this.categoryData = res.data
                this.loading = false
            }.bind(this))
        },
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
    },
    mounted () {
        this.getCategory()
    },
};
</script>

<style>
    
</style>