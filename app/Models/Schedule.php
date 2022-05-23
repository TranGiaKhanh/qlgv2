<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $fillable = [ 'class_id', 'date', 'lesson', 'value', 'user_id'];
    public function classes()
    {
        return $this->hasMany(Classes::class, "id");
    }
    public function user()
    {
        return $this->hasMany(User::class,  'id');
    }
}
