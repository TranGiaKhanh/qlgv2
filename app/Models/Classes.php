<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    public $fillable = ['name','department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function scopeName(Request $request)
        {
            if($request->has('keyword'))
            {
                $query->where('name', 'like', '%' . $request-> name . '%');
            }
            return $query;
        }
    public function scopeKhoa(Request $request)
    {
            if($request->has('department_id'))
            {
                $query->where('department_id', $request->department_id);
            }
            return $query;
    }
}
