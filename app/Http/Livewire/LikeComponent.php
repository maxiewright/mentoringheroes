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

    public function mount($model)
    {
        $this->model = $model;
        $this->count = $model->likeCount();
    }

    public function like()
    {
        if ($this->model->isLiked()) {

            $this->model->removeLike();

            $this->count--;

        } elseif (auth()->user()) {

            $this->model->likes()->create([
                'user_id' => auth()->id(),
            ]);

            $this->count++;

        } elseif (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {

            $this->model->likes()->create([
                'ip' => $ip,
                'user_agent' => $userAgent,
            ]);

            $this->count++;
        }
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.like-component');
    }
}
