<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentComponent extends Component
{
    public Post $post;
    public Comment $comment;
    public bool $saved =false;
    public bool $showReplies = false;
    public bool $readCommentsOnly = false;
    public int|null $replyCommentId = null;

    protected $listeners = ['refreshComponent' => '$refresh'];

    protected $rules = [
        'comment.parent_id' => 'nullable',
        'comment.body'  => 'required|min:60|max:5000',
    ];

    protected $messages = [
        'comment.body.min' => 'Please Enter more that 60 to words',
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
        $this->emit('refreshComponent');
    }

    public function reply($commentId)
    {
        $this->replyCommentId = $commentId;
    }

    public function render()
    {
        return view('livewire.comment-component', [
           'comments' => $this->post->comments,
        ]);
    }
}
