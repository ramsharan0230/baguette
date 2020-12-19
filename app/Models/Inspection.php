<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $table = 'inspections';
    protected $fillable = ['location', 'start_date', 'findings', 'picture', 'pca', 'accountibility', 'closing_date', 'remarks', 'status', 'user_id'];
}
