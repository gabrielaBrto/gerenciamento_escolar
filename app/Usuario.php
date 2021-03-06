<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{   
    use SoftDeletes;

    protected $table = 'usuario';

    protected $fillable = ['nome', 'email', 'data_nascimento', 'nivel_id'];

    public function nivel(){
        return $this->belongsTo('App\Nivel');
    
    }


    public function materias() {
        return $this->belongsToMany('App\Materia', 'usuario_materia');

        // return $this->belongsToMany('App\Materia', 'usuario_materia')->withPivot('carga_horaria');
        
    }

}
