<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiDetail;
use PDF;

use App\Exports\TransaksiDetailExport;
use Excel;

class ReportPenjualanController extends Controller
{
    public function index()
    {
        $penjualan = TransaksiDetail::orderBy('created_at', 'DESC')->paginate(10);

        return view('report_penjualan.index', compact('penjualan'));
    }

    public function cetak_pdf()
    {
        $penjualan = TransaksiDetail::orderBy('created_at', 'DESC')->get();

        $pdf = PDF::loadView('report_penjualan.cetak_pdf', compact('penjualan'));

        return $pdf->stream();
    }

    public function cetak_excel()
    {
        $tgl = now();
        return Excel::download(new TransaksiDetailExport, 'transaksi_detail' . $tgl . '.xlsx');
    }
}
