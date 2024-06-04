<?php


namespace app\Solid;

use Illuminate\Support\Facades\DB;

class HumanIntelligenceReport
{
    public function export($format = 'cvs'){
        $intelligence = DB::table('human_intelligences')->get();

        if ($format == 'pdf') {
            return 'pdf format';
        }
        return 'CVS format';
    }

}