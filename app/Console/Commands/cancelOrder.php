<?php

namespace App\Console\Commands;


use Carbon\Carbon;

use Illuminate\Console\Command;
use DB;
class cancelOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancel:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
        $data = DB::table('offer')
        ->select('id',DB::raw('DATE(DATE_ADD(created_at, INTERVAL delieveryspeed-1 DAY)) as dates'))
        ->get()->toArray();

        //print_r($data);die;

        foreach($data as $k=>$v){

            if(date('Y-m-d')==$v->dates){

                $ids[] = $v->id;
               // echo 'yes';

            }

        }

        return DB::table('offer')->whereIn('id',$ids)->update([
            'status'=>'due'
        ]);

        //return DB::table('cron')->insert(array('name'=>'amit'));
    }
}
