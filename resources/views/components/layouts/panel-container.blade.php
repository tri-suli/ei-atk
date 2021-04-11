<div class="x_panel">
    <div class="x_title">
        @if (strlen($title) >= 1)
            <h2>{{ $title }}</h2>
        @endif
        <ul class="nav navbar-right panel_toolbox">
            {{ $actions }}
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        {{ $content }}
    </div>
</div>