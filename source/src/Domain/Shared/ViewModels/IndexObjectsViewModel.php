<?php

namespace Domain\Shared\ViewModels;

use Domain\Shared\Models\BaseModel;
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
