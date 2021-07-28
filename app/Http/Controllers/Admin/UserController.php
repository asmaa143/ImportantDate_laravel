<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Models\Date;
use App\Repository\NationalityRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\Nationality;
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
//        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }


    public function show($id)
    {
        //$user = User::findOrFail($id);
        $user =$this->user->findById($id);
        return view('dashboard.user.show', compact('user'));
    }


    public function create()
    {
        $nationality = $this->nationality->all();
        //$date = Date::all();
        return view('dashboard.user.create', compact('nationality'));
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $requested_data = $request->except(['date1', 'date2', 'date3', 'date4', 'birth', 'residence', 'personalCard']);
            $user = User::create($requested_data);
            if ($request->date1) {
                $user->dates()->create(['date' => $request->date1, 'type' => 'ID']);
            }
            if ($request->date2) {
                $user->dates()->create(['date' => $request->date2, 'type' => 'residence']);
            }
            if ($request->date3) {
                $user->dates()->create(['date' => $request->date3, 'type' => 'licence']);
            }
            if ($request->date4) {
                $user->dates()->create(['date' => $request->date4, 'type' => 'car']);
            }

            if ($request->hasFile('birth')) {
                $image2 = $this->saveImage($request->birth, 'Upload/dashboard/photo/');
                $user->photos()->create(['src' => $image2, 'type' => 'birth']);
            }

            if ($request->hasFile('personalCard')) {
                $image1 = $this->saveImage($request->personalCard, 'Upload/dashboard/photo/');
                $user->photos()->create(['src' => $image1, 'type' => 'personalCard']);
            }

            if ($request->hasFile('residence')) {
                $image3 = $this->saveImage($request->residence, 'Upload/dashboard/photo/');
                $user->photos()->create(['src' => $image3, 'type' => 'residence']);
            }
        }
        catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }

        DB::commit();

        return redirect()->route('admin.users.index');

    }


    public function edit(User $user)
    {
        $nationality = Nationality::all();
        $userNationality = $user->nationality->name;
        return view('dashboard.user.edit', compact('user', 'nationality', 'userNationality'));
    }

    public function update(Request $request, User $user)
    {
        $requested_data = $request->except(['date1', 'date2', 'date3', 'date4', 'birth', 'residence', 'personalCard']);
        $user->update($requested_data);
        if ($request->hasFile('birth')) {
            if ($user->birth->count() > 0) {
                $this->deleteImage($user->birth->first()->src, 'dashboard/photo/');
                $image2 = $this->saveImage($request->birth, 'Upload/dashboard/photo/');
                $user->photos()->updateOrCreate(['type' => 'birth'], ['src' => $image2]);
            } else {
                $image2 = $this->saveImage($request->birth, 'Upload/dashboard/photo/');
                $user->photos()->create(['src' => $image2, 'type' => 'birth']);
            }


        }

        if ($request->hasFile('residence')) {
            if ($user->residence->count() > 0) {
                $this->deleteImage($user->residence->first()->src, 'dashboard/photo/');
                $image3 = $this->saveImage($request->residence, 'Upload/dashboard/photo/');
                $user->photos()->updateOrCreate(['type' => 'residence'], ['src' => $image3]);
            } else {
                $image3 = $this->saveImage($request->residence, 'Upload/dashboard/photo/');
                $user->photos()->create(['src' => $image3, 'type' => 'residence']);
            }


        }

        if ($request->hasFile('personalCard')) {
            if ($user->personalCard->count() > 0) {
                $this->deleteImage($user->personalCard->first()->src, 'dashboard/photo/');
                $image1 = $this->saveImage($request->personalCard, 'Upload/dashboard/photo/');
                $user->photos()->updateOrCreate(['type' => 'personalCard'], ['src' => $image1]);
            } else {
                $image1 = $this->saveImage($request->personalCard, 'Upload/dashboard/photo/');
                $user->photos()->create(['src' => $image1, 'type' => 'personalCard']);
            }


        }

        if ($request->date1) {
            $data1 = ['type' => 'ID'];
            $user->dates()->updateOrCreate($data1, ['date' => $request->date1]);
        }
        if ($request->date2) {
            $data2 = ['type' => 'residence'];
            $user->dates()->updateOrCreate($data2, ['date' => $request->date2]);
        }
        if ($request->date3) {
            $data3 = ['type' => 'licence'];
            $user->dates()->updateOrCreate($data3, ['date' => $request->date3]);
        }
        if ($request->date4) {
            $data4 = ['type' => 'car'];
            $user->dates()->updateOrCreate($data4, ['date' => $request->date4]);
        }

        return redirect()->route('admin.users.index');
    }


    public function destroy(User $user)
    {

        if ($user->birth->count() > 0) {
            $this->deleteImage($user->birth->first()->src, 'dashboard/photo/');
            $user->birth()->delete();
        }

        if ($user->residence->count() > 0) {
            $this->deleteImage($user->residence->first()->src, 'dashboard/photo/');
            $user->residence()->delete();
        }

        if ($user->personalCard->count() > 0) {
            $this->deleteImage($user->personalCard->first()->src, 'dashboard/photo/');
            $user->personalCard()->delete();
        }
        $user->IDDate()->delete();
        $user->residenceDate()->delete();
        $user->licenceDate()->delete();
        $user->carDate()->delete();
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
