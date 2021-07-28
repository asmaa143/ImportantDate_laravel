<?php


namespace App\Repository\Eloquent;


use App\Models\DateSetup;
use App\Repository\DateSetupRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DateSetupRepository extends BaseRepository implements DateSetupRepositoryInterface
{
    public function __construct(DateSetup $date)
    {
        parent::__construct($date);
    }

}
