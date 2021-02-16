<div class="sidebar-categories wow fadeInUp">
    <h3>{{__('share.category')}}</h3>
    <ol>
        <li class=""><a href="{{ route('about') }}">{{__('share.about')}}</a></li>
        <li class=" @if(Route::is('team'))  @endif "><a href="{{ route('team') }}">{{__('header.team')}}</a></li>
        <li class="@if(Route::is('report.show')) @endif "><a href="{{ route('report.show','annualreport') }}">{{__('footer.link1')}}</a></li>
    </ol>
</div>