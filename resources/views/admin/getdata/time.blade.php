<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('administrator/dist/css/time.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('administrator/css/bootstrap.min.css')}}">

</head>
<body>
      <div class="container" >
        <div class="row">
                @for ($i = 7; $i <= 18; $i++)
                    <label class="col-2 " for="{{$i}}">
                        <div class="">
                            <input class="radio-time" type="radio" name="time" id="{{$i}}" value="{{$i}}">
                            <div class="time-card">
                                <div class="time-text">{{$i}}:00</div>
                            </div>
                        </div>
                    </label> 
                @endfor 
                  
        </div>
    </div>
    <script src="{{asset('administrator/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>

