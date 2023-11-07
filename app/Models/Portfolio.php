<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    const EXCERPT_LENGTH = 100;

    protected $fillable = ['user_id','title','website','slug','content','image','status'];
    

    

    public function excerpt($text)
    {
        return Str::limit($text, Portfolio::EXCERPT_LENGTH);
    }

    /**

     * Boot the model.

     */


}
