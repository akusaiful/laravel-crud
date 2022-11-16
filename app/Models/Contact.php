<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Scope untuk dapatkan rekod yang belum dihapuskan 
     * berdasarkan kepada column 'is_deleted'
     */
    public function scopeActive(Builder $query)
    {
        return $query->whereIsDeleted(false);
    }

    public function scopeFilter(Builder $query)
    {
        $filterDepartment = request()->filter_department;        
        return $query->where('department_id', '=', $filterDepartment);

    }
}
