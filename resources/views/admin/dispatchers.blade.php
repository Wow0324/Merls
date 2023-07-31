@extends('layouts.admin.app')

@section('content')

<section class="admin-dashboard dashboard pt20">
    <div class="container">

        <section class="heading bcred bdr9 white mb30 search-div">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-4 d-flex align-items-center">
                    <a href="#choose-property" class="fancybox-inline"><img src="{{asset('img/dropdown-icon.png')}}"></a><h1 class="fs32 mb0 ml20">Dispatchers</h1>
                </div>
                <div class="col-sm-8 text-right">
                    <form class="search-form site-form mb0">
                        <fieldset class="d-flex align-items-center justify-content-end">
                            <input type="search" value="{{$search}}" placeholder="" name="" id="search-key" class="lightgray">
                            <button onclick="searchDispatchers()" type="button" class="btn">Search</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

        <section class="users-list user-search-results bdgray bdr9 mb30">
            <div class="heading bdr9 bcgray white">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <b class="fs24">Dispatchers</b>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#add-dispatcher" class="add-user fancybox-inline" onclick="initDispatcherAddErrorValidation()">
                            <img src="{{asset('img/add-icon-white.png')}}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (count($dispatchers) > 0)
                        <table class="width100p users-table fs24">
                            <tbody>
                                @foreach ($dispatchers as $dispatcher)
                                    <tr id="dispatcher{{$dispatcher->id}}" data-id="{{$dispatcher->id}}">
                                        <td>{{$dispatcher->email}}</td>
                                        <td>{{$dispatcher->phone}}</td>
                                        <td>
                                            <a href="#delete-dispatcher" class="add-user fancybox-inline" onclick="showDeleteDispatcherLayout('dispatcher{{$dispatcher->id}}')">
                                                <img src="{{asset('img/delete-icon.png')}}">
                                            </a>
                                            <a href="#edit-dispatcher" class="add-user fancybox-inline" onclick="showEditDispatcherLayout('dispatcher{{$dispatcher->id}}')">
                                                <img src="{{asset('img/edit-icon.png')}}">
                                            </a>
                                            <a href="#show-dispatcher" class="add-user fancybox-inline" onclick="showDispatcherLayout('dispatcher{{$dispatcher->id}}')">
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
                        {{ $dispatchers->links('layouts.pagination_custom') }}
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
    @include('layouts/dispatcher_show')
    @include('layouts/dispatcher_add')
    @include('layouts/dispatcher_edit')
    @include('layouts/dispatcher_delete')
    @include('layouts/customer_add')
</footer>
@endsection
