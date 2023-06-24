<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeacherModel;
use App\Models\ClassModel;

class ArticleModel extends Model
{
    use HasFactory;
    protected $table='article_tb';
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
        'id_teacher',
        'id_class',
        'title',
        'content',
        'published_at',
        'subject'
    ];
}
