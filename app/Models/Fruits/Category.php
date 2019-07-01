<?php

namespace App\Models\Fruits;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // 指定模型-数据表
    protected $table = 'fruits_categories';
    // 指示模型是否自动维护时间戳
    public $timestamps = false;
}
