<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RoleUser;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class RoleUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
            $data = RoleUser::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/role-users/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
     
                    return view('role-users.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('role-users.create');
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
			'user_id' => 'required',
			'role_id' => 'required'
		]);
        $requestData = $request->all();
        
        RoleUser::create($requestData);

        return redirect('role-users')->with('flash_message', 'RoleUser added!');
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
        $roleuser = RoleUser::findOrFail($id);

        return view('role-users.show', compact('roleuser'));
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
        $roleuser = RoleUser::findOrFail($id);

        return view('role-users.edit', compact('roleuser'));
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
			'user_id' => 'required',
			'role_id' => 'required'
		]);
        $requestData = $request->all();
        
        $roleuser = RoleUser::findOrFail($id);
        $roleuser->update($requestData);

        return redirect('role-users')->with('flash_message', 'RoleUser updated!');
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
        RoleUser::destroy($id);

        return redirect('role-users')->with('flash_message', 'RoleUser deleted!');
    }
}
