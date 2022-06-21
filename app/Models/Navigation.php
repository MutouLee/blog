<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Query\Builder;

class Navigation extends Model
{
    use HasDateTimeFormatter, ModelTree;

    protected $table = 'navigation';

    protected $fillable = ['parent_id', 'order', 'title', 'icon', 'uri', 'show'];


}
