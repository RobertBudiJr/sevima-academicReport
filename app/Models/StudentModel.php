<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ClassModel;

class StudentModel extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table='student_tb';
    protected $primaryKey='id';
    public $timestamps=false;
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
        'student_name',
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