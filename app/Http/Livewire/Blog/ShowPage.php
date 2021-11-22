<?php

namespace App\Http\Livewire\Blog;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class ShowPage extends Component
{
    public Post $post;
    public object $categories;
    public string $category = '';

    protected $listeners  = [
        'refreshPost' => '$refresh',
    ];

    public function mount()
    {
        $this->categories = Category::query()->get(['id', 'name']);
    }

    public function updatedCategory(): Redirector|Application|RedirectResponse
    {
        return redirect('/?category='.$this->category);
    }

    public function goToCategory($categoryId): Redirector|Application|RedirectResponse
    {
        return redirect('/?category='.$categoryId);
    }

    public function togglePostLike()
    {
//        dd(auth()->id());
//        dd($this->post->liker);

        // if auth user already liked post remove like record
        if (auth()->user()->is($this->post->liker)){

        }

       dd('no');
        // create like record
        $this->post->likes()->create([
            'user_id' => auth()->id()
        ]);
    }

    public function render()
    {
        return view('livewire.blog.show-page',[
            'previousPost' => Post::where('id', '<', $this->post->id)->orderByDesc('id')->first(),
            'nextPost' => Post::where('id', '>', $this->post->id)->orderBy('id')->first()
        ]);
    }
}
