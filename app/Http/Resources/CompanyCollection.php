<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyCollection extends JsonResource
{

    public function toArray($request): array
    {
       return [
           'name' => $this->name,
           'date_at' => Carbon::parse($this->pivot->date_at)->format('d.m.Y')
       ];
    }
}
