<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CommentComponent extends Component
{
    public Post $post;
    public Comment $comment;
    public bool $saved =false;
    public bool $showReplies = false;
    public bool $readCommentsOnly = false;
    public int|null $replyCommentId = null;
    public bool $replyMode = false;

    protected $listeners = ['refreshComments' => '$refresh'];

    protected array $rules = [
        'comment.parent_id' => 'nullable',
        'comment.body'  => 'required|min:60|max:5000',
    ];

    protected array $messages = [
        'comment.body.required' => 'Please share some words',
        'comment.body.min' => 'Please enter more that 60 characters',
        'comment.body.max' => 'Your Comment must not exceed 5000 characters',
    ];

    public function mount()
    {
       $this->comment = Comment::make();
    }

    public function store()
    {
        if ($this->replyCommentId != null){
            $this->comment['parent_id'] = $this->replyCommentId;
        }

        $this->validate();

        $this->post->comments()->save($this->comment);

        $this->resetComponent();

        $this->saved = true;
    }

    public function resetComponent()
    {
        $this->mount();
        $this->replyCommentId = null;
        $this->replyMode = false;
        $this->emit('refreshComments');
    }

    public function reply($commentId)
    {
        $this->replyCommentId = $commentId;

        $this->replyMode = true;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.comment-component', [
           'comments' => $this->post->comments,
        ]);
    }
}
