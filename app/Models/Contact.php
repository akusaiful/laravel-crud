<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'department_id'];

    protected $dates = ['delete_timestamp'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function deleteBy()
    {
        return $this->belongsTo(User::class, 'delete_user_id');
    }

    /**
     * Scope untuk dapatkan rekod yang belum dihapuskan 
     * berdasarkan kepada column 'is_deleted'
     */
    public function scopeActive(Builder $query)
    {
        return $query->whereIsDeleted(false);
    }

    public function scopeRecycle(Builder $query)
    {
        return $query->whereIsDeleted(true);
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

    public function getActiveIcon()
    {
        $icon = $this->active ? 'done' : 'close';
        return asset("assets/img/$icon.png");
    }

    public function getTrashIcon()
    {
        $icon = $this->is_deleted ? 'trash' : 'trash_clean';
        return asset("assets/img/$icon.png");
    }

    public function getDepartment()
    {
        if($this->department)
        return $this->department->name;

        return '(SYS) Department not found. Please move user to other department.';
    }
}
