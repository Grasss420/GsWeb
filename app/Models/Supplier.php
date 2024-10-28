<?php

namespace Grassstation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 
        'contact_person', 
        'phone', 
        'email',
        'address',
        'license_id'
    ];

    public function productInvs()
    {
        return $this->hasMany(ProductInv::class);
    }
}
