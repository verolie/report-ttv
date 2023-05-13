<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Patient extends Model
{
    use HasFactory;

    protected $table = 'patient';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'age', 'height', 'weight'];

    protected $CREATED_AT = 'created_at';
    protected $UPDATED_AT = 'created_at';

    function getByName($name){
        return $this->where('name', $name)->get();
    }
}
