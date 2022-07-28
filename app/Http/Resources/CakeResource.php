<?php

namespace App\Http\Resources;

use App\Models\EmailsCake;
use Illuminate\Http\Resources\Json\JsonResource;

class CakeResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'weight' => $this->weight,
            'value' => $this->value,
            'amount' => $this->amount,
            'emails' => $this->getEmails(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    public function getEmails()
    {
        $objectEmails = EmailsCake::select('emails.email')
            ->join('emails', 'emails.id', '=', 'emails_cakes.email_id')
            ->where('cake_id', $this->id)
            ->get();

        $arrayEmails = [];
        foreach ($objectEmails as $e) {
            array_push($arrayEmails, $e->email);
        }

        return $arrayEmails;
    }
}
