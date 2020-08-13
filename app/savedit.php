<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class savedit extends Model
{
    protected $table = 'categories';
    public $timestamps = false;

    public function SaveNew($data = []){
       DB::table($this->table)->insertGetId($data);
        
    }

    public function SaveUpdate($id,$dataSave){
        //........
        DB::table($this->table)
            ->where('id',$id)
            ->update($dataSave);
    }
    public function dele($id){
        DB::table($this->table)
        ->where('id' , '=' , $id)
        ->delete();
     }

}
