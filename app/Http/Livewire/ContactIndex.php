<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    public $search;

    public $statusUpdate = false;

    protected $queryString = ['search'];

    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdated' => 'handleUpdated'
    ];

    public function render()
    {
        return view('livewire.contact-index', [
            "contacts" => $this->search == null ? Contact::latest()->paginate($this->paginate) :
            Contact::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)->withQueryString()
        ]);
    }

    public function getContact($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->search = '';

        $this->emit('getContact', $contact);
    }

    public function delete($id)
    {
        if($id){
            $contact = Contact::find($id);
            $contact->delete();
            $this->search = '';

            session()->flash('message', 'Contact was deleted!');
        }
    }

    public function handleStored($contact)
    {
        session()->flash('message', 'Contact ' . $contact['name'] . ' was stored!');
    }

    public function handleUpdated($contact)
    {
        session()->flash('message', 'Contact ' . $contact['name'] . ' was updated!');
    }
}
