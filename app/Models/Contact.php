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
        if ($filterDepartment = request()->filter_department) {
            $query->where('department_id', '=', $filterDepartment);
        }

        // next query untuk search freetext
        if ($querytext = request()->querytext) {
            $query->where('name', 'like', "%$querytext%");
        }

        // chaining method so kita mesti queryBuilder
        return $query;
    }
}
