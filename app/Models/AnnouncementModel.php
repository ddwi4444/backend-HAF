<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnouncementModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "announcement";

    protected $fillable = [
        'uuid',
        'user_id',
        'post_by',
        'isi',
    ];

    public static function filters(){
        $instance = new static();
        return $instance->getConnection()->getSchemaBuilder()->getColumnListing($instance->getTable());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imagesAnnouncements()
    {
        return $this->hasMany(imagesAnnouncementModel::class);
    }
}
