<?php

namespace App\Models\Fruits;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'fruits_details';

    // 是否自动维护时间戳
    public $timestamps = false;
}
