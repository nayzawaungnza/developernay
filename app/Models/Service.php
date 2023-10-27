<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    const EXCERPT_LENGTH = 100;

    protected $fillable = ['title','content','image','status'];

    public function excerpt($text)
    {
        return Str::limit($text, Service::EXCERPT_LENGTH);
    }
}
