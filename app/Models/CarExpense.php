<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarExpense extends Model
{
    use HasFactory;

    protected $table = 'car_expense';
    protected $fillable = ['expense_id','car_id', 'date', 'amount','distance'];
}
