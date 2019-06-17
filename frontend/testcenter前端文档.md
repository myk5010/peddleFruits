## 部署

### 依赖

环境: nodejs

脚手架: vue cli3

<!--注意: node_modules文件过大没有上传git, 第一次运行npm install安装插件-->

### 目录结构

| 文件夹名称                      | 简介                                                         |
| ------------------------------- | ------------------------------------------------------------ |
| frontend                        | 前端总文件                                                   |
| public                          | vue打包后的dist文件夹放到这里, 除初始文件web.config/robots.txt/index.php/index.html其他都可以删除 |
| resources/views/index.blade.php | vue打包后的index.html内容覆盖此文件内容                      |

<!--2019-06-14 新增说明 -- Agnes -- window环境下，package.json的build语句换成vue-cli-service build --no-clean,build后运行start.bat批处理文件-->