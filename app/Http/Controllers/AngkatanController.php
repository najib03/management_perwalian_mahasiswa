<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAngkatanRequest;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AngkatanController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $req)
  {
    $angkatan = Angkatan::all();
    if ($req->ajax()) {
      return Datatables::of($angkatan)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Show" class="show btn btn-info btn-sm showStory"><i class="fas fa-eye fa-xs"></i></a>';
          $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editStory"><i class="far fa-edit fa-xs"></i></a>';
          $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteStory"><i class="fas fa-trash fa-xs"></i></a>';
          return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    return view('master-data.angkatan.index', compact('angkatan'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate(
      [
        'thn_angkatan' => 'required',
      ]);

    $existingAngkatan = Angkatan::where('thn_angkatan', $request->thn_angkatan)->first();
    if ($existingAngkatan) {
      return response()->json(['error' => 'Tahun angkatan sudah ada.'], 422);
    }

    Angkatan::updateOrCreate(
      [
        'id' => $request->id
      ],
      $data
    );
    return response()->json(['success' => 'Data berhasil disimpan.'], 200);
  }

  /**
   * Display the specified resource.
   */
  public function show(Angkatan $angkatan)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $data = Angkatan::find($id);
    return response()->json($data);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateAngkatanRequest $request, Angkatan $angkatan)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    Angkatan::find($id)->delete();
    return response()->json(['success' => 'Data berhasil dihapus.'], 200);
  }
}
