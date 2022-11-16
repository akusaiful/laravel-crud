<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email'];

    // istihar hubungan yang sah antara deparment dan contact
    // 1 department boleh mempunyai lebih dari 1 contact
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /** 
     * mesti guna keyword 'scope' baru jd scope
     * guna dia untuk chain command bagi mengelakkan redundant code
     * dan untuk jadikan controller lebih clean    
     */
    public function scopeFilter(Builder $query)
    {
        $querytext = request()->querytext;
        return $query->where('name', 'like', "%$querytext%")
            ->orWhere('phone', 'like', "%$querytext%")
            ->orWhere('email', 'like', "%$querytext%");
    }
}
