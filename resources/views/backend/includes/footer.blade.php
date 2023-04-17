<footer class="footer text-sm text-muted">
    <div>
        <a href="/" class="text-muted"><p>Student Result Management System</p></a>.
        @if(setting('show_copyright'))
        @lang('Copyright') &copy; {{ date('Y') }}
        @endif
    </div>
    <div class="ms-auto">{!! setting('footer_text') !!}</div>
</footer>