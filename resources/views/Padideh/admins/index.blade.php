@extends('admin.layouts.master')

@section('content')
<div class="content p-2">
    <div class="d-flex justify-content-between align-items-center p-2">
        <h3>لیست مدیران</h3>
        <a class="btn btn-info" href="{{route('panel.admins.create')}}">ایجاد ادمین</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('components.messages')

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>شماره تماس</th>
                            <th>ایمیل</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت نام</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($admins as $key => $admin)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$admin->name ?: '---'}}</td>
                            <td>{{$admin->family ?: '---'}}</td>
                            <td>{{$admin->mobile ?: '---'}}</td>
                            <td>{{$admin->email ?: '---'}}</td>
                            <td>{!!$admin->get_status() !!}</td>
                            <td>{{ $admin->getjalaliCreatedAtAttribute()}}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info btn-sm" href="{{route('panel.admins.show',$admin->id)}}"><i class="ion-ios-eye"></i></a>
                                    <a class="btn btn-success btn-sm" href="{{route('panel.admins.edit',$admin->id)}}"><i class="dripicons-document-edit"></i></a>
                                    <form action="{{route('panel.admins.destroy',$admin->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('آیا مطمعن هستید؟')" class="btn btn-sm btn-danger"><i class="ion-ios-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
