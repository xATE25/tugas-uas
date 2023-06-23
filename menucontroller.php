<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\menu;
use Illuminate\Support\Facades\Validator;

class menucontroller extends Controller
{
        public function getmenu()
        {
            $dt_menu=menu::get();
            return response()->json($dt_menu);
        }

        public function getid($id)
    {
        $dt_menu=menu::where('id_menu','=',$id)->get();
        return response()->json($dt_menu);
    }

        public function createmenu(Request $req){
            $validate = Validator::make($req->all(),[
                'nama_menu'=>'required',
                'harga'=>'required',
                'jenis'=>'required'
            ]);
            if($validate->fails()){
                return response()->json($validate->errors()->toJson());
            }
            $create = menu::create([
                'nama_menu'=>$req->nama_menu,
                'harga'=>$req->harga,
                'jenis'=>$req->jenis
            ]);
            if($create){
                return response()->json(['status'=>true, 'message'=>'Sukses menambah data menu.']);
            }else{
                return response()->json(['status'=>false, 'message'=>'Gagal menambah data menu.']);
            }
        }    
        public function updatemenu(Request $req, $id){
            $validate = Validator::make($req->all(),[
                'nama_menu'=>'required',
                'harga'=>'required',
                'jenis'=>'required'
        
            ]);
            if($validate->fails()){
                return response()->json($validate->errors()->toJson());
            }
            $update = menu::where('id_menu',$id)->update([
                'nama_menu'=>$req->get('nama_menu'),
                'harga'=>$req->get('harga'),
                'jenis'=>$req->get('jenis')
                
            ]);
            if($update){
                return response()->json(['status'=>true,  'message'=>'Berhasil mengubah data menu']);
            }else{
                return response()->json(['status'=>false, 'message'=>'Gagal mengubah data menu']);
            }
        }
        public function deletemenu($id){
            $delete = menu::where('id_menu',$id)->delete();
            if($delete){
                return response()->json(['status'=>true, 'message'=>'Sukses menghapus data menu.']);
            }else{
                return response()->json(['status'=>false, 'message'=>'Gagal menghapus data menu.']);
            }
        }
    
    
}
