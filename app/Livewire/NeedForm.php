<?php

namespace App\Livewire;

use App\Models\Need;
use App\Models\NeedAttachment;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class NeedForm extends Component
{
    use WithFileUploads;
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

    #[Validate('nullable|array|max:5')]
    public $attachments = [];

    public function save()
    {
        $this->validate();

        $need = Need::create([
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

        // Handle file attachments
        if (!empty($this->attachments)) {
            foreach ($this->attachments as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('need-attachments', 'public');

                NeedAttachment::create([
                    'need_id' => $need->id,
                    'file_name' => $fileName,
                    'file_path' => $filePath,
                    'file_type' => $file->getMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        $this->reset();

        $this->dispatch('need-saved');

        session()->flash('message', 'Need saved successfully!');
    }

    public function render()
    {
        return view('livewire.need-form');
    }
}
