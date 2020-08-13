<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SaveSlide extends Model
{
    protected $table = 'sliders';
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
        $query = DB::table($this->table);
        $product = $query -> find($id);
        $query->where('id' , '=' , $id)
        ->delete();
        File::delete(public_path() . '/images/' .$product->image);
     }
}
