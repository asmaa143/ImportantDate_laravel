<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDateRequest;
use App\Models\DateSetup;
use App\Repository\DateSetupRepositoryInterface;
use Illuminate\Http\Request;

class DateSetupController extends Controller
{
    private $date;

    public function __construct(DateSetupRepositoryInterface $date)
    {
        $this->date = $date;
    }
  public function index(){
      $dates = $this->date->all();
      return view('dashboard.date-setup.index',compact('dates'));
  }


  public function create(){
      return view('dashboard.date-setup.create');
  }

  public function store(StoreDateRequest $request)
  {
      $this->date->create($request->validated());
      return redirect()->route('admin.date-setup.index');
  }


  public function edit(DateSetup $dateSetup)
  {
      return view('dashboard.date-setup.edit', compact('dateSetup'));
  }



  public function update(StoreDateRequest $request ,DateSetup $dateSetup)
  {
      $this->date->update($request->validated(), $dateSetup);

      return redirect()->route('admin.date-setup.index');
  }

  public function destroy(DateSetup $dateSetup)
  {
      //$dateSetup->delete();
      $this->date->delete($dateSetup);
      return redirect()->route('admin.date-setup.index');
  }

}
