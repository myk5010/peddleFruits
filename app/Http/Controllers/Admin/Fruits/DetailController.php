<?php

namespace App\Http\Controllers\Admin\Fruits;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fruits\Detail;

class DetailController extends Controller
{   

    public $url_path = '';  // 图片暂存storage - 定期清理缓存

    // 获取分类下商品详情
    public function getDetail()
    {
        $categoryId = request('categoryId');
        // $categoryId = end($categoryId);
        $detailModel = new Detail();
        $res = $detailModel->where('c_id', '=', $categoryId)->get();
        if ($res) {
            // 如果该分类下没有详情
            if (count($res) == 0) {
                return response()->json(['status' => 'success', 'message' => '获取成功', 'content' => ['c_id'=>$categoryId]]);
            } else {
                return response()->json(['status' => 'success', 'message' => '获取成功', 'content' => $res[0]]);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => '获取失败']);
        }
    }

    // 保存详情
    public function saveDetail()
    {
        $params = request()->all();
        $detailModel = new Detail();
        // 确认分类下有没详情
        $contentId = $detailModel->where('c_id', '=', $params['c_id'])->get();
        if (count($contentId) > 0) {
            // 更新详情
            $res = $detailModel->where('id', $params['id'])->update($params);
        } else {
            // 保存详情
            $res = $detailModel->insert($params);
        }
        if ($res) {
            return response()->json(['status' => 'success', 'message' => '保存成功']);
        } else {
            return response()->json(['status' => 'error', 'message' => '保存失败']);
        }
    }

    // 上传图片
    public function uploadPicture()
    {
        $file = request('file');
        $url_path = $this->url_path = storage_path('app/public/fruits');
        $rule = ['jpg', 'png', 'gif'];
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();
            // $tmpName = $file->getFileName();
            // $realPath = $file->getRealPath();
            $entension = $file->getClientOriginalExtension();
            if (!in_array($entension, $rule)) {
                return '图片格式为jpg,png,gif';
            }
            $newName = md5(date("Y-m-d H:i:s") . $clientName) . "." . $entension;
            $file->move($url_path, $newName);
            // $namePath = $url_path . '/' . $newName;
            return response()->json(['status' => 'success', 'message' => '上传成功', 'data' => $newName]);;
        }
    }
}
