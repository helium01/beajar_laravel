<!DOCTYPE html>
<html>
<head>
    <title>Stopwatch App</title>
    <style>
        #display {
            font-size: 24px;
            margin-bottom: 20px;
        }

        #flag-list {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div>
        <h1 id="display">00:00.000</h1>
        <button onclick="startPause()" id="startPauseButton">Start</button>
        <button onclick="stop()" id="stopButton">Stop</button>
        <button onclick="flagTime()" id="flagButton">Flag</button>
    </div>
    <div id="flag-list"></div>

    <script>
        var timer;
        var minutes = 0;
        var seconds = 0;
        var milliseconds = 0;
        var isRunning = false;

        function display() {
            milliseconds++;
            if (milliseconds == 1000) {
                milliseconds = 0;
                seconds++;
                if (seconds == 60) {
                    seconds = 0;
                    minutes++;
                }
            }
            document.getElementById("display").innerHTML =
                (minutes < 10 ? "0" : "") + minutes + ":" +
                (seconds < 10 ? "0" : "") + seconds + "." +
                (milliseconds < 100 ? (milliseconds < 10 ? "00" : "0") : "") + milliseconds;
        }

        function startPause() {
            if (!isRunning) {
                timer = setInterval(display, 1);
                document.getElementById("startPauseButton").innerHTML = "Pause";
            } else {
                clearInterval(timer);
                document.getElementById("startPauseButton").innerHTML = "Start";
            }
            isRunning = !isRunning;
        }

        function stop() {
            clearInterval(timer);
            isRunning = false;
            minutes = seconds = milliseconds = 0;
            document.getElementById("display").innerHTML = "00:00.000";
            document.getElementById("startPauseButton").innerHTML = "Start";
            document.getElementById("flag-list").innerHTML = "";
        }

        function flagTime() {
            var flagList = document.getElementById("flag-list");
            var newFlag = document.createElement("p");
            var currentTime = (minutes < 10 ? "0" : "") + minutes + ":" +
                             (seconds < 10 ? "0" : "") + seconds + "." +
                             (milliseconds < 100 ? (milliseconds < 10 ? "00" : "0") : "") + milliseconds;
            newFlag.innerHTML = currentTime;
            flagList.appendChild(newFlag);
        }
    </script>
</body>
</html>
