<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Models\API\Barang;
use App\Models\StockAwal;
use App\Traits\Stock;
use Illuminate\Http\Request;

class StockAwalController extends Controller
{
    use Stock;
    
    public function index()
    {
        $data   = StockAwal::query()->paginate(10);
        $total  = StockAwal::count();
        $barang = Barang::all();
        return view('other.stock-awal.index', compact('data', 'total', 'barang'));
    }

    public function store(Request $request)
    {
        StockAwal::create([
            'nama_barang'            => $request->nama_barang,
            'no_lot'                 => $request->no_lot,
            'nama_barang_dan_no_lot' => $request->nama_barang . " // " . $request->no_lot,
            'qty'                    => $request->qty
        ]);

        // Update Persediaan Dagang
        $this->_addStock($request->nama_barang, $request->no_lot, $request->qty);
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan');
    }

    public function update(Request $request, StockAwal $stock_awal)
    {
        $stock_awal->update([
            'no_lot'                  => $request->no_lot,
            'nama_barang_dan_no_lot'  => $request->nama_barang . " // " . $request->no_lot,
            'qty'                     => $request->qty
        ]);
        return redirect()->back()->with('success', 'Barang berhasil diupdate');
    }

    public function destroy(StockAwal $stock_awal)
    {
        $stock_awal->delete();
        return redirect()->back()->with('delete', 'Barang berhasil dihapus');
    }
}
