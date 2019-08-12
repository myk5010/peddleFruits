<?php

namespace App\Models\Fruits;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'fruits_details';

    // 是否自动维护时间戳
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     * @var array
     */
    protected $fillable = [
        'id',
        'c_id',
        'spec',
        'brand',
        'unit',
        'last_offer',
        'current_offer',
        'final_offer',
        'quality',
    ];

    // 关联详情下的图片列表
    public function pictrueList()
    {
        return $this->hasMany('App\Models\Common\UploadPicture', 'parent_id', 'id');
    }
}
