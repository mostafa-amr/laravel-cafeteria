@extends('layouts.app')

@section('content')

<div class="adminUserPage">
    <div class="container">
        <div class="row justify-content-center">
            <!--  project and team member start -->
            <div class="col-xl-12 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h1 class="text-center">All Users </h1>
                        <div class="card-header-right">
                            <a href="{{ route('Users.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(8, 119, 230, 1);transform: ;msFilter:;">
                                    <path d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5zM19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="card-block">
                        <div class="for">
                            <table class="table table-responsive text-center w-75 mx-auto">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Show</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <div class="d-inline-block">
                                                    <h6 style="word-wrap: break-word;white-space: pre-wrap;word-break: break-word;">{{ $user->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="">{{$user->address}}</td>
                                        <td style="">{{$user->role}}</td>

                                        <td>
                                            <a class="btn" href="{{ route('Users.show',$user->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(245, 8, 7, 1); ">
                                                    <path d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm1.5 1H8c-3.309 0-6 2.691-6 6v1h15v-1c0-3.309-2.691-6-6-6z"></path>
                                                    <path d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192 1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z"></path>
                                                </svg>
                                            </a>
                                        </td>

                                        <td>
                                            <a class="btn" href="{{ route('Users.edit',$user->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(13, 98, 241, 1);">
                                                    <path d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z"></path>
                                                </svg>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('Users.destroy',$user->id) }}" method="post" onSubmit="return confirm('Are You Sure To Delete This User?')">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-sm bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" style="fill: rgba(245, 8, 8, 1);">
                                                        <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path>
                                                        <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                    </svg></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                {{-- {{ $users->links('pagination::bootstrap-4') }} --}}
            </div>
        </div>
    </div>
    <div class=" container text-right">

    </div>
</div>
</div>

@stop
@section('product')

<div class="d-flex  container mt-5">
    <div col-8>
        {{$users->links()}}
    </div>
</div>
@stop