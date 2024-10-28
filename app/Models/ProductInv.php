<?php

namespace Grassstation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package Grassstation
 * @subpackage Inventory
 * @author  MoNolidThZ - SPKZ Design Co. <admin@monolidthz.com>
 * @version 1.0.0
 * @since 1.1.1 (2024-09-11)
 */
class ProductInv extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',       // Links to Product
        'supplier_id',      // Links to Supplier
        'stock_count',      // Available stock count
        'price',            // Price for this supplier
        'batch_number',     // Optional, if you need to track batches
        'status',           // Available, out of stock, etc.
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}