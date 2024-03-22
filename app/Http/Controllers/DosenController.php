<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDosenRequest;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class DosenController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $dsn = Dosen::all();
    if ($request->ajax()) {
      return DataTables::of($dsn)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          $btn = '<a href="' . route('dosen.show', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Show" class="show btn btn-info btn-sm showStory"><i class="fas fa-eye fa-xs"></i></a>';
          $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editStory"><i class="far fa-edit fa-xs"></i></a>';
          $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteStory"><i class="fas fa-trash fa-xs"></i></a>';
          return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    return view('dosen.index', compact('dsn'));
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

    $validated = $request->validate([
      'name' => 'required',
      'no_tlp' => 'required|string|max:15',
      'alamat' => 'required|string|max:255',
      'gender' => 'required',
      'image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
      'email' => '',
    ]);

    if ($request->hasFile('image')) {
      $filePath = Storage::disk('public')->put('images/dosen-images', $request->file('image'));
      $validated['image'] = $filePath;
    }

    Dosen::updateOrcreate(
      [
        'id' =>$request->id,
        'nip' => $request->nip,
      ],

      $validated

    );

    return response()->json(['success' => 'Data berhasil disimpan.'], 200);
  }

  /**
   * Display the specified resource.
   */
  public function show(Dosen $dosen)
  {
//    $data = Dosen::findOrFail($id);
    return view('dosen.show', [
      'dsn' => $dosen
    ]);
//    return response()->json($data);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $data = Dosen::find($id);

    return response()->json($data);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateDosenRequest $request, Dosen $dosen)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    Dosen::find($id)->delete();
    return response()->json(['success' => 'Data berhasil dihapus.'], 200);
  }
}
