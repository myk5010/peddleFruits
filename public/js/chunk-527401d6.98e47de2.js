(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-527401d6"],{"0a49":function(e,t,a){var n=a("9b43"),i=a("626a"),r=a("4bf8"),o=a("9def"),l=a("cd1c");e.exports=function(e,t){var a=1==e,s=2==e,c=3==e,d=4==e,u=6==e,f=5==e||u,m=t||l;return function(t,l,p){for(var h,g,v=r(t),b=i(v),y=n(l,p,3),x=o(b.length),_=0,k=a?m(t,x):s?m(t,0):void 0;x>_;_++)if((f||_ in b)&&(h=b[_],g=y(h,_,v),e))if(a)k[_]=g;else if(g)switch(e){case 3:return!0;case 5:return h;case 6:return _;case 2:k.push(h)}else if(d)return!1;return u?-1:c||d?d:k}}},1169:function(e,t,a){var n=a("2d95");e.exports=Array.isArray||function(e){return"Array"==n(e)}},"20d6":function(e,t,a){"use strict";var n=a("5ca1"),i=a("0a49")(6),r="findIndex",o=!0;r in[]&&Array(1)[r](function(){o=!1}),n(n.P+n.F*o,"Array",{findIndex:function(e){return i(this,e,arguments.length>1?arguments[1]:void 0)}}),a("9c6c")(r)},7100:function(e,t,a){},"7c0f":function(e,t,a){"use strict";var n=a("7100"),i=a.n(n);i.a},"7f7f":function(e,t,a){var n=a("86cc").f,i=Function.prototype,r=/^\s*function ([^ (]*)/,o="name";o in i||a("9e1e")&&n(i,o,{configurable:!0,get:function(){try{return(""+this).match(r)[1]}catch(e){return""}}})},a66b:function(e,t,a){"use strict";a.r(t);var n=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("el-row",[a("el-container",[a("el-aside",{attrs:{width:"200px"}},[a("el-col",{attrs:{span:24}},[a("div",{staticStyle:{height:"60px"}}),a("el-menu",{staticClass:"el-menu-vertical-demo",attrs:{"default-active":"category"},on:{select:e.handleSelect}},[a("el-submenu",{attrs:{index:"1"}},[a("template",{slot:"title"},[a("span",[e._v("水果分类")])]),a("el-menu-item-group",[a("el-menu-item",{attrs:{index:"category"}},[e._v("编辑分类")])],1)],2),a("el-submenu",{attrs:{index:"2"}},[a("template",{slot:"title"},[a("span",[e._v("水果内容")])]),a("el-menu-item-group",[a("el-menu-item",{attrs:{index:"contents"}},[e._v("编辑内容")])],1)],2)],1)],1)],1),a("el-container",[a("el-header",[a("el-menu",{staticClass:"el-menu-demo",attrs:{"default-active":"1",mode:"horizontal"}},[a("el-menu-item",{attrs:{index:"1"}},[e._v("小麦报价单")]),a("el-menu-item",{attrs:{index:"2"}},[e._v("Markdown解析")])],1)],1),a("el-main",[a(e.currentModel,{tag:"div"})],1)],1)],1)],1)},i=[],r=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("el-row",{directives:[{name:"loading",rawName:"v-loading",value:e.loading,expression:"loading"}],attrs:{"element-loading-text":"拼命加载中","element-loading-spinner":"el-icon-loading","element-loading-background":"rgba(0, 0, 0, 0.8)"}},[a("el-tree",{attrs:{data:e.categoryData,"show-checkbox":"","node-key":"id","default-expand-all":"","expand-on-click-node":!1,props:e.defaultProps,"render-content":e.renderContent}})],1)},o=[],l=(a("20d6"),1e3),s={name:"Category",components:{},data:function(){return{loading:!0,categoryData:[],defaultProps:{label:"name"}}},methods:{getCategory:function(){this.$ajax({method:"get",url:"/admin/fruits/category"}).then(function(e){this.categoryData=e.data,this.loading=!1}.bind(this))},append:function(e){var t={id:l++,label:"testtest",children:[]};e.children||this.$set(e,"children",[]),e.children.push(t)},remove:function(e,t){var a=e.parent,n=a.data.children||a.data,i=n.findIndex(function(e){return e.id===t.id});n.splice(i,1)},renderContent:function(e,t){var a=this,n=t.node,i=t.data;t.store;return e("span",{class:"custom-tree-node"},[e("span",[n.label]),e("span",[e("el-button",{attrs:{size:"mini",type:"text"},on:{click:function(){return a.append(i)}}},["Append"]),e("el-button",{attrs:{size:"mini",type:"text"},on:{click:function(){return a.remove(n,i)}}},["Delete"])])])}},mounted:function(){this.getCategory()}},c=s,d=a("2877"),u=Object(d["a"])(c,r,o,!1,null,null,null),f=u.exports,m=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("el-row",{directives:[{name:"loading",rawName:"v-loading",value:e.loading,expression:"loading"}],attrs:{"element-loading-text":"拼命加载中","element-loading-spinner":"el-icon-loading","element-loading-background":"rgba(0, 0, 0, 0.8)"}},[a("el-form",{ref:"form",attrs:{model:e.form,"label-width":"80px"}},[a("el-col",{attrs:{span:6}},[a("el-form-item",{attrs:{label:"水果分类"}},[a("el-cascader",{attrs:{placeholder:"可直接搜索",filterable:"",options:e.options,props:{expandTrigger:"hover",label:"name",value:"id"}},on:{change:e.selectCategory},model:{value:e.categoryId,callback:function(t){e.categoryId=t},expression:"categoryId"}})],1)],1),a("el-col",{attrs:{span:6}},[a("el-form-item",{attrs:{label:"规格"}},[a("el-input",{model:{value:e.form.spec,callback:function(t){e.$set(e.form,"spec",t)},expression:"form.spec"}})],1)],1),a("el-col",{attrs:{span:6}},[a("el-form-item",{attrs:{label:"品牌"}},[a("el-input",{model:{value:e.form.brand,callback:function(t){e.$set(e.form,"brand",t)},expression:"form.brand"}})],1)],1),a("el-col",{attrs:{span:6}},[a("el-form-item",{attrs:{label:"单位"}},[a("el-input",{model:{value:e.form.unit,callback:function(t){e.$set(e.form,"unit",t)},expression:"form.unit"}})],1)],1),a("el-col",{attrs:{span:6,offset:6}},[a("el-form-item",{attrs:{label:"上次报价"}},[a("el-input",{model:{value:e.form.last_offer,callback:function(t){e.$set(e.form,"last_offer",t)},expression:"form.last_offer"}})],1)],1),a("el-col",{attrs:{span:6}},[a("el-form-item",{attrs:{label:"本次报价"}},[a("el-input",{model:{value:e.form.current_offer,callback:function(t){e.$set(e.form,"current_offer",t)},expression:"form.current_offer"}})],1)],1),a("el-col",{attrs:{span:6}},[a("el-form-item",{attrs:{label:"核定报价"}},[a("el-input",{model:{value:e.form.final_offer,callback:function(t){e.$set(e.form,"final_offer",t)},expression:"form.final_offer"}})],1)],1),a("el-col",{attrs:{span:18,offset:6}},[a("el-form-item",{attrs:{label:"质量承诺"}},[a("el-input",{attrs:{type:"textarea"},model:{value:e.form.quality,callback:function(t){e.$set(e.form,"quality",t)},expression:"form.quality"}})],1)],1),a("el-col",{attrs:{span:18,offset:6}},[a("el-form-item",{attrs:{label:"水果图片"}},[a("el-upload",{attrs:{action:e.picture_url,"file-list":e.fileList,"list-type":"picture-card","on-success":e.handleAvatarSuccess,"on-preview":e.handlePictureCardPreview,headers:e.picture_headers,data:e.picture_parent,"on-remove":e.handleRemove}},[a("i",{staticClass:"el-icon-plus"})]),a("el-dialog",{attrs:{visible:e.dialogVisible},on:{"update:visible":function(t){e.dialogVisible=t}}},[a("img",{attrs:{width:"100%",src:e.dialogImageUrl,alt:""}})])],1)],1),a("el-col",{staticStyle:{"text-align":"center"},attrs:{span:24}},[a("el-button",{on:{click:e.submitContent}},[e._v("提 交")])],1)],1)],1)},p=[],h=(a("7f7f"),{name:"Content",components:{},data:function(){return{loading:!0,options:[],categoryId:"",form:{c_id:"",spec:"",brand:"",unit:"",last_offer:"",current_offer:"",final_offer:""},picture_url:"http://mcb.mike-co.top/api/admin/fruits/uploadPicture",picture_headers:{Authorization:"Bearer "+sessionStorage.getItem("authKey")},picture_parent:{id:0,cid:0},dialogImageUrl:"",dialogVisible:!1,fileList:[],tmpFileList:[]}},methods:{getCategory:function(){this.$ajax({method:"get",url:"/admin/fruits/category"}).then(function(e){this.options=e.data,this.loading=!1}.bind(this))},handleRemove:function(e){this.$ajax({method:"post",url:"/admin/fruits/deletePicture",data:{id:e.response.data.id}}).then(function(e){this.$message({message:e.data.message,type:e.data.status})}.bind(this))},handlePictureCardPreview:function(e){this.dialogImageUrl=e.url,this.dialogVisible=!0},handleAvatarSuccess:function(e,t){var a={};a.name=t.name,a.url=t.response.data.url,this.tmpFileList.push(a)},selectCategory:function(e){this.loading=!0,this.$ajax({method:"post",url:"/admin/fruits/detail",data:{categoryId:e[e.length-1]}}).then(function(e){this.$message({message:e.data.message,type:e.data.status}),"success"==e.data.status&&(this.form=e.data.data,e.data.data.id?this.picture_parent.id=e.data.data.id:(this.picture_parent.id=0,this.picture_parent.cid=e.data.data.c_id),e.data.data.pictrue_list?this.fileList=e.data.data.pictrue_list:this.fileList=[]),this.loading=!1}.bind(this))},submitContent:function(){this.$ajax({method:"post",url:"/admin/fruits/saveDetail",data:this.form}).then(function(e){this.$message({message:e.data.message,type:e.data.status})}.bind(this))}},mounted:function(){this.getCategory()}}),g=h,v=Object(d["a"])(g,m,p,!1,null,null,null),b=v.exports,y={name:"Index",components:{category:f,contents:b},data:function(){return{currentModel:"category"}},methods:{handleSelect:function(e){this.currentModel=e}}},x=y,_=(a("7c0f"),Object(d["a"])(x,n,i,!1,null,null,null));t["default"]=_.exports},cd1c:function(e,t,a){var n=a("e853");e.exports=function(e,t){return new(n(e))(t)}},e853:function(e,t,a){var n=a("d3f4"),i=a("1169"),r=a("2b4c")("species");e.exports=function(e){var t;return i(e)&&(t=e.constructor,"function"!=typeof t||t!==Array&&!i(t.prototype)||(t=void 0),n(t)&&(t=t[r],null===t&&(t=void 0))),void 0===t?Array:t}}}]);
//# sourceMappingURL=chunk-527401d6.98e47de2.js.map