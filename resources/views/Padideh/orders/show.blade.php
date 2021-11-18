@extends('admin.layouts.master')

@section('content')
<div class="content p-2">
    <div class="d-flex justify-content-between align-items-center p-2">
        <strong class="font-weight-bold" style="font-size:20px">مشاهده جزئیات سفارش</strong>

        <a class="btn btn-secondary waves-effect waves-light" href="{{route('panel.orders.index')}}">بازگشت</a>
    </div>


</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="bg-white shadow-sm rounded mb-4 p-3">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                        <span>وزن سفارش :</span>
                        @foreach ($waste_order->orders as $item)
                            <span class="fa-num">{{ number_format($item->weight , 3) }} کیلوگرم</span>

                        @endforeach
                    </div>
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                        <span>مبلغ سفارش :</span>
                        @foreach ($waste_order->orders as $item)
                            <span class="fa-num">{{ number_format($item->price) }} تومان</span>
                        @endforeach

                    </div>
                    <hr/>
                    <div class="d-flex justify-content-between align-items-center flex-wrap text-dark">
                        <strong>مبلغ قابل پرداخت :</strong>
                        <strong class="fa-num">{{ number_format($waste_order->getFinalPrice()) }} تومان</strong>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-8">
                <div class="bg-white mb-4 shadow-sm rounded">
                    <div class="table-responsive">
                        <table class="table fa-num table-borderless m-0">
                            <tbody>
                            <tr>
                                <td>
                                    <span class="text-secondary">کد سفارش :</span>
                                    <strong class="fa-num">{{ $waste_order->code }}</strong>
                                </td>
                                <td>
                                    <span class="text-secondary">وضعیت :</span>
                                    <strong>{{ $waste_order->status ? $waste_order->status->title : '---'}}</strong>
                                </td>
                                <td>
                                    <span class="text-secondary">تاریخ ثبت :</span>
                                    <strong>{{ getjalaliDate($waste_order->created_at) }}</strong>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="text-secondary">نام و نام خانوادگی :</span>
                                    <strong>{{ $waste_order->user ? $waste_order->user->name : '---' }}</strong>
                                </td>

                                <td>
                                    <span class="text-secondary">شماره موبایل :</span>
                                    <strong>{{ $waste_order->user ? $waste_order->user->mobile : '---' }}</strong>
                                </td>
                                <td>
                                    <span class="text-secondary">تاریخ دریافت :</span>
                                    <strong>{{ getjalaliDate($waste_order->delivery_date) }}</strong>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                    <span class="text-secondary">آدرس :</span>
                                    <strong>{{ $waste_order->address ? $waste_order->address->address : '---' }}</strong>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="row">
                         @foreach($waste_order->orders as $waste_item)
                            <div class="col-12 col-lg-12">
                                <div class="p-2 bg-white d-flex shadow-sm bwaste rounded bwaste-gray-200 mb-3">
                                    {{-- <img src="{{$waste_item->waste->getImage() ?: ''}}" width="30px" height="30" class="rounded-circle" alt=""> --}}
                                    <div class="d-flex flex-grow-1 flex-column justify-content-between">
                                        <div>
                                            <p class="m-0">{{ $waste_item->pasmand ? $waste_item->pasmand->name : '---' }}</p>

                                        </div>
                                        <div class="d-flex justify-content-between align-items-center text-gray-500 fa-num">
                                            <small>{{ $waste_item->weight }} {{$waste_item->vahed}}</small>
                                             <small>{{ number_format($waste_item->price) }} تومان</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
