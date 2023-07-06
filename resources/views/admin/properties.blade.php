@extends('layouts.admin.app')

@section('content')

<section class="admin-dashboard dashboard pt20">
    <div class="container">

        <section class="heading bcblack bdr9 white mb30">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-9 d-flex align-items-center">
                    <h1 class="fs32 mb0 ml20">{{$activeProperty ? $activeProperty->name : ''}}</h1>
                </div>
                <div class="col-sm-3 text-right">
                    <a href="#choose-property" class="fancybox-inline"><img src="{{asset('img/dropdown-icon.png')}}"></a>
                </div>
            </div>
        </section>

        <section class="status mb30">
            <div class="row">
                <div class="col-sm-6">
                    <div class="inner">
                        <div class="row  align-items-center">
                            <div class="col-sm-9">
                                <div class="satatus-approved fs24 lh1-2">
                                    <b class="block">Status</b>
                                    <span class="green">
                                        {{$activeProperty && $activeProperty->approved == 0 ? 'Pending' : ( $activeProperty->approved == 1 ? 'Approved' : 'Denied' )}}
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-3 text-right">
                                <a href="#property-status" class="edit-user fancybox-inline"><img src="{{asset('img/edit-icon.png')}}"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="inner">
                        <div class="row align-items-center">
                            <div class="col-sm-10">
                                <div class="jurisdiction fs24 lh1-2">
                                    <b class="block">Jurisdiction</b>
                                    <span class="gray" id="jurisdiction-value">{{$activeProperty ? $activeProperty->jurisdiction : ''}}</span>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a href="#property-jurisdiction" class="edit-user fancybox-inline" onclick="showEditJurisdictionLayout()">
                                    <img src="{{asset('img/edit-icon.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="users-list user-search-results bdgray bdr9 mb30">
            <div class="heading bdr9 bcgray white">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <b class="fs24">Authorized Users</b>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#add-user" class="add-user fancybox-inline"><img src="{{asset('img/add-icon-white.png')}}"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="width100p users-table fs24">
                        <tbody>
                            @foreach ($authorUsers as $author)
                                <tr id="author{{$author->id}}" data-id="{{$author->id}}">
                                    <td>{{$author->name}}</td>
                                    <td>{{$author->phone}}</td>
                                    <td>
                                        <a href="#delete-user" class="add-user fancybox-inline" onclick="showDeleteLayout('author{{$author->id}}')">
                                            <img src="{{asset('img/delete-icon.png')}}">
                                        </a>
                                        <a href="#edit-user" class="add-user fancybox-inline" onclick="showEditLayout('author{{$author->id}}')">
                                            <img src="{{asset('img/edit-icon.png')}}">
                                        </a>
                                        <a href="#show-user" class="add-user fancybox-inline" onclick="showAuthorLayout('author{{$author->id}}')">
                                            <img src="{{asset('img/info-icon.png')}}">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    @include('layouts/property_add')
    @include('layouts/author_show')
    @include('layouts/author_add')
    @include('layouts/author_edit')
    @include('layouts/author_delete')
    @include('layouts/choose_property')
    @include('layouts/property_status')
    @include('layouts/property_jurisdiction')
    @include('layouts/dispatcher_add')
    @include('layouts/customer_add')
</footer>
@endsection
