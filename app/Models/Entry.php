<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function task()
    {
        return $this->belongsTo(Task::class)->with('project');
    }
}
