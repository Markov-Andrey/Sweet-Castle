<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comment extends Component
{
    public $model;
    public $text;

    protected $rules = [
        "text" => ["required", "string"],
    ];

    public function add()
    {
        $this->validate();

        $this->model->comments()->create([
            'user_id' => auth('web')->id(),
            'text' => $this->text,
        ]);

        $this->model->refresh();

        $this->reset('text');
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
