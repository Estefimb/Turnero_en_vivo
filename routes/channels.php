<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::routes();

Broadcast::channel('chat', function ($user) {
    return true; // canal público
});

