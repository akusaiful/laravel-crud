<?php

namespace App\Models;

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
}
