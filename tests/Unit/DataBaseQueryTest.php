<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;

class DataBaseQueryTest extends TestCase
{
    /** @test */
    public function checking_select_query()
    {
        $email = DB::table('users')
            ->select('email','name')->get();//select name and email columns from users table

    }
}
