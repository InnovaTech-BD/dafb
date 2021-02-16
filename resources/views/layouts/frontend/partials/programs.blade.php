<div class="sidebar-categories wow fadeInUp">
    <h3>{{__('share.others')}}</h3>
    <ol>
        @foreach ($projects as $program)
        <li><a href="{{ route('program.show',$program->slug) }}">{{$program->headline[Config::get('app.locale')]}}</a></li>
        @endforeach
    </ol>
</div>