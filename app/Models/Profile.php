<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    const EXCERPT_LENGTH = 100;
    
    protected $fillable = [
        'name', 
        'position', 
        'heading',
        'headline',
        'bio', 
        'ambition', 
        'ambition_icon', 
        'purpose', 
        'purpose_icon', 
        'image_1',
        'image_2',
        'status',
        'is_active',
    ];

    public function excerpt($text)
    {
        return Str::limit($text, Profile::EXCERPT_LENGTH);
    }

    
}
