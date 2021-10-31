@extends('admin.layouts.master')

@section('content')
<div class="content p-2">
    <div class="d-flex justify-content-between align-items-center p-2">
        <strong class="font-weight-bold" style="font-size:20px">مشاهده سفارش ها </strong>
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
                                   <th>عنوان سفارش</th>
                                   <th>نام</th>
                                   <th>نام خانوادگی</th>
                                   <th>شماره تماس</th>
                                   <th>کد سفارش</th>
                                   <th>آدرس</th>
                                   <th>ادمین</th>
                                   <th>وضعیت</th>
                                   <th>تاریخ دریافت</th>
                                   <th></th>
                               </thead>
                               <tbody>
                                   @foreach ($orders as $key=>$order)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>{{$order->user->family}}</td>
                                            <td>{{$order->user->mobile}}</td>
                                            <td>{{$order->code}}</td>
                                            <td>{{$order->address->id}}</td>
                                            <td>{{$order->admin->name}}</td>
                                            <td>{{$order->status->name}}</td>
                                            <td>{{getjalaliDate($order->delivery_date)}}</td>
                                            <td><a href="{{route('panel.waste_orders.show',$order->id)}}" class="btn btn-success btn-sm" target="_blank" rel="noopener noreferrer">مشاهده جزئیات سفارش</a></td>
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
