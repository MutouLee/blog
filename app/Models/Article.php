<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	use HasDateTimeFormatter;

    protected $dateFormat = 'Y-m-d H:i';


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeOfCategory(Builder $query, $category_id = null): Builder
    {
        return $query->when($category_id, function (Builder $query) use ($category_id) {
            return $query->where('category_id', $category_id)->orderByDesc('stick')->orderByDesc('created_at');
        });
    }
}
