<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class Files extends Model
{
    //
    protected $table = "files";
    protected $primaryKey = 'file_id';


    public function index()
	{
		$entries = Fileentry::all();

		return view('fileentries.index', compact('entries'));
	}

	public function add() {

		$file = Request::file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$entry = new Fileentry();
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;

		$entry->save();

		return redirect('fileentry');

	}

  public static function AddImage($photo_file, $user_id)
  {
      if ($photo_file != null)
      {
          Files::isPhoto($user_id);
          $extension = $photo_file->getClientOriginalExtension();
          Storage::disk('public')->put($photo_file->getFilename().'.'.$extension,  File::get($photo_file),'public');
          $entry = new Files();
          $entry->mime = $photo_file->getClientMimeType();
          $entry->originalname = $photo_file->getClientOriginalName();
          $entry->filename = $photo_file->getFilename().'.'.$extension;
          $entry->user_id = $user_id;
          $entry->size = filesize($photo_file);
          $entry->save();
          return True;
      }
      return False;
  }

  public static function isPhoto($user_id)
  {
      $file = Files::where('user_id' , $user_id)
                      ->where('mime','image/jpeg')
                      ->orWhere('mime','image/png');
      if ( $file != null )
      {
        if (count($file->get()) > 0)
          Storage::delete($file->get()[0]->filename);
        $file->delete();
        return True;
      }
      return False;
  }

}
