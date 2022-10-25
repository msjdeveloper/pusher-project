<html>
    <head>
        <title>Pusher Test</title>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script>

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('edce0b3687194e38683e', {
                cluster: 'sa1'
            });

            var channel = pusher.subscribe('my-channel');
                channel.bind('from-form', function(data) {
                alert(JSON.stringify(data));
            });

        </script>
    </head>
    <body>
        <h1>Pusher Test</h1>
        <p>
            Try publishing an event to channel <code>my-channel</code>
            with event name <code>my-event</code>.
        </p>
    </body>
</html>
