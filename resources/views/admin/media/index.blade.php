@extends('layouts.admin')

@section('content')
    <h1>Media</h1>
    @if($photos)

        <form action="delete/media" method="post" class="form-inline">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <select name="checkBoxArray" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn-primary">
            </div>
    <table class="table">
        <thead>
            <tr>
                <th><input type="checkbox" name="" id="options"></th>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo)
                <tr>
                  <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="" value="{{ $photo->id }}"></td>
                  <td>{{ $photo->id }}</td>
                  <td><a href="{{ route('media.edit', $photo->id) }}"><img height="50" src="{{ $photo->file ?? 'http://placehold.it/400x400'}}" alt=""></a></td>
                  <td>{{ $photo->created_at ?? 'no date'}}</td>
                  {{-- <td>
                        <input type="hidden" name="photo" value="{{ $photo->id }}">
                        <div class="form-group">
                            <input class="btn btn-danger" type="submit" name="delete_single" value="Delete">
                        </div>
                      
                  </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</form>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#options').click(function(){
                if(this.checked)
                {
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    });
                }
                else
                {
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });
                }
            })
        });
    </script>
@endsection