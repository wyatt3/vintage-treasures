<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = ['imageName'];

    public function imagePath() {
        return 'img/gallery/' . $this->imageName;
        
    }
}
