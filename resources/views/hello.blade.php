<!DOCTYPE html>
<html>
<head>
    <title>Hello World WebSocket</title>
    <script src="https://js.pusher.com/8.2/pusher.min.js"></script>
</head>
<body>
    <h1>WebSocket Messages</h1>
    <ul id="messages"></ul>
    <script>
        Pusher.logToConsole = true;
        
        const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
            forceTLS: true
        });
        
        const channel = pusher.subscribe('hello-world');
        
        channel.bind('HelloWorldEvent', function(data) {
            console.log('HelloWorldEvent received:', data);
            addMessage(data.message);
        });
        
        channel.bind('App\\Events\\HelloWorldEvent', function(data) {
            console.log('App\\Events\\HelloWorldEvent received:', data);
            addMessage(data.message);
        });

        function addMessage(message) {
            const ul = document.getElementById('messages');
            const li = document.createElement('li');
            li.textContent = message + ' - ' + new Date().toLocaleTimeString();
            ul.appendChild(li);
        }

        pusher.connection.bind('connected', function() {
            console.log('Connected to Pusher successfully');
        });

        channel.bind('pusher:subscription_succeeded', function() {
            console.log('Successfully subscribed to hello-world channel');
        });
    </script>
</body>
</html>