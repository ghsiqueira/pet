<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agendamento;

class Service extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image'];

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(',', '.', str_replace('.', '', $value));
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'services_id');
    }
}
