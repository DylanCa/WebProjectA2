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
            <h2>Upcoming Events</h2>
        </header>
        <ul>
            <li><a href="/event/1">Event 1</a></li>
            <li><a href="/event/2">Event 2</a></li>
            <li><a href="/event/3">Event 3</a></li>
            <li><a href="/event/4">Event 4</a></li>
            <li><a href="/event/5">Event 5</a></li>
        </ul>
    </section>
    <!-- Recent Comments -->
    <section class="box recent-comments">
        <header>
            <h2>Recent Comments</h2>
        </header>
        <ul>
            <li>case on <a href="#">Lorem ipsum dolor</a></li>
            <li>molly on <a href="#">Sed dolore magna</a></li>
            <li>case on <a href="#">Sed dolore magna</a></li>
        </ul>
    </section>
    <!-- Copyright -->
    <ul id="copyright">
        <li>&copy; Cattelan & Montes.</li>
        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
</div>
