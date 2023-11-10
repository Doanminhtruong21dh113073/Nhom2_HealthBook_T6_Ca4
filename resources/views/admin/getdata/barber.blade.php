<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/img.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/css/bootstrap.min.css') }}">
</head>

<body>

    <div class="container">
        <label for="form-check">Bác Sĩ</label><br>
        <div class="row barber-row">
            @foreach ($barber as $item)
                <label class="col-4 labelexpanded" style="width:23%" for="{{ $item->bb + 20 }}">
                    <input class="radio-barber" type="radio" name="barber" value="{{ $item->bb }}"
                        id="{{ $item->bb + 20 }}" onclick="show()">
                    <div class="radio-btns">
                        <img class="img-barber" src="{{ asset($item->images) }}" alt="images">
                        <p class="text-barber">Bác Sĩ. {{ $item->name }}</p>
                    </div>
                </label>
            @endforeach
        </div>
    </div>



    {{-- --JS-- --}}
    <script src="{{ asset('administrator/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function show() {
            document.getElementById("lop-phu").style.display = 'block';
        }
    </script>

</body>

</html> 
