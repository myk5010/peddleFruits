<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class UploadPicture extends Model
{
    protected $table = 'upload_picture';

    // 是否自动维护时间戳
    public $timestamps = false;
}
