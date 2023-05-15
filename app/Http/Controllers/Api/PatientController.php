<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    //
    public function getAll(){
        $patient = Patient::get();
        return response()->json($patient);
    }

    public function store(Request $request){
        $resp['status'] = true;
        $resp['message'] = 'Insert Data Berhasil';

        $name = $request['name'];
        $age = $request['age'];
        $height = $request['height'];
        $weight = $request['weight'];
        try{
            $patient = new Patient;
            $patient->name = $name;
            $patient->age = $age;
            $patient->height = $height;
            $patient->weight = $weight;
            $patient->save();
            $resp['data'] = $patient;
        } catch(Exception $e) {
            $resp['status'] = false;
            $resp['message'] = $e;
        }
        return response()->json($resp);
    }

    public function getPatient(Request $request){
        $patient = new Patient;
        return $patient->getByName($request['name']);
    }

    public function delete(Request $request){
        $resp['status'] = true;
        $resp['message'] = 'Delete Pasien Berhasil';

        $patient = Patient::where('id', $request['id'])->delete();
        if(!$patient){
            $resp['status'] = false;
            $resp['message'] = 'Delete Pasien Gagal';
        }
        return response()->json($resp);
    }

    public function edit(Request $request){
        $resp['status'] = true;
        $resp['message'] = 'Update Data Berhasil';

        $name = $request['name'];
        $age = $request['age'];
        $height = $request['height'];
        $weight = $request['weight'];
        try{
            $patient = Patient::where('id', $request['id'])->first();
            $patient->name = $name;
            $patient->age = $age;
            $patient->height = $height;
            $patient->weight = $weight;
            $patient->save();
            $resp['data'] = $patient;
        } catch(Exception $e) {
            $resp['status'] = false;
            $resp['message'] = $e;
        }
        return response()->json($resp);
    }
}
