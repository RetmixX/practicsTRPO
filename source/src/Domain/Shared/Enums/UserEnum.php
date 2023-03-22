<?php

namespace Domain\Shared\Enums;

enum UserEnum: string
{
    case Create = 'Пользователь создан';
    case Approve = 'Пользователь подтвержден';
}
