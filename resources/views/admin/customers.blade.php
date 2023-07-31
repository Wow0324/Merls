@extends('layouts.admin.app')

@section('content')

<section class="admin-dashboard dashboard pt20">
    <div class="container">

        <section class="heading bcred bdr9 white mb30 search-div">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-4 d-flex align-items-center">
                    <a href="#choose-property" class="fancybox-inline"><img src="{{asset('img/dropdown-icon.png')}}"></a><h1 class="fs32 mb0 ml20">Customers</h1>
                </div>
                <div class="col-sm-8 text-right">
                    <form class="search-form site-form mb0">
                        <fieldset class="d-flex align-items-center justify-content-end">
                            <input type="search" value="{{$search}}" placeholder="" name="" id="search-key" class="lightgray">
                            <button onclick="searchCustomers()" type="button" class="btn">Search</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

        <section class="users-list user-search-results bdgray bdr9 mb30">
            <div class="heading bdr9 bcgray white">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <b class="fs24">Customers</b>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#add-customer" class="add-user fancybox-inline" onclick="initCustomerAddErrorValidation()">
                            <img src="{{asset('img/add-icon-white.png')}}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (count($customers)>0)
                        <table class="width100p users-table fs24">
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr id="customer{{$customer->id}}" data-id="{{$customer->id}}" data-status="{{$customer->status}}">
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->status == 0 ? 'Pending' : ($customer->status == 1 ? 'Approved' : 'Denied')}}</td>
                                        <td class="text-right">
                                            <a href="#approve-customer" class="add-user fancybox-inline" onclick="showApproveCustomerLayout('customer{{$customer->id}}')">
                                                <img src="{{asset('img/check-green.png')}}">
                                            </a>
                                            <a href="#delete-customer" class="add-user fancybox-inline" onclick="showDeleteCustomerLayout('customer{{$customer->id}}')">
                                                <img src="{{asset('img/delete-icon.png')}}">
                                            </a>
                                            <a href="#edit-customer" class="add-user fancybox-inline" onclick="showEditCustomerLayout({{$customer->id}})">
                                                <img src="{{asset('img/edit-icon.png')}}">
                                            </a>
                                            <a href="#show-customer" class="add-user fancybox-inline" onclick="showCustomerLayout({{$customer->id}})">
                                                <img src="{{asset('img/info-icon.png')}}">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center fs24 pt-20">
                            @if ($search != '')
                                I searched {{$search}} and it gave me no results.    
                            @else
                                no results
                            @endif
                        </p>
                    @endif
                </div>
            </div>
        </section>

        <section class="mb30">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner">
                        {{ $customers->links('layouts.pagination_custom') }}
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

<footer>

    @include('layouts/navbar_main')
    @include('layouts/navbar_sub')
    @include('layouts/profile_edit')
    @include('layouts/property_add_admin')
    @include('layouts/author_add')
    @include('layouts/customer_show')
    @include('layouts/customer_add')
    @include('layouts/customer_edit')
    @include('layouts/customer_delete')
    @include('layouts/customer_status')
    @include('layouts/dispatcher_add')
</footer>
@endsection
