<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SupplierOrderReturn;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class SupplierOrderReturnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
            $data = SupplierOrderReturn::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/supplier-order-returns/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
     
                    return view('supplier-order-returns.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('supplier-order-returns.create');
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
        
        SupplierOrderReturn::create($requestData);

        return redirect('supplier-order-returns')->with('flash_message', 'SupplierOrderReturn added!');
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
        $supplierorderreturn = SupplierOrderReturn::findOrFail($id);

        return view('supplier-order-returns.show', compact('supplierorderreturn'));
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
        $supplierorderreturn = SupplierOrderReturn::findOrFail($id);

        return view('supplier-order-returns.edit', compact('supplierorderreturn'));
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
        
        $supplierorderreturn = SupplierOrderReturn::findOrFail($id);
        $supplierorderreturn->update($requestData);

        return redirect('supplier-order-returns')->with('flash_message', 'SupplierOrderReturn updated!');
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
        SupplierOrderReturn::destroy($id);

        return redirect('supplier-order-returns')->with('flash_message', 'SupplierOrderReturn deleted!');
    }
}
