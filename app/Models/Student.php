<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable =['last_name', 'first_name', 'dob','age','address','gender','email','year', 'course', 'pic'];

    protected $appends = ['picUrl'];
    public function getPicUrlAttribute() {
        $url = $this->pic ? asset("images/students_pics/" . $this->pic) :  "https://512pixels.net/downloads/macos-wallpapers-thumbs/10-14-Night-Thumb.jpg";
        return $url;
    }
}
