<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    //
    public function index()
    {

        $buku = Buku::with('rak')->get();

        $list = [
            'buku' => $buku
        ];

        return view('admin.buku.index', $list);
    }

    public function create() {
        $rak = Rak::get();

        $list = [
            'rak' => $rak
        ];

        return view('admin.buku.create', $list);
    }

    public function store(Request $request) {
        try {
            DB::beginTransaction();

            $validateData = $request->validate([
                'rak_id' => 'required',
                'judul_buku' => 'required',
            ]);

            Buku::create([
                'judul_buku' => $validateData['judul_buku'],
                'rak_id' => $validateData['rak_id'],
            ]);

            DB::commit();
            return redirect()->route('admin.daftar-buku')->with('success','Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function edit($id) {

        $data = Buku::find($id);
        $rak = Rak::get();


        $list = [
            'buku' => $data,
            'rak' => $rak
        ];

        return view('admin.buku.edit', $list);
    }

   public function update(Request $request, $id) {
        try {
            DB::beginTransaction();

            $validateData = $request->validate([
                'judul_buku' => 'required',
                'rak_id' => 'required',
            ]);

            Buku::where('id', $id)->update([
                'judul_buku' => $validateData['judul_buku'],
                'rak_id' => $validateData['rak_id'],
            ]);

            DB::commit();
            return redirect()->route('admin.daftar-buku')->with('success','Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            DB::beginTransaction();

            $buku = Buku::find($id);
            $buku->delete();

            DB::commit();
            return redirect()->route('admin.daftar-buku')->with('success','Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
