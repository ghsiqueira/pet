<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';

    protected $fillable = ['funcionario_id', 'services_id', 'data', 'horario'];

    public function funcionario()
    {
        return $this->belongsTo(Employee::class, 'funcionario_id');
    }

    public function servico()
    {
        return $this->belongsTo(Service::class, 'services_id');
    }
}
