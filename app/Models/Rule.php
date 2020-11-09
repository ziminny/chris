<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $fillable = ['permission','user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPermissionAttribute($value)
    {
        if($value === 'admin')
            return "Administrador";
        if($value === 'salesman')
            return "Vendedor";
        if($value === 'inactive')
            return "Inativo";          
            return "";
    }


}
