<?php

namespace Domain\Shared\ViewModels\CRUD;

use Domain\Shared\Models\BaseModel;
use Domain\Shared\ViewModels\ViewModel;
use Spatie\LaravelData\Contracts\DataObject;

class RetrieveObjectViewModel extends ViewModel
{
    public function __construct(
        public readonly BaseModel $model
    ) {
    }

    public function object(): DataObject
    {
        return $this->model->getData();
    }
}
