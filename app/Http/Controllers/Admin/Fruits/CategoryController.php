<?php

namespace App\Http\Controllers\Admin\Fruits;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fruits\Category;

class CategoryController extends Controller
{
    public function getCategory() {
        $category = Category::all();
        $res = [];
        foreach($category as $key=>$item){
            if($item['lv'] == 1){
                $tmp = [];
                foreach($category as $k=>$i){
                    if($i['lv']==2 && $i['pid']==$item['id']){
                        $tmp[] = $i;
                    }
                    $category[$key]['children'] = $tmp;
                }
                $res[] = $category[$key];
            }
        }
        return response()->json($res);
    }
}
