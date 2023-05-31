@extends('layouts.admin')
@section('title','Add Product')
@section('main')
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-fuild mt-2">
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="name">Tên Sản phẩm</label>
                    <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="name">
                    @error('name')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="3" placeholder="" id="summernote" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Danh sách ảnh</label>
                    <input type="hidden" class="form-control" id="image_list" placeholder="" name="image_list" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="" id="basic-addon2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_image_list">
                            <i class="fas fa-folder"></i>
                        </button>
                    </span>
                    <!-- Image List -->
                    <div id="show_dialog_list" class="row"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name="category_id">
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Giá sản phẩm</label>
                    <input type="text" class="form-control" id="price" placeholder="" name="price">
                </div>
                <div class="form-group">
                    <label for="name">Giảm giá</label>
                    <input type="text" class="form-control" id="sale" placeholder="" name="sale_price">
                </div>
                <div class="form-group">
                    <label for="name">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="1">
                        <label class="form-check-label">Hiển thị</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" checked="" value="0">
                        <label class="form-check-label">Ẩn</label>
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="image" placeholder="" name="file_upload" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append" style="height:38px">
                                <span class="input-group-text" id="basic-addon2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-folder"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <img id="img_image" style="width:60%" src="">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
</form>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('public/filemanager/dialog.php?field_id=image')}}" style="width:100%;height:500px;overflow-y:auto"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_image_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('public/filemanager/dialog.php?field_id=image_list')}}" style="width:100%;height:500px;overflow-y:auto"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@stop()

@section('css')
<link rel="stylesheet" href="{{url('public/ad123')}}/plugins/summernote/summernote-bs4.min.css">
@stop()

@section('js')
<script src="{{url('public/ad123')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote({
            height: 200,
        })
    })

    $('#exampleModal').on('hidden.bs.modal', function(e) {
        let _link = $('input#image').val();
        let _img = "{{url('public/uploads')}}" + '/' + _link;
        $('img#img_image').attr('src', _img);
    })

    $('#modal_image_list').on('hidden.bs.modal', function(e) {
        let _link = $('input#image_list').val();
        let _html = '';
        if (/^[\],:{}\s]*$/.test(_link.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
            let _args = $.parseJSON(_link);
            for (let i = 0; i < _args.length; i++) {
                let _url = "{{url('public/uploads')}}" + '/' + _args[i];
                _html += `<div class="col-md-4"><img src="${_url}" style="width:100%"></div>`;
            }
        } else {
            let _url = "{{url('public/uploads')}}" + '/' + _link
            _html += `<div class="col-md-4"><img src="${_url}" style="width:100%"></div>`;
        }
        $('#show_dialog_list').html(_html);
    })
</script>
@stop()