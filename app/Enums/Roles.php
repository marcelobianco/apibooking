<?php

namespace App\Enums;

enum Roles: int
{
    const ROLE_ADMINISTRATOR = 1;
    const ROLE_OWNER = 2;
    const ROLE_USER = 3;
}
