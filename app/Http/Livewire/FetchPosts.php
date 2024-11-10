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

    public function deletePost($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            if (Auth::user()->role === 'admin' || $post->user_id === auth()->id()) {
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
