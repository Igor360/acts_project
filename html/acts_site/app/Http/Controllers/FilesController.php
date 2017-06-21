<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Controllers\Controller;
use App\Files;

 
use Illuminate\Support\Facades\Auth as Auth; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FilesController extends Controller
{

    public function index()
	{
		$entries = Files::all();
 
		return view('files.index', compact('entries'));
	}
 
	public function add() {
 
		$file = Request::file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$entry = new Files();
		$entry->mime = $file->getClientMimeType();
		$entry->originalname = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;
 		$entry->user_id = Auth::id();
		$entry->save();
 
		return redirect('files');
		
	}

	public function get($filename){
	
		$entry = Files::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('documents')->get($entry->filename);
 
		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
	}
}
