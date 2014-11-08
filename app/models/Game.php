<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Game extends Eloquent {

    protected $table = 'games';

    public $timestamps = false;

    protected $primaryKey = 'gameId';

}
