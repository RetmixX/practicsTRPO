<?php

namespace Domain\Shared\ViewModels\CRUD;

use Domain\Shared\ViewModels\ViewModel;
use Spatie\LaravelData\Data;

class UpdateObjectViewModel extends ViewModel
{
    public function __construct(
        public readonly Data $data,
        public readonly string $message,
    ) {
    }

    public function message(): string
    {
        return $this->message;
    }

    public function updateObject(): Data
    {
        return $this->data;
    }

}
