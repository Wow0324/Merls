@extends('layouts.customer.app')

@section('content')

<section class="customer-dashboard dashboard pt20">
    <div class="container">

        <section class="heading bcblack bdr9 white mb30">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6 d-flex align-items-center">
                    <a href="#choose-property" class="fancybox-inline"><img src="{{asset('img/dropdown-icon.png')}}"></a>
                    <h1 class="fs32 mb0 ml20">{{$activeProperty ? $activeProperty->name : ''}}</h1>
                </div>
                <div class="col-sm-6 text-right d-flex align-items-center justify-content-end">
                    <a href="#edit-property" class="edit-property mr30 fancybox-inline"><img src="{{asset('img/edit-icon-white.png')}}"></a> 
                    <a href="#add-property" class="add-property fancybox-inline"><img src="{{asset('img/add-icon-white.png')}}"></a>
                </div>
            </div>
        </section>

        <section class="status mb30">
            <div class="row">
                <div class="col-sm-6">
                    <div class="inner">
                        <div class="{{$activeProperty->approved == 1 ? 'satatus-approved' : ''}} fs24 lh1-2">
                            <b class="block">Status</b>
                            <span class="{{$activeProperty->approved == 1 ? 'green' : 'red'}}">
                                {{$activeProperty && $activeProperty->approved == 0 ? 'Pending' : ( $activeProperty->approved == 1 ? 'Approved' : 'Denied')}}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="inner">
                        <div class="jurisdiction fs24 lh1-2">
                            <b class="block">Jurisdiction</b>
                            <span class="{{$activeProperty->jurisdiction != '' ? 'gray' : 'red'}}">
                                {{$activeProperty && $activeProperty->jurisdiction != '' ? $activeProperty->jurisdiction : 'Not Added'}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="users-list bdgray bdr9 mb30">
            <div class="heading bdr9 bcgray white">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <b class="fs24">Global Authorized Users</b>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#add-user" class="add-user fancybox-inline"><img src="{{asset('img/add-icon-white.png')}}"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-sm-12">
                        @if (count($authorUsers) > 0)
                            <table class="width100p users-table fs24">
                                <tbody>
                                @foreach ($authorUsers as $author)
                                    <tr id="author{{$author->id}}" data-id="{{$author->id}}">
                                        <td>{{$author->name}}</td>
                                        <td>{{$author->phone}}</td>
                                        <td>
                                            <a href="#edit-user" class="edit-user fancybox-inline" onclick="showEditLayout('author{{$author->id}}')">
                                                <img src="{{asset('img/edit-icon.png')}}">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center fs24 pt-20">no results</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="mb30">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner">
                        {{ $authorUsers->links('layouts.pagination_custom') }}
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

<footer>

    @include('layouts/navbar_main')
    @include('layouts/profile_edit')
    @include('layouts/property_edit')
    @include('layouts/property_add_customer')
    @include('layouts/author_add')
    @include('layouts/author_edit')
    @include('layouts/choose_property')

</footer>
@endsection
