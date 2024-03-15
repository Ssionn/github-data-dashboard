<?php

use Illuminate\Support\Facades\Auth;
use App\Jobs\StoreAllDetailsInDatabase;
use App\Jobs\StoreAllProjectsInDatabase;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new StoreAllProjectsInDatabase())
    ->everyMinute()
    ->name('store-all-projects')
    ->withoutOverlapping();

Schedule::job(new StoreAllDetailsInDatabase())
    ->everyMinute()
    ->name('store-all-details')
    ->withoutOverlapping();
