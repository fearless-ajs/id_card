@extends('layouts.app')


@section('content')
    @if($user)
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="id-card mb-3">
                <div style="color: #7E6746; line-height: 0em" class="text-center mb-4">
                    <h1>TELVIDA</h1>
                    <small>IT and Communication</small>
                </div>
                <hr>
                <img src="{{$user->Picture}}" alt="Profile Picture" class="profile-pic">
                <h2 class="card-title text-center">{{$user->name}}</h2>
                <h4 class="card-subtitle text-center">{{$user->role}}</h4>
                <div class="text-center mt-3">
                    <span class="badge badge-pill badge-primary">Employee ID: {{$user->employee_id}}</span>
                </div>
                <hr>
                <p class="card-text"><strong>Email:</strong> {{$user->email}}</p>
                <p class="card-text"><strong>Phone:</strong> {{$user->phone}}</p>
                <p class="card-text"><strong>Address:</strong> {{$user->address}}</p>
            </div>
            <div class="id-card mb-4">
                <div class="text-center">
                    <span class="bar-code">
                        {!! QrCode::size(100)->generate(route('user-info', $user->employee_id)); !!}
                </span>
                </div>

{{--                <img src="{{asset("uploads/image.jpeg")}}" alt="Profile Picture" class="bar-code">--}}
                <hr>
                <p class="card-subtitle text-center" style="font-size: 10px">Scan to see staff information</p>
                <div class="text-center mt-3">
                    <span class="badge badge-pill badge-primary">http://igr3.telvida.com/staff/staff_id</span>
                </div>
                <hr>
                <p class="card-text"><strong>Office Address:</strong> Plot PC 12 Churchgate Victoria Island, Lagos, Nigeria</p>
                <p class="card-text"><strong>Tel:</strong> 0700211......</p>
                <p class="card-text"><strong>Email:</strong>admin@telvida.com</p>
            </div>

            <div class="id-card no-print">
                <button type="button" onclick="window.print()" class="login-btn btn btn-primary btn-block">DOWNLOAD ID</button>

            </div>
        </div>


    </div>
    @else
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="id-card mb-3">
                    <div style="color: #7E6746; line-height: 0em" class="text-center mb-4">
                        <h1>TELVIDA</h1>
                        <small>IT and Communication</small>
                    </div>
                    <hr>
                    <h1 style="color: red" class="text-center">Ouch!!!</h1>
                    <h2 class="card-title text-center">Staff Not Found</h2>
                </div>
            </div>
        </div>
    @endif
@endsection


