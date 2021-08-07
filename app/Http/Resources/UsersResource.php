<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'email' => $this->email,
            'phone_number'=>$this->phone_number,
            'password' => $this->password,
            'address'=>$this->address,
            'nationality_id'=>$this->nationality_id,
            'has_wife'=>$this->has_wife,
            'has_sons'=>$this->has_sons,
            'has_driver'=>$this->has_driver,
            'has_servant'=>$this->has_servant,
        ];
    }
}
