@extends('layouts.admin.app')

@section('content')

<section class="admin-dashboard dashboard pt20">
    <div class="container">

        <section class="heading bcred bdr9 white mb30 search-div">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-4 d-flex align-items-center">
                    <a href="#choose-property" class="fancybox-inline"><img src="{{asset('img/dropdown-icon.png')}}"></a><h1 class="fs32 mb0 ml20">Authorized Users</h1>
                </div>
                <div class="col-sm-8 text-right">
                    <form class="search-form site-form mb0">
                        <fieldset class="d-flex align-items-center justify-content-end">
                            <input type="search" value="{{$search}}" placeholder="" id="search-key" class="lightgray">
                            <button onclick="searchAuthors()" type="button" class="btn">Search</button>
                        </fieldset>
                    </form>
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
    @include('layouts/navbar_sub')
    @include('layouts/profile_edit')
    @include('layouts/property_add')
    @include('layouts/author_add')
    @include('layouts/author_show')
    @include('layouts/author_edit')
    @include('layouts/author_delete')
    @include('layouts/dispatcher_add')
    @include('layouts/customer_add')
</footer>
@endsection
