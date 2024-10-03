<?php

namespace Grassstation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInvLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_inv_id',    // Links to ProductInv
        'action_type',       // Sale, Restock, Adjustment, etc.
        'quantity',          // Positive for adding stock, negative for reducing stock (with 2 decimal places)
        'transaction_id',    // Links to sale or restock reference, optional
        'description',       // Optional field for detailed description
    ];

    protected $casts = [
        'quantity' => 'decimal:2', // Ensure 2 decimal points for precision
    ];

    public function productInv()
    {
        return $this->belongsTo(ProductInv::class);
    }
    
}
