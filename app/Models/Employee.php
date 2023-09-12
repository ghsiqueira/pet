<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
    ];
    
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'funcionarios_id');
    }
}
