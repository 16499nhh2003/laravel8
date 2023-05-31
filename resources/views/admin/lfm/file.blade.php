@extends('layouts.admin')
@section('title','Dashboard')
@section('main')
<iframe src="{{url('public/filemanager/dialog.php')}}" style="width:100%;height:500px;overflow-y:auto"></iframe>
@stop()