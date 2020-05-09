<?php

namespace App\Http\Controllers;

use App\Deal;
use App\Client;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request) {
            $query = trim($request->get('search'));

            $dealSearch = Deal::where('client_id', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'asc')
                ->get();

            $deals = Deal::join('clients', 'clients.id', '=', 'deals.client_id')
            ->select('deals.*', 'clients.client_name as client_name', 'clients.country as client_country')
            ->get();
    
            // dd($deals);

            return view('deals', ['deals'=> $dealSearch]);
        }

        

        // return view('deals', compact('deals'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $deals = new Deal();

        $deals->deal_type = $request->input('dealType');
        $deals->status = $request->input('dealStat');
        $deals->amount = $request->input('dealAmout');
        $deals->signed_date = $request->input('dealDate');
        $deals->client_id = $request->input('clientId');

        $deals->save();

        return response()->json($deals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        $file = file($request->file->getRealPath());
        $data = array_slice($file, 1);

        $parts = (array_chunk($data, 1000));

        foreach($parts as $index=>$part){
            $fileName = resource_path('pending-files/'.date('y-m-d-H-i-s').$index. '.csv');

            file_put_contents($fileName, $part);
        }

        session()->flash('status', 'queued for importing');

        return redirect("import");

    }
}


