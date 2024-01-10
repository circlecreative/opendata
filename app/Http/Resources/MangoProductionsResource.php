<?php

namespace App\Http\Resources;
use Illuminate\Http\JsonResponse;
use Illuminare\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MangoProductionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
    public function withResponse(Request $request, JsonResponse $jsonResponse): void
    {
        $jsonResponse->header('Message', 'data berhasil diperbarui');
    }
}
