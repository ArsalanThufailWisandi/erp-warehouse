<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use App\Models\PengeluaranModel;
use App\Models\ReceiveModel;
use App\Models\SupplierModel;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $menu = 'report';

    public function penerimaan(Request $request)
    {
        if ($request->kode_receive or $request->id_vendor  or $request->start or $request->end or $request->status) {
            $matchThese = [];
            if ($request->kode_receive) {
                $kode_receive = array('kode_receive' => $request->kode_receive);
                array_push($matchThese, $kode_receive);
            } else {
                $kode_receive = array();
            }
            if ($request->id_vendor) {
                $id_vendor = array('id_vendor' => $request->id_vendor);
                array_push($matchThese, $id_vendor);
            } else {
                $id_vendor = array();
            }
            if ($request->status) {
                $status = array('status' => $request->status);
                array_push($matchThese, $status);
            } else {
                $status = array();
            }
            $matchThese = $kode_receive + $id_vendor + $status;
            if ($request->start) {
                $start = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$3-$1-$2", $request->start);
                $end = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$3-$1-$2", $request->end);
                $item = ReceiveModel::whereBetween('tgl_receive', [$start, $end])->where($matchThese)->orderBy('id', 'DESC')->get();
            } else {
                $item = ReceiveModel::where($matchThese)->orderBy('id', 'DESC')->get();
            }
        } else {
            $item = ReceiveModel::orderBy('id', 'DESC')->get();
        }
        $data = [
            'menu' => $this->menu,
            'title' => 'list',
            'list' => $item,
            'vendor' => SupplierModel::orderBy('nama', 'ASC')->get(),
            'status' => ['Proses Penerimaan', 'Proses Penempatan', 'Selesai Penerimaan'],
        ];
        return view('report.penerimaan')->with($data);
    }

    public function rep_pengeluaran(Request $request)
    {
        if ($request->kode_pengeluaran or $request->id_user or $request->start or $request->end or $request->status) {
            $matchThese = [];
            if ($request->kode_pengeluaran) {
                $kode_pengeluaran = array('kode_pengeluaran' => $request->kode_pengeluaran);
                array_push($matchThese, $kode_pengeluaran);
            } else {
                $kode_pengeluaran = array();
            }
            if ($request->id_user) {
                $id_user = array('id_user' => $request->id_user);
                array_push($matchThese, $id_user);
            } else {
                $id_user = array();
            }
            if ($request->status) {
                $status = array('status' => $request->status);
                array_push($matchThese, $status);
            } else {
                $status = array();
            }
            $matchThese = $kode_pengeluaran + $id_user + $status;
            if ($request->start) {
                $start = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$3-$1-$2", $request->start);
                $end = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$3-$1-$2", $request->end);
                $item = PengeluaranModel::whereBetween('tgl_pengeluaran', [$start, $end])->where($matchThese)->orderBy('id', 'DESC')->get();
            } else {
                $item = PengeluaranModel::where($matchThese)->orderBy('id', 'DESC')->get();
            }
        } else {
            $item = PengeluaranModel::orderBy('id', 'DESC')->get();
        }
        $data = [
            'menu' => $this->menu,
            'title' => 'list',
            'list' => $item,
            'user' => User::where('roles', 'Sales')->get(),
            'status' => ['Proses Permintaan', 'Pengiriman Permintaan', 'Selesai Permintaan'],
        ];
        return view('report.pengeluaran')->with($data);
    }

    public function rep_item(Request $request)
    {
        if ($request->type or $request->qty) {
            $matchThese = [];
            if ($request->type) {
                $type = array('type' => $request->type);
                array_push($matchThese, $type);
            } else {
                $type = array();
            }
            if ($request->qty) {
                $qty = array('qty' => $request->qty);
                array_push($matchThese, $qty);
            } else {
                $qty = array();
            }
            $matchThese = $type + $qty;
            $item = ItemModel::where($matchThese)->orderBy('id', 'DESC')->get();
        } else {
            $item = ItemModel::orderBy('id', 'DESC')->get();
        }
        $data = [
            'menu' => $this->menu,
            'title' => 'list',
            'list' => $item,
            'type' => ['Chemical', 'Alat'],
        ];
        return view('report.item')->with($data);
    }
}
