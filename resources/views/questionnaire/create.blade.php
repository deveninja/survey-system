<x-app-layout>
    @section('content')
    <div class="container">
        <form action="/questionnaires" method="POST">
            @csrf

            <div class="pt-2 mb-3">
                <button class="btn btn-dark" type="submit">Save questionnaire</button>
                <a href="/questionnaires" class="btn btn-secondary">Back</a>
            </div>
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <label class="form-label" for="title">Title</label>
                    <div class="input-group mb-3">
                        <input type="text" name="title" class="form-control" aria-label="Title"
                            aria-describedby="basic-addon1" value="{{ old('title') ?? '' }}" />
                    </div>
                    @error('title')
                    <small class="text-danger d-block">{{ $message }}</small>
                    @enderror

                    <label class="form-label" for="purpose">Purpose</label>
                    <div class="input-group mb-3">
                        <input type="text" name="purpose" class="form-control" aria-label="Purpose"
                            aria-describedby="basic-addon2" value="{{ old('purpose') ?? '' }}" />
                    </div>
                    @error('purpose')
                    <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </form>
    </div>
    @stop
</x-app-layout>