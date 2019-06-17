<template>
<el-container style="height:100%;padding: 0px;margin: 0px;" direction="vertical">
    <el-main id="order-list">
        <el-col :span="12">
            <div class="carousel_content">
                <el-carousel :interval="4000" type="card" height="300px">
                    <el-carousel-item v-for="item in imagesbox" :key="item.id">
                        <img :src="item.idView" class="image">
                    </el-carousel-item>
                </el-carousel>
            </div>
            <p class="now_data">{{date}}</p>
        </el-col>
        <el-col :span="12">
            <div class="login_content">   
                <el-col :span="24">
                    <el-col :span="20" :offset="2">
                        <p class="p_login">Login</p>
                        <el-form ref="form" :model="form" label-width="auto" size="medium" :rules="rules">
                            <el-form-item label="账号" prop="name">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="密码" prop="password">
                                <el-input v-model="form.password"></el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button @click="onSubmit(form)" class="login_button">登录</el-button>
                                <el-button style="margin-left: 36px;">忘记密码</el-button>
                            </el-form-item>
                        </el-form> 
                    </el-col>
                </el-col>
            </div>
        </el-col>
    </el-main>
    <el-footer style="height: 40px;">Equipment Reservation System @Test Center </el-footer>
</el-container>
</template>
<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  },
  data() {
    return {
      date:new Date(),
      clientHeight:'',
      imagesbox:[{id:0,idView:require("../../../assets/images/road.jpg")},      
      {id:1,idView:require("../../../assets/images/sunset.jpg")},
      {id:2,idView:require("../../../assets/images/trees.jpg")}],
      form: {
        name: '',
        password: '',
      },
      rules: {
        name:[
          { required: true, message: '请输入账号', trigger: 'blur' }
        ],
        password:[
          { required: true, message: '请输入密码', trigger: 'blur' }
        ],
      },
    }
  },
  mounted () {
    let _this = this
    _this.clientHeight = document.documentElement.clientHeight
    this.timer = setInterval(() => {
      _this.date = new Date().toLocaleString(); // 修改数据date
    })
  },
  watch:{
    clientHeight: function () {
        this.changeFixed(this.clientHeight)
    }
  },
   beforeDestroy() {
    if (this.timer) {
      clearInterval(this.timer); // 在Vue实例销毁前，清除我们的定时器
    }
  },
  methods: {
    changeFixed(clientHeight){                        //动态修改样式
        // console.log(clientHeight);
        document.getElementById('order-list').style.height = clientHeight - 40 +'px';
    },
    onSubmit(form) {
    //   console.log('submit!');
    //   console.log(form)
      if (form.name == 'admin' && form.password == '123123') {
        this.$message({
          showClose: true,
          message: '登录成功',
          type: 'success'
        })
        this.$router.push('/index')
      } else {
        this.$message({
          showClose: true,
          message: '账号密码错误！',
          type: 'error'
        })
      }
      
    }
  }

}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
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
  .p_login{
    border-bottom: 3px solid rgb(64, 93, 123);
    padding-bottom: 1em; 
    text-align: center;
    font-size: 25px;
    font-weight: 800
  }
  .now_data{
    text-align: center;
    font-size: 15px;
    font-weight: 700;
    margin-top: 28em;
    color: ghostwhite;
  }
  .carousel_content{
    background:cadetblue;
    width: 700px;
    display: inline-block;
    margin-top: 4em;
    box-shadow: 0 2px 4px rgba(0, 0, 0, .12);
    left:61px;
    position: fixed;
  }
  .login_content{
    position: fixed; 
    right:70px;
    border: 3px solid rgb(64, 93, 123);
    background:ghostwhite;
    width: 350px;
    display: inline-block;
    margin-top: 5em;
    border-radius: 30px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, .12);
  }
  .login_button{
    background:#2c5b5d;
    color: #f5f7fa;
  }
  .el-main {
    background-color: cadetblue;
    color: #333;
    text-align: center;
  }
  .el-footer {
    background-color: ghostwhite;
    color: #333;
    text-align: center;
    line-height: 45px;
    position: fixed;
    bottom: 0;
    left: 0px;
    width: 100%;
    font-size: 15px;
    font-weight: 700;
  }

</style>
