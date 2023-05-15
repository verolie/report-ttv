<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'ttv-report';
    protected $primaryKey = 'id';

    protected $fillable = ['patient_id', 'tekanan_darah', 'denyut_nadi', 'laju_pernapasan', 'suhu_tubuh'];

    protected $CREATED_AT = 'created_at';
    protected $UPDATED_AT = 'created_at';

    function getByName($name){
        return $this->join('patient','patient.id', 'ttv-report.patient_id')
                    ->where('patient.name', $name)
                    ->select('patient.name', 'ttv-report.*')->get();
    }

    function getAll(){
        return $this->join('patient','patient.id', 'ttv-report.patient_id')
                    ->select('patient.name', 'ttv-report.*')->get();
    }

    function getByIdName($id){
        return $this->join('patient','patient.id', 'ttv-report.patient_id')
                    ->where('patient.id', "=" , $id)
                    ->select('patient.name')->first();
    }
}
