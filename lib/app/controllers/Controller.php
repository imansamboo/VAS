<?php
namespace App\Controllers;
use Twig_Loader_Filesystem;
use Twig_Environment;
use Dompdf\Dompdf;

/**
 * Created by PhpStorm.
 * User: iman
 * Date: 10/8/18
 * Time: 3:48 PM
 */


abstract class Controller
{
    protected $modelName;
    public function index()
    {
        $model = new $this->modelName;
        $this->template(__FUNCTION__ .'.php',['args' => $model->all() , 'modelName'=> $model->name] );
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function create()
    {
        $this->template(__FUNCTION__.'.php',[] );
    }

    /**
     * @param $post
     */
    public function store($post)
    {
        ($this->modelName)::create($post);
        return $this->index();
    }

    /**
     * @param $id
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function show($id)
    {
        $factor = ($this->modelName)::findOrFail($id);
        $this->template(__FUNCTION__.'.php',['factor' =>$factor] );
    }

    /**
     * @param $id
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function edit($id)
    {
        $factor = ($this->modelName)::findOrFail($id);
        $this->template(__FUNCTION__.'.php',['factor' =>$factor] );
    }

    /**
     * @param $post
     * @param $id
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function update($post, $id)
    {
        $factor = ($this->modelName)::findOrFail($id);
        $factor->update($post);

        return $this->show($id);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        ($this->modelName)::destroy($id);

        return $this->index();
    }

    /**
     * @param $tmp
     * @param $args
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function template($tmp, $args)
    {
        try{
            $loader = new Twig_Loader_Filesystem(
                __DIR__ .'/../../../views/'
                . substr(
                    $this->modelName,
                    strpos($this->modelName,'s\\')+2,
                    strlen($this->modelName)
                )
            );
            $twig = new Twig_Environment($loader);
            $template = $twig->load($tmp);
            echo $template->render($args);
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }


    /**
     * @param $factor_id
     */
    public function download($factor_id)
    {
        try {
            $dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
            $date_text = 'تاریخ سفارش :';
            $html = '<!DOCTYPE html>
                 <html lang="en">
                    <head>
                        <title>Company Specification</title>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                        <link href="https://cdn.rawgit.com/rastikerdar/vazir-code-font/v[X.Y.Z]/dist/font-face.css" rel="stylesheet" type="text/css" />
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    
                    </head>
                    <body>
                    
                    <div class="container">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8"><h2>Table <b>Company Specification</b></h2></div>
                                <div class="col-sm-4" style="padding-top: 0px;padding-left: 91%;">
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=create"><button type="button" class="btn btn-info"><i></i> Add New</button></a>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>&#1578;&#1606;&#1587;&#1606;&#1586;&#1585;&#1587;&#1585;&#1575;&#1604;&#1586;&#1587;&#1587;&#1586;</th>
                                <th>'.$date_text.'</th>
                                <th>Address</th>
                                <th>Economical Number</th>
                                <th>Registration Number</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>333333</td>
                                <td>24710231464838554327683212984537</td>
                                <td>33706</td>
                                <td>33706</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=6" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=6" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=6" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>45326</td>
                                <td>20045442301461548393370554698055</td>
                                <td>45326</td>
                                <td>45326</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=7" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=7" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=7" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>13295</td>
                                <td>21087431741402205108211081506051</td>
                                <td>13295</td>
                                <td>13295</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=8" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=8" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=8" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>75753</td>
                                <td>44879735896296302303012468909642</td>
                                <td>75753</td>
                                <td>75753</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=9" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=9" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=9" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>68912</td>
                                <td>99813801926977850167846135516047</td>
                                <td>68912</td>
                                <td>68912</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=10" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=10" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=10" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>41185</td>
                                <td>49031052574437435837006347253436</td>
                                <td>41185</td>
                                <td>41185</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=11" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=11" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=11" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>63993</td>
                                <td>67836855366393158839087581337920</td>
                                <td>63993</td>
                                <td>63993</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=12" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=12" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=12" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>20919</td>
                                <td>16094490125360009516168013485298</td>
                                <td>20919</td>
                                <td>20919</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=13" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=13" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=13" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>72440</td>
                                <td>70933763540445813521059892834242</td>
                                <td>72440</td>
                                <td>72440</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=14" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=14" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=14" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>77805</td>
                                <td>13726306577655816497643216702146</td>
                                <td>77805</td>
                                <td>77805</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=15" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=15" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=15" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>60741</td>
                                <td>27265845366922870317009800050549</td>
                                <td>60741</td>
                                <td>60741</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=16" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=16" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=16" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>41324</td>
                                <td>69824030016878906961393205890356</td>
                                <td>41324</td>
                                <td>41324</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=17" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=17" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=17" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>18257</td>
                                <td>72567983804443075774872533236564</td>
                                <td>18257</td>
                                <td>18257</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=18" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=18" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=18" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>69245</td>
                                <td>17235131100198824852110324670423</td>
                                <td>69245</td>
                                <td>69245</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=19" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=19" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=19" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>23709</td>
                                <td>40711790861006428684135609849717</td>
                                <td>23709</td>
                                <td>23709</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=20" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=20" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=20" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>43539</td>
                                <td>69579436463792610256594871340379</td>
                                <td>43539</td>
                                <td>43539</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=21" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=21" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=21" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>66714</td>
                                <td>43540083469261049315605477557644</td>
                                <td>66714</td>
                                <td>66714</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=22" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=22" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=22" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>88228</td>
                                <td>51924992093789598935653954923941</td>
                                <td>88228</td>
                                <td>88228</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=23" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=23" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=23" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td>63209</td>
                                <td>75092651073444421635447673809481</td>
                                <td>63209</td>
                                <td>63209</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=24" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=24" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=24" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>16902</td>
                                <td>20373832097907757563091623701101</td>
                                <td>16902</td>
                                <td>16902</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=25" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=25" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=25" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>21</td>
                                <td>85567</td>
                                <td>26183664540588345446667761737411</td>
                                <td>85567</td>
                                <td>85567</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=26" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=26" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=26" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>22</td>
                                <td>10245</td>
                                <td>سطسطسطسطسط</td>
                                <td>10245</td>
                                <td>10245</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=27" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=27" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=27" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>23</td>
                                <td>19002</td>
                                <td>64667716665921057613814686906223</td>
                                <td>19002</td>
                                <td>19002</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=28" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=28" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=28" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>24</td>
                                <td>82623</td>
                                <td>57205213258241381717051276089376</td>
                                <td>82623</td>
                                <td><img src="iman.jpeg"></td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=29" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=29" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=29" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>25</td>
                                <td>79650</td>
                                <td>43855873399859814238812092637780</td>
                                <td>79650</td>
                                <td>79650</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=30" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=30" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=30" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>26</td>
                                <td>74678</td>
                                <td>39644154340109556183758395377420</td>
                                <td>74678</td>
                                <td>74678</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=31" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=31" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=31" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>27</td>
                                <td>32828</td>
                                <td>50423609045297963507669123806512</td>
                                <td>32828</td>
                                <td>32828</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=32" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=32" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=32" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>28</td>
                                <td>61357</td>
                                <td>82825063859752348577983862597654</td>
                                <td>61357</td>
                                <td>61357</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=33" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=33" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=33" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>29</td>
                                <td>66877</td>
                                <td>25584525567008009217045224020336</td>
                                <td>66877</td>
                                <td>66877</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=34" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=34" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=34" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>81991</td>
                                <td>70772387753542051262978408838649</td>
                                <td>81991</td>
                                <td>81991</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=35" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=35" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=35" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>31</td>
                                <td>61599</td>
                                <td>50572469743952388712540460427460</td>
                                <td>61599</td>
                                <td>61599</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=36" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=36" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=36" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>32</td>
                                <td>60085</td>
                                <td>62124507951475035237878330477225</td>
                                <td>60085</td>
                                <td>60085</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=37" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=37" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=37" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>33</td>
                                <td>65922</td>
                                <td>43141842509992658693727775381414</td>
                                <td>65922</td>
                                <td>65922</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=38" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=38" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=38" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>34</td>
                                <td>15801</td>
                                <td>20694287229214581635466701298854</td>
                                <td>15801</td>
                                <td>15801</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=39" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=39" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=39" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>35</td>
                                <td>76914</td>
                                <td>90023143756827265896638727352748</td>
                                <td>76914</td>
                                <td>76914</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=40" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=40" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=40" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>36</td>
                                <td>28081</td>
                                <td>76329791207479757382266251163864</td>
                                <td>28081</td>
                                <td>28081</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=41" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=41" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=41" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>37</td>
                                <td>26786</td>
                                <td>82893573646329857703331995141325</td>
                                <td>26786</td>
                                <td>26786</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=42" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=42" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=42" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>38</td>
                                <td>74350</td>
                                <td>44423463966510004124904051200064</td>
                                <td>74350</td>
                                <td>74350</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=43" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=43" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=43" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>39</td>
                                <td>41613</td>
                                <td>76026573307813699638761349974038</td>
                                <td>41613</td>
                                <td>41613</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=44" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=44" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=44" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>40</td>
                                <td>56289</td>
                                <td>69342291863424750906835561193093</td>
                                <td>56289</td>
                                <td>56289</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=45" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=45" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=45" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>41</td>
                                <td>19733</td>
                                <td>77688844576752304758772252589387</td>
                                <td>19733</td>
                                <td>19733</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=46" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=46" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=46" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>42</td>
                                <td>19884</td>
                                <td>39655757179620980563476668522282</td>
                                <td>19884</td>
                                <td>19884</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=47" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=47" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=47" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>43</td>
                                <td>49363</td>
                                <td>22160852098045821576938501409139</td>
                                <td>49363</td>
                                <td>49363</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=48" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=48" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=48" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>44</td>
                                <td>72459</td>
                                <td>83058950584077777938656040594921</td>
                                <td>72459</td>
                                <td>72459</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=49" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=49" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=49" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>45</td>
                                <td>24307</td>
                                <td>15571258979943440872673770750752</td>
                                <td>24307</td>
                                <td>24307</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=51" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=51" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=51" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>46</td>
                                <td>11</td>
                                <td>13</td>
                                <td>11</td>
                                <td>11</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=52" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=52" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=52" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>47</td>
                                <td>11</td>
                                <td>11</td>
                                <td>11</td>
                                <td>11</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=53" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=53" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=53" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>48</td>
                                <td>12</td>
                                <td>sxxs</td>
                                <td>11</td>
                                <td>11</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=54" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=54" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=54" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>49</td>
                                <td>121</td>
                                <td>xsxs</td>
                                <td>12121</td>
                                <td>111111</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=55" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=55" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=55" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>50</td>
                                <td>12345</td>
                                <td>ddddddddddd</td>
                                <td>1212</td>
                                <td>1211</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=56" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=56" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=56" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>51</td>
                                <td>12122</td>
                                <td>asaxa</td>
                                <td>12121</td>
                                <td>121</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=57" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=57" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=57" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>52</td>
                                <td>11111</td>
                                <td>aaaaaa</td>
                                <td>11</td>
                                <td>111111</td>
                                <td>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=show&id=58" class="add" title="" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-eye-open" style="color:greenyellow"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=edit&id=58" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><span class="glyphicon glyphicon-pencil" style="color: darkorange"></span></a>
                                    <a href="http://localhost:2001?controller=CompanySpecification&action=destroy&id=58" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    </body>
                    </html>
';
            $dompdf->loadHtml($html);
            $dompdf->render();
            $dompdf->stream("sample.pdf");
            //If the exception is thrown, this text will not be shown
            echo 'If you see this, the number is 1 or below';
        }

//catch exception
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }



}