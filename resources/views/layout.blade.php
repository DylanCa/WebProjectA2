<!DOCTYPE HTML>
<html>

<head>
    @yield("title")
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="icon" href="images/tab_icon.jpg" sizes="16x16">
</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar">
        <!-- Logo -->
        <h1 id="logo"><a href="/">BDE EXIA</a></h1>
        <!-- Text -->
        <section class="box text-style1">
            <div class="inner">
                <p>
                    Profile name :
                    <br/> <a href='#'>Logout</a>
                </p>
            </div>
        </section>
        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="/">Homepage</a></li>
                <li class="current"><a href="/club">Clubs</a></li>
                <li><a href="/event">Event 1</a></li>
                <li><a href="/event">Event 2</a></li>
                <li><a href="/store">Store</a></li>
            </ul>
        </nav>
        <!-- Recent Posts -->
        <section class="box recent-posts">
            <header>
                <h2>Recent Eventss</h2>
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
    @yield('body')
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
</body>

</html>
