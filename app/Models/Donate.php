<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use AutoNumberTrait;

    use HasFactory;

    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'kode' => [
                'format' => function () {
                    return date('Y.m.d') . '/LA/?';
                },
                'length' => 5
            ]
        ];
    }
}
