<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Consumsion_TaxsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * 
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,   
            'code_province' => $this->code_province,
            'province_name' =>$this->province_name,
            'code_regency_city' => $this->code_regency_city,
            'regency_name_city' => $this->regency_name_city,    
            'number_score_pph' => $this->number_score_pph,
            'unit' => $this->unit,
            'year' => $this->year,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
