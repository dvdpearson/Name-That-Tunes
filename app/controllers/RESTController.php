<?php

class RESTController extends BaseController {

    public function setTeamScore($team, $score)
    {
        $team = User::where('name', $team);
        var_dump($team);
    }

}
