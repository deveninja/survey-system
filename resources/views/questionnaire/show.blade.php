<x-app-layout>
    @section('content')
    <div class="container">
        <div class="sticky-top pt-2 rounded">
            <a class="btn btn-dark mb-3" href="/questionnaires/{{ $questionnaire->id }}/questions/create">
                Add a question
            </a>
            <a class="btn btn-dark mb-3" href="/surveys/{{ $questionnaire->id }}-{{Str::slug($questionnaire->title)}}">
                Take Survey
            </a>
            <a href="/questionnaires" class="btn btn-secondary mb-3">Back</a>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $questionnaire->title }}</h4>
                        <small>{{ $questionnaire->purpose }}</small>
                    </div>
                    <div class="card-body">
                        @foreach ($questionnaire->questions as $question)
                        <div class="card mb-4">
                            <div class="card-header">{{ $question->question }}</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach ($question->answers as $answer)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center rounded">
                                        {{ $answer->answer }}
                                        @if ($question->responses()->count())
                                        <div>
                                            {{ intval(($answer->responses()->count() * 100) / $question->responses()->count()) }}%
                                        </div>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer">
                                <form action="{{ $questionnaire->path() }}/questions/{{ $question->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-sm btn-outline-danger">Delete Question</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
</x-app-layout>