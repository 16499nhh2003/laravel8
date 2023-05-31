@extends('layouts.admin')
@section('title','Edit Category')
@section('main')
<div class="card card-primary col-12">
    <form action="{{route('category.update',$category->id)}}" method="POST">
        @csrf @method('PUT')
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên Danh Mục</label>
                <input type="text" value="{{$category->name}}" class="form-control" id="name" placeholder="Nhập tên danh mục" name="name">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            @php
            $msgRadio1 ="";
            $msgRadio2 ="";
            if($category->status === 1){
            $msgRadio1 = "checked";
            }
            else{
            $msgRadio2 = "checked";
            }
            @endphp
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <span style="margin:25px">
                    <input class="form-check-input" type="radio" name="status" value="1" {{$msgRadio1}}>
                    <label class="form-check-label">Hiển thị</label>
                </span>
                <span>
                    <input class="form-check-input" type="radio" name="status" value="0" {{$msgRadio2}}>
                    <label class="form-check-label">Ẩn</label>
                </span>
            </div>
            <div class="form-group">
                <label for="quantity">Ưu tiên</label>
                <input class="form-control" type="number" id="quantity" name="prioty" min="0" max="100" placeholder="" value="{{$category->prioty}}">
                @error('prioty')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </div>
    </form>
</div>
@stop()