<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use Illuminate\Http\Request;
use App\Exports\RapportsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RapportController extends Controller
{
    public function index()
    {
        $rapports = Prospect::where('sale_concluded', true)->get();

        return view('rapports', compact('rapports'));
    }
    public function filtrerRapports(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        
        $rapports = Prospect::where('sale_concluded', true)
                            ->whereBetween('date', [$start_date, $end_date])
                            ->get();
    
        
        return view('rapport', compact('rapports', 'start_date', 'end_date'));
    }
    public function exporterRapports()
{
    $rapports = DB::table('prospects')->select('id','agent_name','client_name','client_address','date','start_time','end_time','duration','product','client_observation','sale_concluded',)->where('sale_concluded', true)->get();
    return Excel::download(new RapportsExport($rapports), 'rapports.xlsx');
}

    
}
