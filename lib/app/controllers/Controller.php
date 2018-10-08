<?php
namespace App\Controllers;
use App\Views;
use Illuminate\Http\Request;
/*use App\Models\VAFactor;
use App\Models\VA;
use App\Models\CompanySpecification;*/

/**
 * Created by PhpStorm.
 * User: iman
 * Date: 10/8/18
 * Time: 3:48 PM
 */

/*class Something extends Controller
{
    public function index ()
    {
        $view = new view('templatefile');
        $view->assign('variablename', 'variable content');
    }
}*/
abstract class Controller
{
    protected $modelName;
    public function index()
    {
        $factors = new $this->modelName;
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

        ($this->modelName)::create($factor);

        return redirect('admin/contents')->with('flash_message', 'CompanySpecification added!');
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
        $factor = ($this->modelName)::findOrFail($id);

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
        $factor = ($this->modelName)::findOrFail($id);

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

        $factor = ($this->modelName)::findOrFail($id);
        $factor->update($requestData);

        return redirect('admin/contents')->with('flash_message', 'CompanySpecification updated!');
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
        ($this->modelName)::destroy($id);

        return redirect('admin/contents')->with('flash_message', 'CompanySpecification deleted!');
    }
}