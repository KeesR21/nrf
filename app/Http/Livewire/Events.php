<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Events extends Component
{

    use WithPagination;
    
    public $content;
    public $title;
    public $status;

    public function setModal($event)
    {
        $this->content = $event['description'];
        $this->title = $event['title'];
        $this->status = $event['status'];
        $this->dispatchBrowserEvent('openModal');
    }

    public function render()
    {
        return view('livewire.events',[
            'events' => Event::latest()->paginate(9)
        ]);
    }
}
