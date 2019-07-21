<?php

namespace App\Http\Controllers\Admin\Fruits;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fruits\Detail;

class DetailController
{   
    // 获取分类下商品详情
    public function getDetail()
    {
        $categoryId = request('categoryId');
        // $categoryId = end($categoryId);
        $detailModel = new Detail();
        $res = $detailModel->where('c_id', '=', $categoryId)->get();
        if ($res) {
            return response()->json(['status' => 'success', 'message' => '获取成功', 'content' => $res]);
        } else {
            return response()->json(['status' => 'error', 'message' => '获取失败']);
        }
    }

    // 保存详情
    public function saveDetail()
    {
        
    }

    // 上传图片
    public function uploadPicture()
    {
        $file = request('file');
        $url_path = storage_path('app/public/fruits');  // 图片暂存storage - 定期清理缓存
        $rule = ['jpg', 'png', 'gif'];
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();
            $tmpName = $file->getFileName();
            $realPath = $file->getRealPath();
            $entension = $file->getClientOriginalExtension();
            if (!in_array($entension, $rule)) {
                return '图片格式为jpg,png,gif';
            }
            $newName = md5(date("Y-m-d H:i:s") . $clientName) . "." . $entension;
            $path = $file->move($url_path, $newName);
            $namePath = $url_path . '/' . $newName;
            return $path;
        }
    }
}
