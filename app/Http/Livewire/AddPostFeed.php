<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPostFeed extends Component
{
    use WithFileUploads;

    public $body, $coverImage;

    // Updated validation rules to allow both images and videos
    protected $rules = [
        'body' => 'required',
        'coverImage' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480', // max 20MB
    ];

    // Validate only the updated property
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Method to handle storing the post
    public function store()
    {
        $this->validate(); // Validate all properties

        // Handle the upload and store image/video
        $filePath = $this->coverImage->store('posts', 'public'); // Store file in 'public/posts'

        // Create a new post in the database
        auth()->user()->posts()->create([
            'image' => $filePath, // Store file path in the database
            'body' => $this->body,
        ]);

        // Flash success message and reset fields
        session()->flash('success', 'Post created successfully');
        $this->body = '';
        $this->coverImage = '';
    }

    // Render the view for this component
    public function render()
    {
        return view('livewire.add-post-feed');
    }
}
