<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 9/29/18
 * Time: 4:42 PM
 */

namespace App\Controllers;
use Illuminate\Http\Request;
use App\Models\VAFactor;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $factors = VAFactor::all();
        return view('admin.contents.index',$factors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.contents.create');
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
        $factor = $request->all();

        VAFactor::create($factor);

        return redirect('admin/contents')->with('flash_message', 'VAFactor added!');
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
        $factor = VAFactor::findOrFail($id);

        return view('admin.contents.show', $factor);
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
        $factor = VAFactor::findOrFail($id);

        return view('admin.contents.edit', $factor);
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

        $factor = VAFactor::findOrFail($id);
        $factor->update($requestData);

        return redirect('admin/contents')->with('flash_message', 'VAFactor updated!');
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
        VAFactor::destroy($id);

        return redirect('admin/contents')->with('flash_message', 'VAFactor deleted!');
    }
}