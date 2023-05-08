@extends('admin.layout')

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <a class="navbar-brand btn btn-lg" href="{{route('admin.home')}}">Home</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-lg" href="{{route('admin.showCategory')}}">Category</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link btn btn-lg" href="{{route('admin.showTrainer')}}">Trainer</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link btn btn-lg" href="{{route('admin.showCourse')}}">Courses</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link btn btn-lg" href="{{route('admin.showStudent')}}">Students</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-lg" href="{{route('admin.auth.logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    @endsection

