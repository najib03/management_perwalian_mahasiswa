<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SemesterController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $req)
  {
    $semester = Semester::all();
    if ($req->ajax()) {
      return DataTables::of($semester)
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
    return view('master-data.semester.index', compact('semester'));
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
        'nama_semester' => 'required',
      ]
    );

    $existingAngkatan = Semester::where('nama_semester', $request->nama_semester)->first();
    if ($existingAngkatan) {
      return response()->json(['error' => 'Nama semester sudah ada.'], 422);
    }

    Semester::updateOrCreate(
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
  public function show(Semester $semester)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $data = Semester::find($id);
    return response()->json($data);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateSemesterRequest $request, Semester $semester)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    Semester::find($id)->delete();
    return response()->json(['success' => 'Data berhasil dihapus.'], 200);
  }
}
