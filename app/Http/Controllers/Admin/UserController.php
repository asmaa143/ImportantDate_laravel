<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repository\NationalityRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Image;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;



class UserController extends Controller
{
    use ImageTrait;
    private $user,$nationality;

    public function __construct(UserRepositoryInterface $user,NationalityRepositoryInterface $nationalityRepository)
    {
        $this->user = $user;
        $this->nationality = $nationalityRepository;
    }


    public function index()
    {
        $users = $this->user->all();
        return view('dashboard.user.index', compact('users'));
    }


    public function show($id)
    {
        $user =$this->user->findById($id);
        return view('dashboard.user.show', compact('user'));
    }


    public function create()
    {
        $nationality = $this->nationality->all();
        return view('dashboard.user.create', compact('nationality'));
    }

    public function store(Request $request)
    {
        $this->user->create($request->all());
        return redirect()->route('admin.users.index');

    }


    public function edit(User $user)
    {
        $nationality = $this->nationality->all();
        $userNationality = $user->nationality->name;
        return view('dashboard.user.edit', compact('user', 'nationality', 'userNationality'));
    }


    public function update(Request $request, User $user)
    {
        $this->user->updateUser($request->all(),$user->id);
        return redirect()->route('admin.users.index');
    }


    public function destroy(User $user)
    {
        $this->user->deleteUser($user->id);
        return redirect()->route('admin.users.index');
    }
}
