<?php

namespace App\Services\Impl;


class UploadService
{
    public function UploadFile($data,$fileName,$dir){

        $data->file($fileName);
        if($data->hasFile($fileName)){
            $file = $data->$fileName->getClientOriginalName();
            //Storage::move('old/file1.jpg', 'new/file1.jpg');
           // Request::file('img_filename')->move($updir, $img_name);
            //Storage::disk('local')->put('file.txt', 'Contents');
            if($data->file($fileName)->move('storage/'.$dir,time().$file)){
                $url = 'storage/'.$dir.time().$file;
                return $url;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    public function UploadMulFile($data,$fileName,$dir){
        if($data->file($fileName)){
            $url =[];

            foreach ($data->file($fileName) as $key => $file) {
                 $origName = $file->getClientOriginalName();
                $file->move('storage/'.$dir,time().$origName);

                $url[]= 'storage/'.$dir.'/'.time().$origName;
            }
            return $url;
        }
    }

        public function UploadMultipleFileReturnShazUrl($data,$fileName,$dir){

        if($data->file($fileName)){
            $url =[];

            foreach ($data->file($fileName) as $key => $file) {
                $origName = $file->getClientOriginalName();
                $file->move('storage/'.$dir,time().$origName);

                $url[$key]= 'storage/'.$dir.'/'.time().$origName;
            }
            return $url;
        }
    }



}