<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMIN = 1;
    case STUDENT = 2;
    case TEACHER = 3;
}
