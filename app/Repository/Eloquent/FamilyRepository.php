<?php


namespace App\Repository\Eloquent;

use App\Models\Family;
use App\Repository\FamilyRepositoryInterface;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class FamilyRepository extends BaseRepository implements FamilyRepositoryInterface
{
    use ImageTrait;

    public function __construct(Family $family)
    {
        parent::__construct($family);
    }


    public function create(array $data): ?Model
    {
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $address = $data['address'];
        $nationality_id = $data['nationality_id'];
        $type = $data['type'];
        $user_id = $data['id'];

        for ($i = 0; $i < count($first_name); $i++) {
            $data1 = [
                'first_name' => $first_name[$i],
                'last_name' => $last_name[$i],
                'address' => $address[$i],
                'nationality_id' => $nationality_id[$i],
                'type' => $type[0],
                'user_id' => $user_id[0],
            ];
            $family = $this->model->create($data1);

            if (isset($data['date1'])) {
                $date1 = $data['date1'];
                if (isset($date1[$i])) {
                    $family->dates()->create(['date' => $date1[$i], 'type' => 'ID']);
                }
            }
            if (isset($data['date2'])) {
                $date2 = $data['date2'];
                if (isset($date2[$i])) {
                    $family->dates()->create(['date' => $date2[$i], 'type' => 'residence']);
                }
            }
            if (isset($data['date3'])) {
                $date3 = $data['date3'];
                if (isset($date3[$i])) {
                    $family->dates()->create(['date' => $date3[$i], 'type' => 'licence']);
                }
            }
            if (isset($data['date4'])) {
                $date4 = $data['date4'];
                if (isset($date4[$i])) {
                    $family->dates()->create(['date' => $date4[$i], 'type' => 'car']);
                }
            }

            if (isset($data['personalCard'])) {
                $image1 = $data['personalCard'];
                if (isset($image1[$i])) {
                    $photo1 = $this->saveImage($image1[$i], 'Upload/dashboard/photo/');
                    $family->photos()->create(['src' => $photo1, 'type' => 'personalCard']);
                }
            }

            if (isset($data['birth'])) {
                $image2 = $data['birth'];
                if (isset($image2[$i])) {
                    $photo2 = $this->saveImage($image2[$i], 'Upload/dashboard/photo/');
                    $family->photos()->create(['src' => $photo2, 'type' => 'birth']);
                }
            }


            if (isset($data['residence'])) {
                $image3 = $data['residence'];
                if (isset($image3[$i])) {
                    $photo3 = $this->saveImage($image3[$i], 'Upload/dashboard/photo/');
                    $family->photos()->create(['src' => $photo3, 'type' => 'residence']);
                }
            }

        }
        return $family;
    }


    function image($count, $family, $image, $type)
    {
        if ($count > 0) {
            $this->deleteImage($family->$type->first()->src, 'dashboard/photo/');
            $image2 = $this->saveImage($image, 'Upload/dashboard/photo/');
            $family->photos()->updateOrCreate(['type' => $type], ['src' => $image2]);
        } else {
            $image2 = $this->saveImage($image, 'Upload/dashboard/photo/');
            $family->photos()->create(['src' => $image2, 'type' => $type]);
        }

    }


    public
    function updateFamily(array $data, $id)
    {
        $family = $this->model->findOrFail($id);

        $requested_data = collect($data)->except(['date[ID]', 'date[residence]', 'date[licence]', 'date[car]', 'birth', 'residence', 'personalCard']);

        $family->update($requested_data->toArray());

        if (isset($data['personalCard'])) {
            $this->image($family->personalCard->count(), $family, $data['personalCard'], 'personalCard');
        }

        if (isset($data['birth'])) {
            $this->image($family->birth->count(), $family, $data['birth'], 'birth');
        }

        if (isset($data['residence'])) {
            $this->image($family->residence->count(), $family, $data['residence'], 'residence');
        }


        if (isset($data['date'])) {
            foreach (array_filter($data['date']) as $type => $date) {
                $data = ['type' => $type];
                $family->dates()->updateOrCreate($data, ['date' => $date]);
            }
        }


    }

    public function deleteFamily($id)
    {
        $family = $this->model->findOrFail($id);

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
    }
}
