@extends('admin.layouts.master')
@section('content')
<div class="content p-2">
    <div class="d-flex justify-content-between align-items-center p-2">
        <strong class="font-weight-bold" style="font-size:20px">ایجاد وضعیت جدید</strong>
    </div>
    
  

    <div class="row">
        <div class="col-12">
            <div class="card p-2">
                @include('components.messages')
                <form action="{{route('panel.order_status.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="name">عنوان</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" id="title">
                                </div>
                               
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="level">مرحله</label>
                                    <input type="level" name="level" class="form-control"  value="{{old('level')}}" id="link">
                                </div>
                                <div class="col-12 col-lg-12 form-group">
                                    <label for="description">توضیحات</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-12 col-lg-12 form-group">
                                    <label for="notification_dscr">توضیحات</label>
                                    <textarea name="notification_dscr" id="notification_dscr" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                               
                            </div>
                        </div>
                       

                    </div>
                    <button type="submit" class="btn btn-success">ثبت وضعیت</button>
                </form>
            </div>
        </div>
    </div>


</div>

@endsection
