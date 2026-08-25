<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('queue:work --stop-when-empty')
    ->everyMinute()
    ->withoutOverlapping();

Schedule::command('sanctum:prune-expired --hours=24')
    ->dailyAt('01:00');

Schedule::command('activitylog:clean')
    ->dailyAt('01:30');

Schedule::command('auth:clear-resets')
    ->dailyAt('02:00');
