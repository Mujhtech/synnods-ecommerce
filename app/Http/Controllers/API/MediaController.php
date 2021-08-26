<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends ApiController
{
    //
    public function index(){

        $directories = Storage::allDirectories('');

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => $directories
        ]);

    }


    public function single(Request $request){

        $directories = Storage::allFiles($request->folder);

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => $directories
        ]);

    }


    public function upload(Request $request){

        if($request->hasFile('file')){

            if($request->name && $request->folder){
                
                $path = $request->file('file')->store($request->folder.'/'.$request->name);
            
            } elseif($request->name){

                $path = $request->file('file')->store('media/'.$request->name);

            } elseif($request->folder){

                $path = $request->file('file')->store($request->folder);

            } else {
                $path = $request->file('file')->store('media');
            }

            

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'File upload successfully',
                'path' => Storage::url($path)
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'File not found'
            ]);

        }

    }


    public function createDirectory(Request $request){

        if(Storage::makeDirectory($request->folder)){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'Directory created successfully',
                'directories' => Storage::allDirectories('')
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'File not found'
            ]);

        }

    }


    public function destroyDirectory(Request $request){

        if(Storage::deleteDirectory($request->folder)){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'Directory remove successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'File not found'
            ]);

        }

    }


    public function destroyFile(Request $request){

        if(Storage::exists($request->file)){

            Storage::delete($request->file);

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'File remove successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'File not found'
            ]);

        }

    }

    
}
