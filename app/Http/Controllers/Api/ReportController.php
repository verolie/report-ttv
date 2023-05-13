<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
        //
        public function getAll(){
            $report = new Report;
            return response()->json($report->getAll());
        }
    
        public function store(Request $request){
            $resp['status'] = true;
            $resp['message'] = 'Insert Data Berhasil';
    
            $patient_id = $request['patient_id'];
            $tekanan_darah = $request['tekanan_darah'];
            $denyut_nadi = $request['denyut_nadi'];
            $laju_pernapasan = $request['laju_pernapasan'];
            $suhu_tubuh = $request['suhu_tubuh'];

            try{
                $report = new Report;
                $report->patient_id = $patient_id;
                $report->tekanan_darah = $tekanan_darah;
                $report->denyut_nadi = $denyut_nadi;
                $report->laju_pernapasan = $laju_pernapasan;
                $report->suhu_tubuh = $suhu_tubuh;
                $report->save();
            } catch(Exception $e) {
                $resp['status'] = false;
                $resp['message'] = $e;
            }
            return response()->json($resp);
        }
    
        public function getReport(Request $request){
            $report = new Report;
            return $report->getByName($request['name']);
        }
    
        public function delete(Request $request){
            $resp['status'] = true;
            $resp['message'] = 'Delete Report Berhasil';
    
            $report = Report::where('id', $request['id'])->delete();
            if(!$report){
                $resp['status'] = false;
                $resp['message'] = 'Delete Report Gagal';
            }
            return response()->json($resp);
        }
    
        public function edit(Request $request){
            $resp['status'] = true;
            $resp['message'] = 'Update Data Berhasil';
    
            $patient_id = $request['patient_id'];
            $tekanan_darah = $request['tekanan_darah'];
            $denyut_nadi = $request['denyut_nadi'];
            $laju_pernapasan = $request['laju_pernapasan'];
            $suhu_tubuh = $request['suhu_tubuh'];

            try{
                $report = Report::where('id', $request['id'])->first();
                $report->patient_id = $patient_id;
                $report->tekanan_darah = $tekanan_darah;
                $report->denyut_nadi = $denyut_nadi;
                $report->laju_pernapasan = $laju_pernapasan;
                $report->suhu_tubuh = $suhu_tubuh;
                $report->save();
            } catch(Exception $e) {
                $resp['status'] = false;
                $resp['message'] = $e;
            }
            return response()->json($resp);
        }
}
