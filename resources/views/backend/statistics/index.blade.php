@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            {{-- new --}}
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mt-2 px-3">
                        <div class="col-12 col-sm-6">
                            <legend class="h4">
                                Dashboard
                            </legend>
                        </div>
                        <div class="col-12 col-md-6  d-flex justify-content-end align-it ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Dashboard</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <h3 id="user_name">Welcome {{session('user_name')}}</h3>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <style>
        .widget {
            padding: 20 px !important;
        }
    </style>
    @section('js')
    @endsection
