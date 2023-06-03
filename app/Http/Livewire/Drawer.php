<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Image\Manipulations;
use Spatie\Image\Image;

class Drawer extends Component
{
    use WithFileUploads, AuthorizesRequests;

    public $user;
    public $toggleTab = 1;
    public $image;
    public $bio;
    public $theme;
    public $success = false;


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

    public function updateBio()
    {

        $this->validate([
            'bio' => 'nullable|string|max:255',
        ]);
        // dump($this->bio);
        if ($this->user->bio === $this->bio) {
            $this->success = false;

            request()->session()->flash('statusBio', 'Please change your description');
        } else {
            $this->success = true;

            $this->user->bio = $this->bio;
            $this->user->save();

            $this->bio = '';

            request()->session()->flash('statusBio', 'Successfully updated description');
        }

    }
}
