<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $table = 'inspections';
    protected $fillable = ['location', 'start_date', 'findings', 'picture', 'pca', 'accountibility', 'closing_date', 'status', 
    'approvedBy_hygiene', 'approvedBy_siteman', 'approvedBy_opman', 'approvedBy_sropman',  'user_id'];

    public function sitemanager(){
        return $this->belongsTo('App\Models\SiteManager');
    }
}
