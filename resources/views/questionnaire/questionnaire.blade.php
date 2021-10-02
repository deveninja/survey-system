<x-app-layout>
    @section('content')
    <div class="toast notification" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000"
        data-animation="true">
        <div id="linkCopy" class="toast-header">
            <strong class="mr-auto">Survey Link</strong>
            <small class="text-muted"></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body text-success">
            Survey link copied in your clipboard.
        </div>
    </div>
    <div class="container">
        <div class="pt-2 mb-3">
            <a href="/questionnaires/create" class="btn btn-dark">Create new Questionnaire</a>
        </div>
        <ul class="list-group">
            @foreach ($questionnaires as $question)
            <li class="list-group-item d-flex justify-content-between align-items-center rounded">
                <a class="text-primary" href="{{ $question->path() }}">{{ $question->title }}</a>
                <div>
                    <a
                        href="mailto:?subject=[Survey Invitation] from {{ auth()->user()->name }}&body=Please take my {{ $question->title }} survey {{ $question->publicPath() }}">
                        <span class="material-icons link" title="Email survey to someone">
                            email
                        </span>
                    </a>
                    <a href="{{ $question->publicPath() }}">
                        <span class="material-icons link" title="Take the survey">
                            poll
                        </span>
                    </a>
                    <span class="material-icons link" title="Copy survey link"
                        onclick="copyLink('{{ $question->publicPath() }}')">
                        content_copy
                    </span>
                </div>
            </li>

            @endforeach
        </ul>
    </div>
    <script>
        function copyLink(link) {
            $('.toast').toast('show');
            navigator.clipboard.writeText(link);
        }
    </script>
    @stop
</x-app-layout>