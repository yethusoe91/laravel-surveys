<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResourceV2 extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => $this->first(),
            'access_token' => $this['token'],
            'token_type' => 'Bearer',
            'expires_in' => config('sanctum.expiration') * 60
        ];
    }
}
