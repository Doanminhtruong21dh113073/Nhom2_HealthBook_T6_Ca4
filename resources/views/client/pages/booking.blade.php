@extends('layouts.app')

@section('content')
    <form action="{{ route('client.booking.store') }}" method="POST">
        @csrf


        <div class="form-group">
            <label for="selected_user_id">Chọn người dùng:</label>
            <select name="selected_user_id" id="selected_user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="selected_category_id">Chọn category:</label>
            <select name="selected_category_id" id="selected_category_id" class="form-control">
                <!-- Tùy chọn category sẽ được cập nhật thông qua JavaScript -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Chọn</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#selected_user_id').change(function() {
                var selectedUserId = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('client.booking.getCategories') }}", // Sử dụng route() để tạo URL
                    data: {
                        user_id: selectedUserId
                    },
                    success: function(data) {
                        $('#selected_category_id').empty();
                        $.each(data, function(key, value) {
                            $('#selected_category_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });
        });
        </script>


    @endsection
