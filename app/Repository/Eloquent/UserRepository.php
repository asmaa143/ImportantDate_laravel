<?php


namespace App\Repository\Eloquent;


use App\Models\User;
use App\Repository\UserRepositoryInterface;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    use ImageTrait;
    public function __construct(User $user)
    {
        parent::__construct($user);
    }


    public function create(array $data): ? Model
    {

        DB::beginTransaction();
        try {
            $requested_data = collect($data)->except(['date[ID]', 'date[residence]', 'date[licence]', 'date[car]', 'photo[personalCard]', 'photo[birth]', 'photo[residence]']);
            $user = $this->model->create($requested_data->toArray());
            if(isset($data['date']))
            {
                foreach (array_filter($data['date']) as $type => $date) {
                    $user->dates()->create(['date' => $date, 'type' => $type]);
                }
            }

            if(isset($data['photo']))
            {
                foreach (array_filter($data['photo']) as $type => $src) {
                    $image = $this->saveImage($src, 'Upload/dashboard/photo/');
                    $user->photos()->create(['src' => $image, 'type' => $type]);
                }
            }


        }
        catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }

        DB::commit();
        return  $user;
    }


    function image($count, $user, $image, $type)
    {

        if ($count > 0) {
            $this->deleteImage($user->$type->first()->src, 'dashboard/photo/');
            $image2 = $this->saveImage($image, 'Upload/dashboard/photo/');
            $user->photos()->updateOrCreate(['type' => $type], ['src' => $image2]);
        } else {
            $image2 = $this->saveImage($image, 'Upload/dashboard/photo/');
            $user->photos()->create(['src' => $image2, 'type' => $type]);
        }

    }


    public function updateUser(array $data ,$id)
    {
        $user=$this->model->findOrFail($id);

        $requested_data = collect($data)->except(['date[ID]', 'date[residence]', 'date[licence]', 'date[car]','birth','residence','personalCard']);
        $user->update($requested_data->toArray());

        if ( isset($data['birth'])) {
            $this->image($user->birth->count(), $user, $data['birth'], 'birth');
        }

        if (isset($data['residence'])) {
            $this->image($user->residence->count(), $user, $data['residence'], 'residence');
        }

        if (isset($data['personalCard'])) {

            $this->image($user->personalCard->count(), $user, $data['personalCard'], 'personalCard');
        }

        if(isset($data['date']))
        {
            foreach (array_filter($data['date']) as $type => $date) {
                $data = ['type' => $type];
                $user->dates()->updateOrCreate($data, ['date' => $date]);
            }
        }

        return $user;
    }


    public function deleteUser($id)
    {

       $user= $this->model->findOrFail($id);

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
    }
}
