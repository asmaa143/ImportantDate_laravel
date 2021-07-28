<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFamilyRequest;
use App\Models\Family;
use App\Models\Nationality;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class FamilyController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $family = Family::all();
        return view('dashboard.family.index', compact('family'));
    }


    public function create_family($id)
    {
        $nationality = Nationality::all();
        $user = User::findOrFail($id);
        return view('dashboard.family.create', compact('nationality', 'user'));
    }

    public function store(StoreFamilyRequest $request)
    {

//dd($request->all());

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

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $address = $request->address;
        $nationality_id = $request->nationality_id;
        $type = $request->type;
        $user_id = $request->id;
        $date1 = $request->date1;
        $date2 = $request->date2;
        $date3 = $request->date3;
        $date4 = $request->date4;
        $image1 = $request->personalCard;
        $image2 = $request->birth;
        $image3 = $request->residence;
//
        for ($i = 0; $i < count($first_name); $i++) {
            $data = [
                'first_name' => $first_name[$i],
                'last_name' => $last_name[$i],
                'address' => $address[$i],
                'nationality_id' => $nationality_id[$i],
                'type' => $type[0],
                'user_id' => $user_id[0],
            ];
            $family = Family::create($data);
            $family->dates()->create(['date' => $date1[$i], 'type' => 'ID']);
            $family->dates()->create(['date' => $date2[$i], 'type' => 'residence']);
            $family->dates()->create(['date' => $date3[$i], 'type' => 'licence']);
            $family->dates()->create(['date' => $date4[$i], 'type' => 'car']);

            $photo1 = $this->saveImage($image1[$i], 'Upload/dashboard/photo/');
            $photo2 = $this->saveImage($image2[$i], 'Upload/dashboard/photo/');
            $photo3 = $this->saveImage($image3[$i], 'Upload/dashboard/photo/');

            $family->photos()->create(['src' => $photo1, 'type' => 'personalCard']);
            $family->photos()->create(['src' => $photo2, 'type' => 'birth']);
            $family->photos()->create(['src' => $photo3, 'type' => 'residence']);
        }

        return redirect()->route('admin.users.index');
    }


    public function show($id)
    {
        $family = Family::findOrFail($id);
        return view('dashboard.family.show', compact('family'));
    }

    public function edit(Family $family)
    {
        $nationality = Nationality::all();
        $userNationality = $family->nationality->name;
        return view('dashboard.family.edit', compact('family', 'nationality', 'userNationality'));
    }


    function image( $count,$family,$image , $type){

            if ($count > 0) {
                $this->deleteImage($family->birth->first()->src, 'dashboard/photo/');
                $image2 = $this->saveImage($image, 'Upload/dashboard/photo/');
                $family->photos()->updateOrCreate(['type' => $type], ['src' => $image2]);
            } else {
                $image2 = $this->saveImage($image, 'Upload/dashboard/photo/');
                $family->photos()->create(['src' => $image2, 'type' => $type]);
            }

        }



    public function update(Request $request, Family $family)
    {
        $requested_data = $request->except(['date1', 'date2', 'date3', 'date4', 'birth', 'residence', 'personalCard']);

        $family->update($requested_data);
        if ($request->hasFile('birth')) {
            $this->image($family->birth->count(),$family,$request->birth,'birth');
        }

        if ($request->hasFile('residence')) {
            if ($family->residence->count() > 0) {
                $this->deleteImage($family->residence->first()->src, 'dashboard/photo/');
                $image3 = $this->saveImage($request->residence, 'Upload/dashboard/photo/');
                $family->photos()->updateOrCreate(['type' => 'residence'], ['src' => $image3]);
            } else {
                $image3 = $this->saveImage($request->residence, 'Upload/dashboard/photo/');
                $family->photos()->create(['src' => $image3, 'type' => 'residence']);
            }


        }

        if ($request->hasFile('personalCard')) {
            if ($family->personalCard->count() > 0) {
                $this->deleteImage($family->personalCard->first()->src, 'dashboard/photo/');
                $image1 = $this->saveImage($request->personalCard, 'Upload/dashboard/photo/');
                $family->photos()->updateOrCreate(['type' => 'personalCard'], ['src' => $image1]);
            } else {
                $image1 = $this->saveImage($request->personalCard, 'Upload/dashboard/photo/');
                $family->photos()->create(['src' => $image1, 'type' => 'personalCard']);
            }


        }

        if ($request->date1) {
            $data1 = ['type' => 'ID'];
            $family->dates()->updateOrCreate($data1, ['date' => $request->date1]);
        }
        if ($request->date2) {
            $data2 = ['type' => 'residence'];
            $family->dates()->updateOrCreate($data2, ['date' => $request->date2]);
        }
        if ($request->date3) {
            $data3 = ['type' => 'licence'];
            $family->dates()->updateOrCreate($data3, ['date' => $request->date3]);
        }
        if ($request->date4) {
            $data4 = ['type' => 'car'];
            $family->dates()->updateOrCreate($data4, ['date' => $request->date4]);
        }

        return redirect()->route('admin.families.index');
    }


    public function destroy(Family $family)
    {

        if ($family->birth->count() > 0) {
            $this->deleteImage($family->birth->first()->src, 'dashboard/photo/');
            $family->birth()->delete();
        }

        if ($family->residence->count() > 0) {
            $this->deleteImage($family->residence->first()->src, 'dashboard/photo/');
            $family->residence()->delete();
        }

        if ($family->personalCard->count() > 0) {
            $this->deleteImage($family->personalCard->first()->src, 'dashboard/photo/');
            $family->personalCard()->delete();
        }
        $family->IDDate()->delete();
        $family->residenceDate()->delete();
        $family->licenceDate()->delete();
        $family->carDate()->delete();
        $family->delete();
        return redirect()->route('admin.families.index');
    }

}
