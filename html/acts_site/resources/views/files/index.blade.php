@extends('layouts.app')
@section('content')
   <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Додати етюди</h3></div>

           <div class="row" style="margin-top: 100px;">
    <form action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
        <input type="file" name="filefield">
        <input type="submit">
    </form>
    </div>
 
 <h1> Pictures list</h1>
 <div class="row">
        <ul class="thumbnails">
 @foreach($entries as $entry)
            <div class="col-md-2">
                <div class="thumbnail">
                    <img src="{{route('getenty', $entry->filename)}}r" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$entry->original_filename}}</p>
                    </div>
                </div>
            </div>
 @endforeach
 </ul>
 </div> 

        </div>
    </div>

   

 
@endsection