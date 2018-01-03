<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable= [
      'id', 'name', 'description'
    ];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
      # code...
      return $this->belongsTo(User::class);
    }
}
