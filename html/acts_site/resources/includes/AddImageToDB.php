<?php
use App\Files;
use App\ArticleFiles;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

function AddImage($photo_file, $user_id)
{
    if ($photo_file != null)
    {
        isPhoto($user_id);
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

function isPhoto($user_id)
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

function AddArticleDocs($photo_file, $user_id)
{
    if ($photo_file != null)
    {
        //isPhoto($user_id);
        $extension = $photo_file->getClientOriginalExtension();
        Storage::disk('documents_article')->put($photo_file->getFilename().'.'.$extension,  File::get($photo_file));
        $entry = new Files();
        $entry->mime = $photo_file->getClientMimeType();
        $entry->originalname = $photo_file->getClientOriginalName();
        $entry->filename = $photo_file->getFilename().'.'.$extension;
        $id = $user_id;
        $entry->user_id = $id;
        $entry->size = filesize($photo_file);
        $entry->save();
        return $entry;
    }

}

function isArticlePhoto($article_id)
{
    $file = ArticleFiles::getImages($article_id);
    if ( $file != null )
    {
      if (count($file) > 0)
        Storage::delete($file[0]->filename);
      Files::where('file_id', $file[0]->file_id)->delete();
      return True;
    }
    return False;
}


?>
