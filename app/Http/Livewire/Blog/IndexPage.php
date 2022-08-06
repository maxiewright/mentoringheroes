<?php

namespace App\Http\Livewire\Blog;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;

    public object $categories;

    public string $category = '';

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function paginationView(): string
    {
        return 'pagination.default';
    }

    public function resetFilters()
    {
        $this->category = '';
        $this->search = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
        $this->emit('refresh');
    }

    public function updatingCategory()
    {
        $this->resetPage();
        $this->emit('refresh');
    }

    public function setCategory($categoryId)
    {
        $this->resetPage();
        $this->category = $categoryId;
    }

    public function mount()
    {
        $this->categories = Category::query()
            ->whereHas('posts')
            ->get(['id', 'slug', 'name']);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.blog.index-page', [
            'posts' => Post::query()
                ->with('categories', 'authors', 'tags')
                ->when($this->category, fn ($query, $filter) => $query
                    ->whereRelation('categories', 'slug', $filter)
                )
                ->when($this->search, fn ($query, $search) => $query
                    ->whereRelation('categories', 'name', 'like', '%'.$search.'%')
                    ->orWhere('title', 'like', '%'.$search.'%')
                    ->orWhere('body', 'like', '%'.$search.'%')
                )
                ->latest()
                ->paginate(6),
        ]);
    }
}
