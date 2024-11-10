<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPostFeed extends Component
{
    use WithFileUploads;

    public $body, $coverImage;

    protected $rules = [
        'body' => 'required',
        'coverImage' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480', // max 20MB
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate(); 

        $filePath = $this->coverImage->store('posts', 'public');

        auth()->user()->posts()->create([
            'image' => $filePath,
            'body' => $this->body,
        ]);

        session()->flash('success', 'Post created successfully');
        $this->body = '';
        $this->coverImage = '';
    }

    public function render()
    {
        return view('livewire.add-post-feed');
    }
}
