<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;
use App\Traits\UuidTrait;

class AttributeOption extends Model
{
    use HasFactory,UuidTrait;
    
    public $incrementing = false;
    
    protected $keyType = "string";
    
    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'shop_attribute_options';
    protected $fillable = [
        'atrribute_id','slug','name',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\AttributeOptionFactory::new();
    }
}
