<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class)->withSum('entries as task_hours', 'hours')->where('status_id', 1)->whereHas('entries');
    }
   

}
