<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $link = 'https://jobs.github.com/positions.json?description='.$request->description.'&location='.$request->location.'&full_time='.$request->full_time;
        $datas = $this->Apiget($link);
        $datas = $this->paginate($datas);
        return view('searchjob', compact('datas'));
    }

    public function detailjob($id)
    {
        $link = "https://jobs.github.com/positions/".$id.".json";
        $data = $this->Apiget($link);
        return view('detailjob', compact('data'));
    }

    public static function Apiget($link)
    {
        try {
            $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
            $context = stream_context_create($opts);
            $strDsn = file_get_contents($link, false, $context);
            return json_decode($strDsn);

        } catch (\Exception $th) {
            return false;
        }
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        // dd($page);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => url()->current()
        ]);
    }
}
