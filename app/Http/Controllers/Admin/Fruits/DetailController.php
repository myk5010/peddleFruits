<?php

namespace App\Http\Controllers\Admin\Fruits;

use App\Http\Controllers\Controller;
use App\Models\Fruits\Detail;
use App\Models\Common\UploadPicture;
use function GuzzleHttp\json_decode;

class DetailController extends Controller
{   

    // 获取分类下商品详情
    public function getDetail()
    {
        $categoryId = request('categoryId');
        // $categoryId = end($categoryId);
        $detailModel = new Detail();
        $res = $detailModel->where('c_id', '=', $categoryId)->with('pictrueList')->get();
        if ($res) {
            // 如果该分类下没有详情
            if (count($res) == 0) {
                return response()->json(['status' => 'success', 'message' => '获取成功', 'data' => ['c_id'=>$categoryId]]);
            } else {
                return response()->json(['status' => 'success', 'message' => '获取成功', 'data' => $res[0]]);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => '获取失败']);
        }
    }

    // 保存详情
    public function saveDetail()
    {
        $params = request()->all();
        // 处理图片
        // $pictureList = json_decode($params['picture_address']);
        // if (count($pictureList)>0) {
        //     $path = storage_path('app/public/fruits');
        //     $newPath = base_path('public/upload/pictures/fruits');
        //     $insertData = [];
        //     foreach ($pictureList as $key => $item) {
        //         if (!is_dir($newPath.'/'.$params['id'])) {
        //             mkdir($newPath.'/'.$params['id']);
        //         }
        //         copy($path.'/'.$item->url, $newPath.'/'.$params['id'].'/'.$item->url); //拷贝到新目录
        //         unlink($path.'/'.$item->url); //删除旧目录下的文件
        //         $insertData[$key]['name'] = $item->name;
        //         $insertData[$key]['url'] = 'public/upload/pictures/fruits'.$item->url;
        //         $insertData[$key]['parent_id'] = $params['id'];
        //     }
        //     $res = UploadPicture::insert($insertData);
        //     if (!$res) {
        //         return response()->json(['status' => 'success', 'message' => '图片保存失败']);
        //     }
        //     unset($params['picture_address']);
        // }
        $detailModel = new Detail();
        // 确认分类下有没详情
        $contentId = $detailModel->where('c_id', '=', $params['c_id'])->get();
        // 过滤非数据库字段
        $data = $detailModel->fill($params);
        $data = json_decode($data, true);
        if (count($contentId) > 0) {
            // 更新详情
            $res = $detailModel->where('id',$contentId[0]['id'])->update((array)$data);
        } else {
            // 保存详情
            $res = $detailModel->insert($data);
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
        $id = request('id');
        $cid = request('cid');
        // if ($cid == 0) {
        //     return response()->json(['status' => 'error', 'message' => '请先选择水果分类再上传图片']);
        // }
        $url_path = base_path('public/upload/pictures/fruits').'/'.$id;
        $rule = ['jpg', 'png', 'gif'];
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();
            $entension = $file->getClientOriginalExtension();
            if (!in_array($entension, $rule)) {
                return response()->json(['status' => 'error', 'message' => '图片上传格式需要为jpg,png,gif']);
            }
            if (!is_dir($url_path)) {
                mkdir($url_path);
            }
            $newName = md5(date("Y-m-d H:i:s") . $clientName) . "." . $entension;
            $file->move($url_path, $newName);
            // 写入数据库
            $insertData = [];
            $insertData['name'] = $clientName;
            $insertData['url'] = 'upload/pictures/fruits/'.$id.'/'.$newName;
            if ($id == 0){
                // 如果父级没有详情, 先写入一条父级
                $insertData['parent_id'] = Detail::insertGetId(['c_id'=>$cid]);
            } else {
                $insertData['parent_id'] = $id;
            }
            $resId = UploadPicture::insertGetId($insertData);
            if ($resId) {
                return response()->json(['status' => 'success', 'message' => '上传成功', 'data' => ['url'=>$newName,'id'=>$resId]]);
            } else {
                return response()->json(['status' => 'error', 'message' => '上传失败']);
            }
        }
    }

    // 删除图片
    public function deletePicture()
    {
        $params = request()->all();
        $res = UploadPicture::where('id',$params['id'])->delete();
        if ($res) {
            return response()->json(['status' => 'success', 'message' => '删除成功']);
        } else {
            return response()->json(['status' => 'error', 'message' => '删除失败']);
        }
    }
}
