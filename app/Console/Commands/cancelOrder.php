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
        ->select('id','artistid','userid','title',DB::raw('DATE(DATE_ADD(created_at, INTERVAL delieveryspeed-1 DAY)) as dates'))
        ->get()->toArray();

     

        //print_r($data);die;

        foreach($data as $k=>$v){

            if(date('Y-m-d')==$v->dates){

                $ids[] = $v->id;
               // echo 'yes';

            }
        }
        $update =  DB::table('offer')->whereIn('id',$ids)->update([
            'status'=>'due'
        ]);

        if($update){
            $data = array(
            'created_at'=>now(),
            'updated_at'=>now(),
            'artistid'=>$v->artistid,
            'userid'=>$v->userid,
            'message'=>'Your order' .$v->title.' has expired and your tokens have been returned',
            'notificationfor'=>'user'
            );

            $insert_not = DB::table('notification')->insert($data);

            if($insert_not){

                    $tokens = DB::table('reserved_tokens')->where('Offermediaid',$v->id)->get()->toArray();
                    $update = DB::table('users')->where('id',$v->userid)->update([
                        'tokens' =>  DB::raw('tokens +'.$tokens[0]->tokens),            
                      ]);

                     return  DB::table('reserved_tokens')->where('Offermediaid',$v->id)->delete();
            }

        }

        //return DB::table('cron')->insert(array('name'=>'amit'));
    }
}
