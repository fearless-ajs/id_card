<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telvida Identity Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .id-card {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto;
            display: block;
            border: 4px solid #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 24px;
            margin-top: 15px;
        }
        .card-subtitle {
            font-size: 18px;
            color: #666;
        }
        .card-text {
            margin-top: 15px;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-title {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            border-radius: 5px;
        }
        .login-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/toastr.css')}}">
    @livewireStyles
</head>
<body>

<div class="container">
    @yield("content")
</div>


@livewireScripts
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script  src="{{asset('assets/js/toastr.js')}}"></script>
<script  src="{{asset('assets/js/sweetalert.js')}}"></script>
<script>
    window.addEventListener('swal:modal', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type
        });
    });

    window.addEventListener('swal:confirm', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {

            if(willDelete){
                window.livewire.emit('accept', event.detail.id);
            }
        });
    });
</script>
<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
</script>
<script>
    window.livewire.on('close-sms-modal', param => {
        $('.sms-modal').modal('hide');
    });
</script>

<script>
    window.livewire.on('show-sms-modal', param => {
        $('.sms-modal').modal('show');
    });
</script>
{{--<script src="{{asset('js/print.js')}}"></script>--}}
</body>
</html>
