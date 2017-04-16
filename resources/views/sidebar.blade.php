<!-- Sidebar -->
<div id="sidebar">
    <!-- Logo -->
    <h1 id="logo"><a href="/">BDE EXIA</a></h1>
    <!-- Text -->
    <section class="box text-style1">
        <div class="inner">
            @if(!empty(\Cookie::get('id')))
            <p>
                <a href='profil'>{{ App\User::where('id', \Cookie::get('id') )->first()->name }} {{ App\User::where('id', \Cookie::get('id') )->first()->surname}}</a>
                <br/> <a href='logout'>Logout</a>
            </p>
            @else
            <p>
                <a href='login'>Login</a><br/>
                <a href='register'>Create an account</a>
            </p>
            @endif
        </div>
    </section>
    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li class="current"><a href="/">Homepage</a></li>
            <li><a href="/club">Clubs</a></li>
            <li><a href="/event">Events</a></li>
            <li><a href="/store">Store</a></li>
        </ul>
    </nav>
    <!-- Recent Posts -->
    <section class="box recent-posts">
        <header>
            <h2>Your upcoming events</h2>
        </header>
        <ul>
        @foreach (App\EventMembers::where('userID', \Cookie::get('id'))->get() as $event)
            <li><a href="/event/{{$event->eventID}}">{{App\Event::where('id', $event->eventID)->first()->eventDate}} - {{ App\Event::where('id', $event->eventID)->first()->name }}</a></li>
        @endforeach
        </ul>
    </section>

    <section class="box recent-posts">
        <header>
            <h2>Your clubs</h2>
        </header>
        <ul>
        @foreach (App\ClubMembers::where('userID', \Cookie::get('id'))->get() as $club)
            <li><a href="/club/{{$club->clubID}}">{{ App\Club::where('id', $club->clubID)->first()->name }}</a></li>
        @endforeach
        </ul>
    </section>
    <!-- Recent Comments -->
    <section class="box recent-comments">
        <header>
            <h2>Recent Comments</h2>
        </header>
        <ul>
        @foreach (App\EventMessageBoard::all()->take(5) as $message)
            <li><a href="/user/{{$message->userID}}">{{App\User::where('id',$message->userID)->first()->name}} {{App\User::where('id',$message->userID)->first()->surname}} </a> on <a href="/event/{{$message->eventID}}">{{App\Event::where('id', $message->eventID)->first()->name}}</a><br /><a href="/event/{{$message->eventID}}#comments">{{str_limit($message->message, 50)}}</a></li>
        @endforeach
        </ul>
    </section>
    <!-- Copyright -->
    <ul id="copyright">
        <li>&copy; Cattelan & Montes.</li>
        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
</div>
