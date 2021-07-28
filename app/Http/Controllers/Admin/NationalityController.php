<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNationalityRequest;
use App\Models\Nationality;
use App\Repository\NationalityRepositoryInterface;
use Illuminate\Http\Request;

class NationalityController extends Controller
{

    private $nationality;

    public function __construct(NationalityRepositoryInterface $nationality)
    {
        $this->nationality = $nationality;
    }


    public function index()
    {
        $data['rows'] = $this->nationality->all();
        return view('dashboard.nationality.index')->with($data);
    }


    public function create()
    {

    }


    public function store(StoreNationalityRequest $request)
    {
        if ($request->ajax()) {
            $response['row'] =$this->nationality->create($request->validated());
            return view('dashboard.nationality.row')->with($response);
        }

    }

    public function show()
    {

    }

    public function edit($id)
    {
        $data =$this->nationality->findById($id);
        //$data = Nationality::findOrFail($id);
        return response()->json($data);
    }

    public function update(StoreNationalityRequest $request )
    {
        if ($request->ajax()) {
          $data=  Nationality::findOrFail($request->id);
          $data->update($request->validated());
      //  $data=  $this->nationality->updateone($request->validated(), $request->id);
          $response['row'] = $data;
            return view('dashboard.nationality.rowEdit')->with($response);
        }
    }

    public function destroy($id)
    {
//          Nationality::findOrFail($id)->delete();
          $this->nationality->delete($id);
          return response()->json(['success'=>'Deleted Success','id'=>$id]);
    }
}
