<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchandiseModel extends Model
{
    use HasFactory, SoftDeletes;
 
    protected $table = "merchandise";

    protected $fillable = [
        'uuid',
        'user_id',
        'nama',
        'deskripsi',
        'thumbnail',
        'harga',
        'stok',
    ];

    public static function filters(){
        $instance = new static();
        return $instance->getConnection()->getSchemaBuilder()->getColumnListing($instance->getTable());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imagesMerchandises()
    {
        return $this->hasMany(imagesMerchandiseModel::class);
    }
}
