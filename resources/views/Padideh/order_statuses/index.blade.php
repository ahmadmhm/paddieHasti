@extends('admin.layouts.master')

@section('content')
<div class="content p-2">
    <div class="d-flex justify-content-between align-items-center p-2">
        <strong class="font-weight-bold" style="font-size:20px">مشاهده وضعیت سفارش ها </strong>
        <a href="{{route('panel.order_status.create')}}" class="btn btn-info">ایجاد وضعیت جدید</a>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card p-2 shadow-sm">
               <div class="row">
                   <div class="col-12 ">
                       <div class="justify-content-center align-items-center d-flex">
                           <table class="table table-bordered ">
                               <thead>
                                   <th>#</th>
                                   <th>عنوان </th>
                                   <th>مرحله</th>
                                   <th>توضیحات</th>
                                   <th>توضیحات </th>
                                   <th></th>
                               </thead>
                               <tbody>
                                   @foreach ($order_statuses as $key=>$status)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$status->name}}</td>
                                            <td>{{$status->level}}</td>
                                            <td>{{$status->description }}</td>
                                            <td>{{$status->notification_dscr}}</td>
                                            <td>
                                                <form action="{{route('panel.order_status.destroy',$status->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مایل به حذف هستید؟')" ><i class="ion-ios-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection
