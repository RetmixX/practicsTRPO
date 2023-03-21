<?php

namespace Domain\Shared\ViewModels;

use Domain\Shared\Models\BaseModel;

class RetrieveObjectViewModel extends ViewModel
{
    public function __construct(
        public readonly BaseModel $model
    ) {
    }

    public function object()
    {
        return $this->model->getData();
    }
}
