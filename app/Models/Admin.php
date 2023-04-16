<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory;
    use HasRoles;

    protected $fillable = ['name','email','password', 'status', 'image', 'admin_id'];

    protected $hidden   = ['password'];

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? asset('storage/' . $this->image) : asset('admin_assets/images/default.png'),
        );

    }//end of get ImagePath Attribute

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id');

    }//end of admin

    public function partners()
    {
        return $this->hasMany(Slider::class, 'admin_id');

    }//end of admin

}//end of model