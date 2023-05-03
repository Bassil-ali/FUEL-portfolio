<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Builder;

class SuccessPartner extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    protected $fillable  = ['title','description','status', 'image', 'admin_id'];

    public $translatable = ['title', 'description'];

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? asset('storage/' . $this->image) : asset('admin_assets/images/default.png'),
        );

    }//end of get ImagePath Attribute

    public function admin()
    {
        return $this->belongsTo(Admin::class);

    }//end of admin

    public function scopeActive(Builder $query): void
    {
        $query;
    }

    // protected static function booted(): void
    // {
    //     if(!request()->routeIs('admin.partners.*')) {
    //        static::addGlobalScope(new StatusScope);
    //     }
    // }

}//end of class