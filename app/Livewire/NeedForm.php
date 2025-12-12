<?php

namespace App\Livewire;

use App\Models\Need;
use Livewire\Component;
use Livewire\Attributes\Validate;

class NeedForm extends Component
{
    #[Validate('required|string|max:255')]
    public $item_name = '';

    #[Validate('nullable|string')]
    public $description = '';

    #[Validate('required|integer|min:1')]
    public $quantity = '';

    #[Validate('required|string|max:50')]
    public $unit = '';

    #[Validate('nullable|numeric|min:0')]
    public $estimated_price = '';

    #[Validate('required|date')]
    public $needed_date = '';

    #[Validate('nullable|string')]
    public $notes = '';

    public function save()
    {
        $this->validate();

        Need::create([
            'item_name' => $this->item_name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'estimated_price' => $this->estimated_price,
            'needed_date' => $this->needed_date,
            'notes' => $this->notes,
            'user_id' => auth()->id(),
            'status' => 'pending',
        ]);

        $this->reset();

        $this->dispatch('need-saved');

        session()->flash('message', 'Data kebutuhan berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.need-form');
    }
}
