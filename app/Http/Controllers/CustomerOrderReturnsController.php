<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CustomerOrderReturn;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class CustomerOrderReturnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
            $data = CustomerOrderReturn::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/customer-order-returns/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
     
                    return view('customer-order-returns.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('customer-order-returns.create');
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
			'comment' => 'required|max:500'
		]);
        $requestData = $request->all();
        
        CustomerOrderReturn::create($requestData);

        return redirect('customer-order-returns')->with('flash_message', 'CustomerOrderReturn added!');
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
        $customerorderreturn = CustomerOrderReturn::findOrFail($id);

        return view('customer-order-returns.show', compact('customerorderreturn'));
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
        $customerorderreturn = CustomerOrderReturn::findOrFail($id);

        return view('customer-order-returns.edit', compact('customerorderreturn'));
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
			'comment' => 'required|max:500'
		]);
        $requestData = $request->all();
        
        $customerorderreturn = CustomerOrderReturn::findOrFail($id);
        $customerorderreturn->update($requestData);

        return redirect('customer-order-returns')->with('flash_message', 'CustomerOrderReturn updated!');
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
        CustomerOrderReturn::destroy($id);

        return redirect('customer-order-returns')->with('flash_message', 'CustomerOrderReturn deleted!');
    }
}
