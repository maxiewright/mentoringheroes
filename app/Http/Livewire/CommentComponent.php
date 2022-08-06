<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CommentComponent extends Component
{
    public object $model;

    public Comment $comment;

    public bool $saved = false;

    public bool $showReplies = false;

    public bool $readCommentsOnly = false;

    public int|null $replyCommentId = null;

    public bool $replyMode = false;

    protected $listeners = [
        'refreshComponent',
    ];

    protected array $rules = [
        'comment.parent_id' => 'nullable',
        'comment.body' => 'required|min:25|max:5000',
    ];

    protected array $messages = [
        'comment.body.required' => 'Please share some words',
        'comment.body.min' => 'Please share more that 25 characters',
        'comment.body.max' => 'Your Comment must not exceed 5000 characters',
    ];

    public function mount()
    {
        $this->comment = Comment::make();
    }

    public function store()
    {
        if ($this->replyCommentId != null) {
            $this->comment['parent_id'] = $this->replyCommentId;
        }

        $this->validate();

        $this->model->comments()->save($this->comment);

        $this->refreshComponent();

        $this->saved = true;
    }

    public function refreshComponent()
    {
        $this->mount();
        $this->replyCommentId = null;
        $this->replyMode = false;
    }

    public function reply($commentId)
    {
        $this->replyCommentId = $commentId;

        $this->replyMode = true;
    }

    public function cancelReply()
    {
        $this->replyCommentId = null;

        $this->replyMode = false;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.comment-component', [
            'comments' => $this->model->comments,
        ]);
    }
}
