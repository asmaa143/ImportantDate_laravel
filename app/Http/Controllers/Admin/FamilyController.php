<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFamilyRequest;
use App\Models\Family;
use App\Models\Nationality;
use App\Models\User;
use App\Repository\FamilyRepositoryInterface;
use App\Repository\NationalityRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class FamilyController extends Controller
{
    use ImageTrait;

    private $family, $nationality, $user;

    public function __construct(FamilyRepositoryInterface $familyRepository, NationalityRepositoryInterface $nationalityRepository, UserRepositoryInterface $userRepository)
    {
        $this->family = $familyRepository;
        $this->nationality = $nationalityRepository;
        $this->user = $userRepository;
    }

    public function index()
    {
        $family = $this->family->all();
        return view('dashboard.family.index', compact('family'));
    }


    public function create_family($id)
    {
        $nationality = $this->nationality->all();
        $user = $this->user->findById($id);
        return view('dashboard.family.create', compact('nationality', 'user'));
    }

    public function store(StoreFamilyRequest $request)
    {

        $this->family->create($request->all());

//     $data = $request->validate([
//         'first_name'=>'required|min:5|max:60|array|min:1',
//         'last_name'=>'max:60|array|min:1',
//         'nationality_id'=>'required|array|min:1|exists:nationalities,id',
//         'date1'=>'nullable|array|min:1',
//         'date2'=>'nullable|array|min:1',
//         'date3'=>'nullable|array|min:1',
//         'date4'=>'nullable|array|min:1',
//         'address'=>'required|array|min:1',
//         'type'=>'nullable|array|min:1',
//         'user_id'=>'nullable|array|min:1'
//     ]);

        return redirect()->route('admin.users.index');
    }


    public function show($id)
    {
        $family = $this->family->findById($id);
        return view('dashboard.family.show', compact('family'));
    }

    public function edit(Family $family)
    {
        $nationality = $this->nationality->all();
        $userNationality = $family->nationality->name;
        return view('dashboard.family.edit', compact('family', 'nationality', 'userNationality'));
    }





    public function update(Request $request, Family $family)
    {
        $this->family->updateFamily($request->all(),$family->id);
        return redirect()->route('admin.families.index');
    }


    public function destroy(Family $family)
    {
        $this->family->deleteFamily($family->id);
        return redirect()->route('admin.families.index');
    }

}
