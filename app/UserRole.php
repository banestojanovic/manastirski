<?php

namespace App;

enum UserRole: int
{
    case SuperAdmin = 1;

    case Admin = 2;

    case User = 3;
}
