<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $link = 'https://jobs.github.com/positions.json?description='.$request->description.'&location='.$request->location.'&full_time='.$request->full_time;
        $datas = $this->Apiget($link);
        return view('home', compact('datas'));
    }

    public static function Apiget($link)
    {
        try {
            $opts = array('http'=>array('header' => ""));
            $context = stream_context_create($opts);
            $strDsn = file_get_contents($link, false, $context);
            return json_decode($strDsn);

        } catch (\Exception $th) {
            return false;
        }
    }
}
