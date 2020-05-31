<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MedicineUnitType;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class MedicineUnitTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
            $data = MedicineUnitType::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/medicine-unit-types/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
     
                    return view('medicine-unit-types.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('medicine-unit-types.create');
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
        
        $requestData = $request->all();
        
        MedicineUnitType::create($requestData);

        return redirect('medicine-unit-types')->with('flash_message', 'MedicineUnitType added!');
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
        $medicineunittype = MedicineUnitType::findOrFail($id);

        return view('medicine-unit-types.show', compact('medicineunittype'));
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
        $medicineunittype = MedicineUnitType::findOrFail($id);

        return view('medicine-unit-types.edit', compact('medicineunittype'));
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
        
        $requestData = $request->all();
        
        $medicineunittype = MedicineUnitType::findOrFail($id);
        $medicineunittype->update($requestData);

        return redirect('medicine-unit-types')->with('flash_message', 'MedicineUnitType updated!');
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
        MedicineUnitType::destroy($id);

        return redirect('medicine-unit-types')->with('flash_message', 'MedicineUnitType deleted!');
    }
}
