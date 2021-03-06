<html>
<head>
    <script>
        var height = 200, width = 200,
            canvas, ctx, interval,
            h = height, a = 0.1, v = 0, ballAbsorption = 0.8,
            ballSize = 20, ballRadius = ballSize / 2, frameRate = 20;

        function drawBall() {
            if(h <= 0 && v > 0) {
                console.log('bong');
                v *= -1 * ballAbsorption; // bounding with less velocity

                if(v > -0.1 && v < 0.1) {
                    clearInterval(interval);
                    interval = null;
                    console.log('stop');
                }
            }

            // Move the ball
            v += a; // accelerating
            h -= v; // falling (if v < 0)

            // drawing ball
            ctx.clearRect(0, 0, height, width);
            ctx.fillStyle = "red";
            ctx.beginPath();
            ctx.arc(width/2, height - h - ballRadius, ballRadius, 0, Math.PI*2,true);
            ctx.fill();
        }

        window.onload = function() {
            canvas = document.getElementById('c');
            canvas.height = height;
            canvas.width = width;
            ctx = canvas.getContext("2d");
            interval = setInterval(drawBall, frameRate);
            canvas.addEventListener('click', function(){
                h = height;
                v = 0;
                if(!interval) {
                    interval = setInterval(drawBall, frameRate);
                }
            });
        }
    </script>
    <style>
        #c {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<canvas id="c">
    Your antique browser does not support canvas...
</canvas>
</body>
</html>