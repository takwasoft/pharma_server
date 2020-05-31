<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\WastageLine;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class WastageLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
            $data = WastageLine::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/wastage-lines/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
     
                    return view('wastage-lines.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('wastage-lines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'quantity' => 'required|min:1'
		]);
        $requestData = $request->all();
        
        WastageLine::create($requestData);

        return redirect('wastage-lines')->with('flash_message', 'WastageLine added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $wastageline = WastageLine::findOrFail($id);

        return view('wastage-lines.show', compact('wastageline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $wastageline = WastageLine::findOrFail($id);

        return view('wastage-lines.edit', compact('wastageline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'quantity' => 'required|min:1'
		]);
        $requestData = $request->all();
        
        $wastageline = WastageLine::findOrFail($id);
        $wastageline->update($requestData);

        return redirect('wastage-lines')->with('flash_message', 'WastageLine updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        WastageLine::destroy($id);

        return redirect('wastage-lines')->with('flash_message', 'WastageLine deleted!');
    }
}
