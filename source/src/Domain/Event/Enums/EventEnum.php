<?php

namespace Domain\Event\Enums;

enum EventEnum: string
{
    case Update = 'Событие обновлено';
    case Create = 'Событие создано';
}
