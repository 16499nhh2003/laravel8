@extends('layouts.admin')
@section('title','Category List')
@section('main')
<form action=""  class="form-inline md-form mr-auto m-4">
    <input class="form-control mr-sm-2" name="keyword" type="text" placeholder="Search" aria-label="Search" >
    <button class="btn btn-primary btn-rounded btn-sm my-0" type="submit"><i class="fas fa-search"></i></button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Total Product</th>
            <th>Status</th>
            <th>Created Date</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $dt)
        <tr>
            <td>{{$dt->id}}</td>
            <td>{{$dt->name}}</td>
            <td>{{$dt->products->count()}}</td>
            <td>
                @if($dt->status === 0)
                <span class="badge badge-danger">Hide</span>
                @else
                <span class="badge badge-success">Show</span>
                @endif
            </td>
            <td>{{$dt->created_at->format('d-m-Y')}}</td>
            <td class="text-right">
                    <a href="#" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{route('category.destroy',$dt->id)}}" class="btn btn-sm btn-danger btndelete">
                        <i class="fas fa-trash"></i>
                    </a>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
<form method="POST" action="{{route('category.destroy',$dt->id)}}" id="form-delete">
    @csrf @method('DELETE')
</form>
<hr>
<div style="float:right">
<!-- Store argument keyword in url -->
{{$data->appends(request()->query())->links() }}
</div>
@stop()

@section('js')
<script>
    $('.btndelete').on('click',function(ev){
        ev.preventDefault();
        let _href = $(this).attr('href');
        $('form#form-delete').attr('action',_href);
        if(confirm('Xóa không ?')){
            $('form#form-delete').submit();
        }
    })
</script>
@stop()
