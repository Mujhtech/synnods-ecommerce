<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ErrorLogResource extends JsonResource
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
            'file' => $this->file,
            'code' => $this->code,
            'line' => $this->line,
            'when' => $this->created_at->diffForHumans(),
            'is_fixed' => $this->fixed ? true : false
        ];
    }
}
