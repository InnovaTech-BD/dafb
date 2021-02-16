<div class="sidebar-categories wow fadeInUp">
    <h3>Others Events</h3>
    <ol>
        @foreach ($events as $event)
        <li><a href="{{ route('events.show',$event->slug) }}">{{$event->headline[Config::get('app.locale')]}}</a></li>
        @endforeach
    </ol>
</div>