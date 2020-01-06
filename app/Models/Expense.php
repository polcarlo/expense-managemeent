<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
            'expense_category_id',
            'amount',
            'entry_date',
     ];
}
