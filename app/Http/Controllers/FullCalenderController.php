<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use\Http\Models\Event; //  wrong
use App\Model\Event;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('debut', '>=', $request->debut)
                       ->whereDate('fin',   '<=', $request->fin)
                       ->get(['id', 'titre', 'debut', 'fin']);
            return response()->json($data);
    	}
    	return view('full-calender');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'titre'		=>	$request->titre,
    				'debut'		=>	$request->debut,
    				'fin'		=>	$request->fin
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'titre'		=>	$request->titre,
    				'debut'		=>	$request->debut,
    				'fin'		=>	$request->fin
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}
