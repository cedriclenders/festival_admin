@if ($errors->any())
        <div class="alert alert-danger">
            <ul class="error-alert" style="margin: 0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif