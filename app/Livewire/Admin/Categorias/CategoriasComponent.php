<?php

namespace App\Livewire\Admin\Categorias;

use App\Models\Categoria;
use Livewire\Component;

class CategoriasComponent extends Component
{
    public $categoriaId, $nombre;
    public $categorias;

    public function rules()
    {
        return [
            "nombre"=> ["required","string"]
        ];
    }

    public function mount()
{
    $this->categorias = Categoria::all();
}

public function store()
    {

        $this->validate();

        $categorias = new Categoria();
        $categorias->nombre = $this->nombre;
        dd($categorias);
        $categorias->save();

        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->nombre = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatch('close-modal');
    }

    public function render()
    {
        $this->categorias = Categoria::all();

        return view('livewire.admin.categorias.categorias-component', [
            'categorias' => $this->categorias,
        ]);
    }
}


