<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Image\Manipulations;
use Spatie\Image\Image;

class Drawer extends Component
{
    use WithFileUploads;

    public $user;
    public $toggleTab = 1;
    public $image;
    public $theme;

    public function render()
    {

        return view('livewire.drawer');
    }

    public function changeTab($value)
    {
        $this->toggleTab = $value;
    }

    public function uploadImage()
    {
        $this->validate([
            'image' => 'image'
        ]);

        if ($this->user->getFirstMediaUrl('profile')) {
        $this->user->clearMediaCollection('profile'); //delete previous image

        }


        // Image::load($this->image)->fit(Manipulations::FIT_CROP, 50, 50)->format(Manipulations::FORMAT_PNG)->save();
        // $this->image->crop(Manipulations::CROP_CENTER, 50, 50);
        $this->user->addMedia($this->image)->toMediaCollection('profile');

        // $this->image = $this->user->getFirstMediaUrl('profile');

        if ($this->image) {
            // $this->image = null;
            request()->session()->flash('status', 'Successfully uploaded');
        }


        // dump($this->validated());
        // $post = $request->getData();
        // dump($request->getData());
        // return redirect()->route('posts.create')->with('message', 'Post has been successfully published');
    }
}
