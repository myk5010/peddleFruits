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

    public function saveDetail()
    {
        
    }

    // 上传图片
    public function uploadPicture()
    {
        $photo = request('file');
        if ($photo && $photo->isValid()) {
            $destinationPath = storage_path('app/public/photos/' . $parentCafe->id);

            // 如果目标目录不存在，则创建之
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath);
            }

            // 文件名
            $filename = time() . '-' . $photo->getClientOriginalName();
            // 保存文件到目标目录
            $photo->move($destinationPath, $filename);

            // 在数据库中创建新纪录保存刚刚上传的文件
            $cafePhoto = new CafePhoto();

            $cafePhoto->cafe_id = $parentCafe->id;
            $cafePhoto->uploaded_by = Auth::user()->id;
            $cafePhoto->file_url = $destinationPath . DIRECTORY_SEPARATOR . $filename;

            $cafePhoto->save();
        }
    }
}
