<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentResource extends ResourceCollection
{
    
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ['reference'=>$this->reference,
        'name'=>$this->name,
        'lastname'=>$this->lastname,
        'age'=>$this->age,
        'email'=>$this->email,
        'city'=>$this->city,
        'address'=>$this->address,
        'birthdate'=>$this->birthdate,
        'status'=>$this->status
        ];
    }
}
