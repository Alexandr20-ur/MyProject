<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p>&copy; {{ date('Y') }}</p>
        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.2/getting-started/introduction/">getting started guide</a>.</p>

        <ul>
            @foreach($rubrics as $rubric)
                <li><a href="">{{ $rubric->title }}</a></li>
            @endforeach
        </ul>
    </div>
</footer>
