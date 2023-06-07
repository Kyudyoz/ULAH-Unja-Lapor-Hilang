<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostTable extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.post-table',[
            "posts" =>Post::latest()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->filter(request(['search','user','category']))
            ->paginate(3)
            ->withQueryString()
        ]);
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Mereset halaman ke halaman pertama setiap kali pengguna mengubah nilai pencarian
    }
}
