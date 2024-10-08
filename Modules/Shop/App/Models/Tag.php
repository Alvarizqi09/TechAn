<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

use App\Traits\UuidTrait;

class Tag extends Model
{
    use HasFactory,UuidTrait;

    public $incrementing = false;
    
    protected $keyType = "string";
    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'shop_tags';
    protected $fillable = [
        'slug','name',
    ];

    public function products()
    {
        return $this->belongsToMany('Modules\Shop\App\Models\Category','shop_products_tags','product_id','tag_id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\TagFactory::new();
    }
}

