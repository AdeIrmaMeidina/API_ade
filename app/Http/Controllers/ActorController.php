<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index(){
        $actor = Actor::latest()->get();
        $response = [
            'success' => true,
            'message' => 'Daftar Actor',
            'data' =>$actor,
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $actor = new Actor();
        $actor->nama_actor = $request->nama_actor;
        $actor->bio = $request->bio;
        $actor->save();
        return response()->json([
            'success' => true,
            'message' =>'data berhasil disimpan',
        ], 201);
    }

    public function show($id)
    {
        $actor = Actor::find($id);
        if ($actor) {
            return response()->json([
                'success' => true,
                'message' => 'detail actor',
                'data' => $actor,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $actor = Actor::find($id);
        if ($actor) {
        $actor->nama_actor = $request->nama_actor;
        $actor->bio = $request->bio;
        $actor->save();
        return response()->json([
            'success' => true,
            'message' =>'data berhasil diperbarui',
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'data tidak ditemukan',
        ], 404);
    }

    }

    public function destroy($id)
    {
        $actor = Actor::find($id);
        if ($actor) {
            $actor->delete();
            return response()->json([
                'success' =>true,
                'message' => 'data' . $actor->nama_actor . 'berhasil dihapus',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
