<?php

namespace Domain\Shared\ViewModels\CRUD;

use Domain\Shared\Models\BaseModel;
use Domain\Shared\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class IndexObjectsViewModel extends ViewModel
{
    public function __construct(
        public readonly BaseModel $model
    ) {
    }

    public function objects(): Collection
    {
        return $this->model::all()->map(fn(BaseModel $model) => $model->getData());
    }

}
