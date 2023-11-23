<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['image'];
    public static function store($request, $id = null)
    {
        // dd(request()->all());
        $data = $request->validate([
            'image' => 'required|image',
        ]);
        $imagePath = $request->file('image')->store('public/assets/img/images');
        $data['image'] = str_replace('public/', '', $imagePath);

        if ($id) {
            return self::where('id',$id)->update($data);
        } else {
            return self::create($data);
        }
   
    }

    public static function croppImage($request, $id = null){
        $data = $request->validate([
            'cropped_image' => 'required', // Remove the image validation rule
        ]);
    
        // Get the base64-encoded image data from the request
        $base64Image = $request->input('cropped_image');

        // Decode the base64 data
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
    
        // Store the image in the specified storage path
        $imageName = 'cropped_image_' . time() . '.png'; // You might want to give it a unique name
        Storage::disk('public')->put($imageName, $imageData);
    
        // Store the image name in the database
        $data['image'] = $imageName;

        if ($id) {
            return self::where('id', $id)->update(['image' => $data['image']]);
        } else {
            return self::create($data);
        }
    }
    
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'media_id', 'id');
    }
    public function staff():HasOne
    {
        return $this->hasOne(Staff::class, 'media_id', 'id');
    }
    public function department(): HasOne
    {
        return $this->hasOne(Department::class, 'media_id', 'id');
    }
    public function slideshow(): HasOne
    {
        return $this->hasOne(Slideshow::class, 'media_id', 'id');
    }
}
