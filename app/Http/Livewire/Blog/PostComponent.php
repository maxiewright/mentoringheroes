<?php

namespace App\Http\Livewire\Blog;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;

    public object $categories;
    public array $selectedCategories = [];

    protected $listeners = [
       'filterCategories'
    ];

    public function mount()
    {
        $this->categories = Category::all('id', 'name');
    }

    public function filterCategories($id)
    {
        if (($key = array_search($id, $this->selectedCategories)) != false) {
            unset($this->selectedCategories[$key]);
        } else {
            $this->selectedCategories[] = $id;
        }
    }

    public function render()
    {
        return view('livewire.blog.post-component', [

            'posts' => Post::query()
                ->with('categories', 'authors', 'tags')
                ->where(fn($query) => $query->when(!empty($this->selectedCategories), fn($query) => $query->whereIn('id', $this->selectedCategories)
                ))
                ->whereNotNull('published_at')
                ->orderBy('published_at', 'desc')
                ->paginate(6),

            'featuredPost' => Post::query()
                ->with('categories', 'authors', 'tags')
                ->whereNotNull('published_at')
                ->where(function ($query) {
                    $query->where('is_featured', '=', true)
                        ->latest('published_at');
                })->first(),

        ])->layout('components.layout.app');
    }
}
