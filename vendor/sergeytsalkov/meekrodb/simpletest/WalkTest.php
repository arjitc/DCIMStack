<?php

class WalkTest extends SimpleTest {
    public function test_1_walk() {
        $Walk = DB::queryWalk("SELECT * FROM accounts");

        $results = array();
        while ($row = $Walk->next()) {
            $results[] = $row;
        }

        $this->assert(count($results) == 8);
        $this->assert($results[7]['username'] == 'vookoo');
    }

    public function test_2_walk_empty() {
        $Walk = DB::queryWalk("SELECT * FROM accounts WHERE id>100");

        $results = array();
        while ($row = $Walk->next()) {
            $results[] = $row;
        }

        $this->assert(count($results) == 0);
    }

    public function test_3_walk_insert() {
        $Walk = DB::queryWalk("INSERT INTO profile (id) VALUES (100)");

        $results = array();
        while ($row = $Walk->next()) {
            $results[] = $row;
        }

        $this->assert(count($results) == 0);

        DB::query("DELETE FROM profile WHERE id=100");
    }

    public function test_4_walk_incomplete() {
        $Walk = DB::queryWalk("SELECT * FROM accounts");
        $Walk->next();
        unset($Walk);

        // if $Walk hasn't been properly freed, this will produce an out of sync error
        DB::query("SELECT * FROM accounts");
    }
}
