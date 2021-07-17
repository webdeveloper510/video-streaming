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
        ->select('id','artistid','userid','status','title',DB::raw('DATE(DATE_ADD(created_at, INTERVAL delieveryspeed DAY)) as dates'))
        ->where('userid','!=',0)
        ->get()->toArray();
        
           $data1 = DB::table('offer')
        ->select('id','artistid','userid','status','title',DB::raw('DATE(DATE_ADD(created_at, INTERVAL delieveryspeed+1 DAY)) as dates1'))
        ->where('userid','!=',0)
        ->get()->toArray();

     

        //print_r($data);die;

        foreach($data as $k=>$v){

            if(date('Y-m-d') == $v->dates && ($v->status=='new' || $v->status=='process')){

                $ids[] = $v->id;
                $update =  DB::table('offer')->where('id',$v->id)->update([
                    'status'=>'due'  
                ]);
               // echo 'yes';

            }
        }
  
           foreach($data1 as $k=>$v){

            if(date('Y-m-d')==$v->dates1 && ($v->status!='verifying' && $v->status!='delivered' && $v->status!='Cancelled')){
                
            $date = $v->dates1;
        $thirtyDaysUnix = strtotime('+30 days', strtotime($date));
         $expiryDate = date("Y-m-d", $thirtyDaysUnix);

            $ids1 = $v->id;
             $update1 =  DB::table('offer')->where('id',$ids1)->update([
            'status'=>'Expired'
             ]);
             

        if($update1){
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

                    $tokens = DB::table('reserved_tokens')->where('customer_order_id',$v->id)->get()->toArray();
                    $update = DB::table('users')->where('id',$v->userid)->update([
                        'tokens' =>  DB::raw('tokens +'.$tokens[0]->tokens),            
                      ]);
                      
                            if(date('Y-m-d')==$expiryDate){
                            
                             $update = DB::table('offer')->where('id',$v->id)->update([
                           'deliever_media' =>'',
                           'userid'=>0
                           ]);
                                      
                        }

                     return  DB::table('reserved_tokens')->where('customer_order_id',$v->id)->delete();
                     
                  

            }

        }

            }

        }

 

        //return DB::table('cron')->insert(array('name'=>'amit'));
    }
}
