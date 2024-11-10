<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FetchPosts extends Component
{
    public function render()
    {
        // Fetch all posts with related user and likes
        $posts = Post::with('user')->with('likes')->latest()->get();
        return view('livewire.fetch-posts', compact('posts'));
    }

    public function addLikeToPost($post_id)
    {
        $user_id = auth()->id();
        $checkLiked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
        
        if ($checkLiked) {
            Like::where('user_id', $user_id)->where('post_id', $post_id)->delete();
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $post_id
            ]);
        }
    }

    // Method to delete a post
    public function deletePost($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            // Check if the user is admin or the post belongs to the current user
            if (Auth::user()->role === 'admin' || $post->user_id === auth()->id()) {
                // Delete the post along with related likes
                $post->likes()->delete();
                $post->delete();
                session()->flash('message', 'Post deleted successfully!');
            } else {
                session()->flash('error', 'You are not authorized to delete this post.');
            }
        } else {
            session()->flash('error', 'Post not found.');
        }
    }
}
