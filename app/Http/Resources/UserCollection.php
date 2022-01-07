<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'companies' => CompanyCollection::collection($this->companies)
        ];
    }
}
