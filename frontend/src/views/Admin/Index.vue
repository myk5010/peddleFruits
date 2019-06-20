<template>
    <el-row>
       <div>123</div>
    </el-row>
</template>

<script>

export default {
    name: "Index",
    components: {
    },
    data() {
        return {
        }
    },
    methods: {
        getList() {
            this.$ajax({
                method: 'get',
                url: '/getDetails',
            }).then(function(res){
                window.console.log(res)
                // this.$message({
                //     showClose: true,
                //     message: '登录成功',
                //     type: 'success'
                // })
            }.bind(this))
        }
    },
    mounted () {
        this.getList()
    },
};
</script>

<style>
    
</style>