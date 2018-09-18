<?php namespace Controllers;

use Inc\Auth;
use Inc\DB;
use Inc\Perms;
use Inc\STG;

class verify extends _controller
{

    public function index()
    {
        $user = DB::o("
            SELECT us.*,
                   mo.url mo_url
            FROM users us
              JOIN roles ro ON ro.id = us.id_role
                LEFT JOIN modules mo ON mo.id = ro.id_module
        ");

        return rsp(true)
            ->set('user', Auth::user())
            ->set('menu', Perms::menuSorted())
            ->set('stg', STG::all())
            ->set('home', $user->mo_url);
    }

}