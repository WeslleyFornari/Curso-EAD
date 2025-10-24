<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use URL;
use Image;
use File;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Media extends Model
{
    protected $table = 'media';
    protected $appends = array('CheckTypeFile');
    protected $fillable = [
        'id',
        'file',
        'alt',
        'type',
        'folder_parent',
        'folder',
        'empresa_id'
  
    ];


    protected static function boot(){
        parent::boot();
      return static::addGlobalScope(new EmpresaScope);
   }

    public function fullpatch($width = null, $height = null)
    {
        return URL::to('/') . '/'. $this->folder_parent . $this->folder . $this->file ?? null;
    }

    public function getCheckTypeFileAttribute()
    {
        return $this->CheckType();
    }
    
    public function CheckType()
    {
        $type = $this->type;
        if (in_array(strtolower($type), ['jpg', 'png', 'gif', 'tif', 'svg', 'webp', 'jpeg'])) {
            return "image";
        } elseif (in_array($type, ['mov', 'mp4', 'avi', '3gp'])) {
            return "video";
        } elseif (in_array($type, ['pdf', 'word', 'ppt', 'xls'])) {
            return "document";
        } else {
            return "outher";
        }
    }

    public function cover(){


            $file = public_path($this->folder_parent . $this->folder . $this->file);

            $manager = new ImageManager(Driver::class);
            $image = $manager->read($file);

            $image->cover(360, 480);

            $base64 = base64_encode($image->toJpeg(90));

            $dataUrl = 'data:image/jpeg;base64,' . $base64;
            return $dataUrl;


    }
}
