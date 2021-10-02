<x-app-layout>
    @section('content')
    <div class="container">
        <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="POST">
            <div class="mb-3 pt-2">
                <button class="btn btn-dark" type="submit">Save question</button>
                <a href="/questionnaires/{{ $questionnaire->id }}" class="btn btn-secondary">Back</a>
            </div>
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>
                <div class="card-body">
                    @csrf

                    <label class="form-label h4" for="question">
                        Question
                    </label>
                    <div class="input-group mb-3">
                        <input type="text" name="question[question]" class="form-control" aria-label="question"
                            aria-describedby="basic-addon1" value="{{ old('question.question') ?? '' }}" />
                    </div>
                    @error('question.question')
                    <small class="text-danger d-block">{{ $message ?? ''}}</small>
                    @enderror

                    <div class="form-group mb-3">
                        <fieldset>
                            <legend class="h4">Choices</legend>
                            <small id="choiceHelp" class="text-danger d-block">{{ $message ?? '' }}</small>
                            <div class="form-group">
                                <label class="form-label" for="answer1">Choice 1</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="answers[][answer]" class="form-control"
                                        aria-label="question" aria-describedby="choiceHelp"
                                        value="{{ old('answers.0.answer') ?? '' }}" />
                                </div>
                                @error('answers.0.answer')
                                <small class="text-danger d-block">{{ $message ?? '' }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="answer2">Choice 2</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="answers[][answer]" class="form-control"
                                        aria-label="question" aria-describedby="choiceHelp"
                                        value="{{ old('answers.1.answer') ?? '' }}" />
                                </div>
                                @error('answers.1.answer')
                                <small class="text-danger d-block">{{ $message ?? '' }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="answer3">Choice 3</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="answers[][answer]" class="form-control"
                                        aria-label="question" aria-describedby="choiceHelp"
                                        value="{{ old('answers.2.answer') ?? '' }}" />
                                </div>
                                @error('answers.2.answer')
                                <small class="text-danger d-block">{{ $message ?? '' }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="answer4">Choice 4</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="answers[][answer]" class="form-control"
                                        aria-label="question" aria-describedby="choiceHelp"
                                        value="{{ old('answers.3.answer') ?? '' }}" />
                                </div>
                                @error('answers.3.answer')
                                <small class="text-danger d-block">{{ $message ?? '' }}</small>
                                @enderror
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @stop
</x-app-layout>