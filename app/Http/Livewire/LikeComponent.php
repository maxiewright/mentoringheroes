<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LikeComponent extends Component
{
    public object $model;
    public int $count;
    public string $text;

    public function mount($model)
    {
        $this->model = $model;
        $this->count = $model->likeCount();
    }

    public function like()
    {

        if ($this->model->isLikedByViewer()) {

            $this->removeLike();

            $this->count--;

        } elseif (auth()->user()) {

            $this->model->likes()->create([
                'user_id' => auth()->id(),
            ]);

            $this->count++;

        } else {
            $this->model->likes()->create([
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

            $this->count++;
        }
    }

    public function removeLike()
    {
        $ip = request()->ip();
        $userAgent = request()->userAgent();

        if (auth()->user()) {
            $this->model->likes()
                ->where('user_id', auth()->id())
                ->delete();
        }

        if ($this->model->ip = $ip && $this->model->user_agent = $userAgent) {
            $this->model->likes()
                ->whereIp(request()->ip())
                ->whereUserAgent(request()->userAgent())
                ->delete();
        }
    }

    public function isLiked()
    {
        $this->model->isLikedByViewer()
            ? $this->text = 'text-green-400 hover:text-green-500'
            : $this->text = 'text-gray-400 hover:text-gray-500';
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.like-component');
    }
}
