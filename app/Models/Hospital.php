<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
    public function users()
    {
      return $this->belongsToMany(User::class);
    }
    public function previews()
    {
      return $this->hasMany(Preview::class);
    }
    public function suggestions()
    {
      return $this->morphToMany(Suggestion::class,'suggestionable');
    }
}
