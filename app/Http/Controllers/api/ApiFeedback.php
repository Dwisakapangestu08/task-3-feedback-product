<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiFeedback extends Controller
{

    public function index()
    {
        $data = Feedback::all();
        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Data tidak ditemukan',
        ], 400);
    }

    public function input_feedback(Request $request)
    {
        $validasi = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'comments' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'comments.required' => 'Komentar harus diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validasi->errors()->first(),
            ], 400);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'comments' => $request->comments,
        ];

        $save = Feedback::create($data);

        if ($save) {
            return response()->json([
                'status' => 'success',
                'message' => 'Feedback berhasil dikirim',
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Feedback gagal dikirim',
        ], 400);
    }
}
