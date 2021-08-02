<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inspection;

class Remark extends Model
{
    use HasFactory;

    protected $table = 'remarks';
    protected $fillable = ['inspection_id', 'remarks', 'user_id', 'status'];

    public function inspection(){
        return $this->belongsTo(Inspection::class);
    }
}
