<?php

namespace App\Models\Text;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Text extends Model
{
    use HasFactory;

    protected $table = 'texts';
    
    protected  $guarded =[];
}
