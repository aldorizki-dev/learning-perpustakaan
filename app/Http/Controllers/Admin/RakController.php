<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RakController extends Controller
{
    //
    public function index()
    {
        $rak = Rak::get();

        $list = [
            'rak' => $rak
        ];

        return view('admin.rak.index', $list);
    }

    public function create() {
        return view('admin.rak.create');
    }

    public function store(Request $request) {
        try {
            DB::beginTransaction();

            $validateData = $request->validate([
                'nama_rak' => 'required',
            ]);

            Rak::create([
                'nama_rak' => $validateData['nama_rak'],
            ]);

            DB::commit();
            return redirect()->route('admin.daftar-rak')->with('success','Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function edit($id) {
        $data = Rak::find($id);

        $list = [
            'rak' => $data
        ];

        return view('admin.rak.edit', $list);
    }

    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();

            $validateData = $request->validate([
                'nama_rak' => 'required',
            ]);

            Rak::where('id', $id)->update([
                'nama_rak' => $validateData['nama_rak'],
            ]);

            DB::commit();
            return redirect()->route('admin.daftar-rak')->with('success','Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            DB::beginTransaction();

            $rak = Rak::find($id);
            $rak->delete();

            DB::commit();
            return redirect()->route('admin.daftar-rak')->with('success','Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
