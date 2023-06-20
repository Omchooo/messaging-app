<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPost extends Component
{
    use WithFileUploads;

    public $image;

    // public function rules()
    // {
    //     return [
    //         'image' => 'image|max:2048',
    //     ];
    // }

    public function render()
    {
        return view('livewire.upload-post');
    }

    public function updatedImage()
    {
        $validator = Validator::make(
            ['image' => $this->image],
            ['image' => 'image|mimes:jpeg,png,jpg|max:1024']
        );

        if ($validator->fails()) {
            $this->reset(['image']);
            $this->addError('image', 'Please upload a valid image file (JPEG, PNG, JPG).');
        } else {
            $this->resetErrorBag('image');
        }
    }

    // public function updatedImage()
    // {
    //     $this->validate([
    //         'image' => 'image|max:2048',
    //     ]);
    // }

    // public function save()
    // {
    //     $this->validate([
    //         'image' => 'required|image|max:2048',
    //         'description' => 'required|string',
    //     ]);

    //     // Store the uploaded image
    //     $imagePath = $this->image->store('images');

    //     // Save the post details to the database
    //     $post = new Post();
    //     $post->image = $imagePath;
    //     $post->description = $this->description;
    //     $post->save();

    //     // Reset form fields
    //     $this->reset(['image', 'description']);

    //     // Show a success message
    //     session()->flash('success', 'Post created successfully.');
    // }
}
