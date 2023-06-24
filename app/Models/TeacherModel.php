<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ClassModel;

class TeacherModel extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table='teacher_tb';
    protected $primaryKey='id';
    public $timestamps=false;

    public function teacher()
    {
        return $this->belongsTo(TeacherModel::class, 'id_teacher');
    }

    public function class()
    {   
        return $this->belongsTo(ClassModel::class, 'id_class');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'teacher_name',
        'id_class',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ...
}