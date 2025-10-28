<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone_no',
        'date_of_birth',
        'blood_group',
        'document_path',
        'other_information',
        'uuid',
    ];

    /**
     * Automatically generate a UUID when creating a new record.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
}
