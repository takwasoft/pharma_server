<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AbilityRole;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class AbilityRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
            $data = AbilityRole::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/ability-roles/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
     
                    return view('ability-roles.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ability-roles.create');
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
			'role_id' => 'required',
			'ability_id' => 'required'
		]);
        $requestData = $request->all();
        
        AbilityRole::create($requestData);

        return redirect('ability-roles')->with('flash_message', 'AbilityRole added!');
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
        $abilityrole = AbilityRole::findOrFail($id);

        return view('ability-roles.show', compact('abilityrole'));
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
        $abilityrole = AbilityRole::findOrFail($id);

        return view('ability-roles.edit', compact('abilityrole'));
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
			'role_id' => 'required',
			'ability_id' => 'required'
		]);
        $requestData = $request->all();
        
        $abilityrole = AbilityRole::findOrFail($id);
        $abilityrole->update($requestData);

        return redirect('ability-roles')->with('flash_message', 'AbilityRole updated!');
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
        AbilityRole::destroy($id);

        return redirect('ability-roles')->with('flash_message', 'AbilityRole deleted!');
    }
}
