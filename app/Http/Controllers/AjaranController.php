<?php

namespace App\Http\Controllers;

use App\Models\Ajaran;
use App\Http\Requests\StoreAjaranRequest;
use App\Http\Requests\UpdateAjaranRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ajaran = Ajaran::all();
        if ($request->ajax()) {
            return Datatables::of($ajaran)
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
        return view('master-data.ajaran.index', compact('ajaran'));
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
        'nama' => 'required',
      ]);

    $existing = Ajaran::where('nama', $request->nama)->first();
    if ($existing) {
      return response()->json(['error' => 'Tahun angkatan sudah ada.'], 422);
    }

    Ajaran::updateOrCreate(
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
    public function show(Ajaran $ajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $data = Ajaran::find($id);
      return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAjaranRequest $request, Ajaran $ajaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
  {
    Ajaran::find($id)->delete();
    return response()->json(['success' => 'Data berhasil dihapus.'], 200);
  }
}
