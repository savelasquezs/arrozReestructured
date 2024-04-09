<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    public function expense_item()
    {
        return $this->belongsTo(ExpenseItem::class);
    }
    public function bank()
    {
        return $this->belongsTo(Entity::class);
    }
}
