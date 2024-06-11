<?php

namespace App\Models;

// app/Models/Cart.php

use Illuminate\Database\Eloquent\Model;

// app/Models/Cart.php

class Cart extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    
}
