<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Member;
use App\Models\Winner;

class Doorprizes extends Controller
{
    public function register(Request $r){
        $empid = $r->input('employee_id');
        $fname = $r->input('fullname');
        $divisi = $r->input('divisi');
        $dept = $r->input('department');

        try{
            $member = Member::create([
                'employee_id' => $empid,
                'fullname' => $fname,
                'divisi' => $divisi,
                'department' => $dept,
            ]);
            if($member){
                return Response()->json([
                    'status' => true,
                    'message' => "Anda berhasil ditambahkan ke daftar doorprize!"
                ]);
            }
            return Response()->json([
                'status' => false,
                'message' => "Terjadi kesalahan pada server!"
            ]);
        }
        catch(\Exception $e){
            return Response()->json([
                'status' => false,
                'message' => "Anda sudah ada di daftar doorprize"
            ]);
        }
    }

    public function get_member(Request $r){
        $winner = Winner::select('employee_id')->get();
        $empid = [];
        foreach($winner as $item){
            array_push($empid,$item);
        }
        $member = Member::whereNotIn('employee_id',$winner)
                  ->select('id','employee_id','fullname','divisi','department')
                  ->get();
        if($member){
            return Response()->json([
                'status' => true,
                'data' => $member
            ]);
        }
        return Response()->json([
            'status' => false,
            'data' => []
        ]);
    }

    public function get_winner(Request $r){
        $winner = Winner::all();
        if($winner){
            return Response()->json([
                'status' => true,
                'data' => $winner
            ]);
        }
        return Response()->json([
            'status' => false,
            'data' => []
        ]);
    }

    public function create_winner(Request $r){
        $empid = $r->input('employee_id');
        $fname = $r->input('fullname');
        $divisi = $r->input('divisi');
        $dept = $r->input('department');

        try{
            $member = Winner::create([
                'employee_id' => $empid,
                'fullname' => $fname,
                'divisi' => $divisi,
                'department' => $dept,
            ]);
            if($member){
                return Response()->json([
                    'status' => true,
                    'message' => "Anda berhasil ditambahkan ke daftar pemenang!"
                ]);
            }
            return Response()->json([
                'status' => false,
                'message' => "Terjadi kesalahan pada server!"
            ]);
        }
        catch(\Exception $e){
            return Response()->json([
                'status' => false,
                'message' => "Anda sudah ada di daftar pemenang!"
            ]);
        }

    }
}
