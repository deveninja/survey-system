<x-app-layout>
    @section('content')
    <div class="container">
        <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="POST">
            @csrf
            <div class="sticky-top pt-2 mb-3 form-row">
                <div class="col-lg-4 col-sm-12">
                    <button class="btn btn-dark" type="submit">Submit</button>
                    <a href="/questionnaires" class="btn btn-secondary">Back</a>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 pt-1">
                            <input class="form-control" type="text" name="survey[name]"
                                value="{{ old('survey.name') ?? '' }}" placeholder="Your name" />
                            @error('survey.name')
                            <small class="text-danger">Your name is required</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 pt-1">
                            <input class="form-control" type="email" name="survey[email]"
                                value="{{ old('survey.email') ?? '' }}" placeholder="Your email" />
                            @error('survey.email')
                            <small class="text-danger">Email is required</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>{{ $questionnaire->title }}</h4>
                    <small>{{ $questionnaire->purpose }}</small>
                </div>
                <div class="card-body">
                    @foreach ($questionnaire->questions as $key => $question)
                    <div class="card mb-4">
                        <div class="card-header"><strong>{{ $key + 1 }}</strong>.) {{ $question->question }}</div>
                        <div class="card-body">
                            @error('responses.' . $key . '.answer_id')
                            <small class="text-danger">This field is required</small>
                            @enderror
                            <ul class="list-group">
                                @foreach ($question->answers as $answer)
                                <label for="answer{{ $answer->id }}">
                                    <li class="list-group-item rounded">
                                        <input class="mr-2" type="radio" name="responses[{{ $key }}][answer_id]"
                                            value={{ $answer->id }} id="answer{{ $answer->id }}"
                                            {{ old('responses.' . $key . '.answer_id') == $answer->id ? 'checked' : ''}} />
                                        {{ $answer->answer }}

                                        <input type="hidden" name="responses[{{ $key }}][question_id]"
                                            value="{{ $question->id }}">
                                    </li>
                                </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </form>
    </div>
    @stop
</x-app-layout>