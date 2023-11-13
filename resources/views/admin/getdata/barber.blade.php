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

    @foreach ($barber as $item)
        <tr>
            <td class="p-3">
                <div class="card"
                    style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; margin-bottom: 20px;">
                    <!-- Added margin-bottom -->
                    <div class="d-flex align-items-center">
                        <img src="{{ asset($item->images) }}" class="rounded-circle me-3"
                            style="width: 60px; height: 60px; object-fit: cover;" alt="Bác Sĩ {{ $item->name }}">
                        <div>
                            <h5 class="card-title mb-0">Bác Sĩ. {{ $item->name }}</h5>
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="radio" name="barber"
                                    id="barber{{ $item->bb }}" value="{{ $item->bb }}" onclick="show()">
                                <label class="form-check-label" for="barber{{ $item->bb }}">Chọn</label>
                            </div>
                        </div>
                    </div>
                </div>
            </td>

        </tr>
    @endforeach








    </div> {{-- --JS-- --}}
    <script src="{{ asset('administrator/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function show() {
            document.getElementById("lop-phu").style.display = 'block';
        }
    </script>
</body>

</html>
