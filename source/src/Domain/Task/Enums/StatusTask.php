<?php

namespace Domain\Task\Enums;

enum StatusTask: string
{
    case InWork = 'В работе';
    case Cancel = 'Отменен';
    case Done = 'Выполнен';
}
