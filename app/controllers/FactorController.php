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

class FactorController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $contents = VAFactor::where('content', 'LIKE', "%$keyword%")
                ->orWhere('men_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contents = VAFactor::latest()->paginate($perPage);
        }

        return view('admin.contents.index', compact('contents'));
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

        $requestData = $request->all();

        VAFactor::create($requestData);

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
        $content = VAFactor::findOrFail($id);

        return view('admin.contents.show', compact('content'));
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
        $content = VAFactor::findOrFail($id);

        return view('admin.contents.edit', compact('content'));
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

        $content = VAFactor::findOrFail($id);
        $content->update($requestData);

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