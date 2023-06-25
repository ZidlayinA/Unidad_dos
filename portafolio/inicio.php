<?php
session_start();
require_once 'cnn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
	<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="./css/style.css">

    <style>
        /* Estilos para el botón */
        .logout-btn {
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #000000;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

	<title>Portafolio Dinamico - Unidad II</title>
</head>
<body>
	
	<div class="contenedor">
		<header>
			<div class="logo">
				<h1>Unidad II</h1>
				<p>Sitios Web Dinamicos</p>
			</div>

            <div class="logo">
           	<a href="cerrar.php" class="logout-btn">Cerrar sesión</a>
			</div>
			
			
			<form action="">
				<input type="text" class="barra-busqueda" id="barra-busqueda" placeholder="Buscar">
			</form>
			<div class="categorias" id="categorias">
				<a href="#" class="activo">Todos</a>
				<a href="#">Naturaleza</a>
				<a href="#">Ciudades</a>
				<a href="#">Personas</a>
				<a href="#">Animales</a>
			</div>
		</header>

		<section class="grid" id="grid">
			<div class="item" 
				 data-categoria="ciudades"
				 data-etiquetas="ciudades autos carros calles"
				 data-descripcion="1.- Lorem ipsum dolor sit amet consectetur."
			>
				<div class="item-contenido">
					<img src="img/ciudad1.png" alt="">
				</div>
			</div>

			<div class="item"
				 data-categoria="personas"
				 data-etiquetas="personas mujeres"
				 data-descripcion="2.- Lorem ipsum dolor sit amet consectetur."
			>
				<div class="item-contenido">
					<img src="img/persona1.png" alt="">
				</div>
			</div>

			<div class="item"
				 data-categoria="paisajes"
				 data-etiquetas="paisajes montañas mar playas"
				 data-descripcion="3.- Lorem ipsum dolor sit amet consectetur."
			>
				<div class="item-contenido">
					<img src="img/paisaje1.png" alt="">
				</div>
			</div>

			<div class="item"
				 data-categoria="animales"
				 data-etiquetas="animales leones"
				 data-descripcion="4.- Lorem ipsum dolor sit amet consectetur."
			>
				<div class="item-contenido">
					<img src="img/animal1.png" alt="">
				</div>
			</div>

			<div class="item"
				 data-categoria="animales"
				 data-etiquetas="animales pandas"
				 data-descripcion="5.- Lorem ipsum dolor sit amet consectetur."
			>
				<div class="item-contenido">
					<img src="img/animal2.png" alt="">
				</div>
			</div>

			<div class="item"
				 data-categoria="personas"
				 data-etiquetas="personas mujeres"
				 data-descripcion="6.- Lorem ipsum dolor sit amet consectetur."
			>
				<div class="item-contenido">
					<img src="img/persona2.png" alt="">
				</div>
			</div>

			<div class="item"
				 data-categoria="paisajes"
				 data-etiquetas="paisajes montañas niebla"
				 data-descripcion="7.- Lorem ipsum dolor sit amet consectetur."
			>
				<div class="item-contenido">
					<img src="img/paisaje2.png" alt="">
				</div>
			</div>

			<div class="item" 
				 data-categoria="ciudades"
				 data-etiquetas="ciudades paisajes carreteras"
				 data-descripcion="8.- Lorem ipsum dolor sit amet consectetur."
			>
				<div class="item-contenido">
					<img src="img/ciudad2.png" alt="">
				</div>
			</div>

			<div class="item"
				 data-categoria="naturaleza"
				 data-etiquetas="naturaleza hojas plantas"
				 data-descripcion="9.- Lorem ipsum dolor sit amet consectetur.
				 	"
			>
				<div class="item-contenido">
					<img src="img/naturaleza1.png" alt="">
				</div>
			</div>
		</section>

		<section class="overlay" id="overlay">
			<div class="contenedor-img">
				<button id="btn-cerrar-popup"><i class="fas fa-times"></i></button>
				<img src="" alt="">
			</div>
			<p class="descripcion"></p>
		</section>

		<footer class="contenedor">
			<div class="redes-sociales">
				<div class="contenedor-icono">
					<a href="http://www.twitter.com/falconmasters" target="_blank" class="twitter">
						<i class="fab fa-twitter"></i>
					</a>
				</div>
				<div class="contenedor-icono">
					<a href="http://www.facebook.com/falconmasters" target="_blank" class="facebook">
						<i class="fab fa-facebook-f"></i>
					</a>
				</div>
				<div class="contenedor-icono">
					<a href="http://www.instagram.com" target="_blank" class="instagram">
						<i class="fab fa-instagram"></i>
					</a>
				</div>
			</div>
			<div class="creado-por">
				<p>Sitio diseñado por <a href="#">Zidlayin, Gaby y Ale </a> - <a href="https://www.falconmasters.com">Desarrollo Web</a></p>
			</div>
		</footer>
	</div>

	<script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
	<script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
	<script src="main.js"></script>

	<script>
        var confetti = {
	maxCount: 150,		//set max confetti count
	speed: 2,			//set the particle animation speed
	frameInterval: 15,	//the confetti animation frame interval in milliseconds
	alpha: 1.0,			//the alpha opacity of the confetti (between 0 and 1, where 1 is opaque and 0 is invisible)
	gradient: false,	//whether to use gradients for the confetti particles
	start: null,		//call to start confetti animation (with optional timeout in milliseconds, and optional min and max random confetti count)
	stop: null,			//call to stop adding confetti
	toggle: null,		//call to start or stop the confetti animation depending on whether it's already running
	pause: null,		//call to freeze confetti animation
	resume: null,		//call to unfreeze confetti animation
	togglePause: null,	//call to toggle whether the confetti animation is paused
	remove: null,		//call to stop the confetti animation and remove all confetti immediately
	isPaused: null,		//call and returns true or false depending on whether the confetti animation is paused
	isRunning: null		//call and returns true or false depending on whether the animation is running
};

(function() {
	confetti.start = startConfetti;
	confetti.stop = stopConfetti;
	confetti.toggle = toggleConfetti;
	confetti.pause = pauseConfetti;
	confetti.resume = resumeConfetti;
	confetti.togglePause = toggleConfettiPause;
	confetti.isPaused = isConfettiPaused;
	confetti.remove = removeConfetti;
	confetti.isRunning = isConfettiRunning;
	var supportsAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame;
	var colors = ["rgba(30,144,255,", "rgba(107,142,35,", "rgba(255,215,0,", "rgba(255,192,203,", "rgba(106,90,205,", "rgba(173,216,230,", "rgba(238,130,238,", "rgba(152,251,152,", "rgba(70,130,180,", "rgba(244,164,96,", "rgba(210,105,30,", "rgba(220,20,60,"];
	var streamingConfetti = false;
	var animationTimer = null;
	var pause = false;
	var lastFrameTime = Date.now();
	var particles = [];
	var waveAngle = 0;
	var context = null;

	function resetParticle(particle, width, height) {
		particle.color = colors[(Math.random() * colors.length) | 0] + (confetti.alpha + ")");
		particle.color2 = colors[(Math.random() * colors.length) | 0] + (confetti.alpha + ")");
		particle.x = Math.random() * width;
		particle.y = Math.random() * height - height;
		particle.diameter = Math.random() * 10 + 5;
		particle.tilt = Math.random() * 10 - 10;
		particle.tiltAngleIncrement = Math.random() * 0.07 + 0.05;
		particle.tiltAngle = Math.random() * Math.PI;
		return particle;
	}

	function toggleConfettiPause() {
		if (pause)
			resumeConfetti();
		else
			pauseConfetti();
	}

	function isConfettiPaused() {
		return pause;
	}

	function pauseConfetti() {
		pause = true;
	}

	function resumeConfetti() {
		pause = false;
		runAnimation();
	}

	function runAnimation() {
		if (pause)
			return;
		else if (particles.length === 0) {
			context.clearRect(0, 0, window.innerWidth, window.innerHeight);
			animationTimer = null;
		} else {
			var now = Date.now();
			var delta = now - lastFrameTime;
			if (!supportsAnimationFrame || delta > confetti.frameInterval) {
				context.clearRect(0, 0, window.innerWidth, window.innerHeight);
				updateParticles();
				drawParticles(context);
				lastFrameTime = now - (delta % confetti.frameInterval);
			}
			animationTimer = requestAnimationFrame(runAnimation);
		}
	}

	function startConfetti(timeout, min, max) {
		var width = window.innerWidth;
		var height = window.innerHeight;
		window.requestAnimationFrame = (function() {
			return window.requestAnimationFrame ||
				window.webkitRequestAnimationFrame ||
				window.mozRequestAnimationFrame ||
				window.oRequestAnimationFrame ||
				window.msRequestAnimationFrame ||
				function (callback) {
					return window.setTimeout(callback, confetti.frameInterval);
				};
		})();
		var canvas = document.getElementById("confetti-canvas");
		if (canvas === null) {
			canvas = document.createElement("canvas");
			canvas.setAttribute("id", "confetti-canvas");
			canvas.setAttribute("style", "display:block;z-index:999999;pointer-events:none;position:fixed;top:0");
			document.body.prepend(canvas);
			canvas.width = width;
			canvas.height = height;
			window.addEventListener("resize", function() {
				canvas.width = window.innerWidth;
				canvas.height = window.innerHeight;
			}, true);
			context = canvas.getContext("2d");
		} else if (context === null)
			context = canvas.getContext("2d");
		var count = confetti.maxCount;
		if (min) {
			if (max) {
				if (min == max)
					count = particles.length + max;
				else {
					if (min > max) {
						var temp = min;
						min = max;
						max = temp;
					}
					count = particles.length + ((Math.random() * (max - min) + min) | 0);
				}
			} else
				count = particles.length + min;
		} else if (max)
			count = particles.length + max;
		while (particles.length < count)
			particles.push(resetParticle({}, width, height));
		streamingConfetti = true;
		pause = false;
		runAnimation();
		if (timeout) {
			window.setTimeout(stopConfetti, timeout);
		}
	}

	function stopConfetti() {
		streamingConfetti = false;
	}

	function removeConfetti() {
		stop();
		pause = false;
		particles = [];
	}

	function toggleConfetti() {
		if (streamingConfetti)
			stopConfetti();
		else
			startConfetti();
	}
	
	function isConfettiRunning() {
		return streamingConfetti;
	}

	function drawParticles(context) {
		var particle;
		var x, y, x2, y2;
		for (var i = 0; i < particles.length; i++) {
			particle = particles[i];
			context.beginPath();
			context.lineWidth = particle.diameter;
			x2 = particle.x + particle.tilt;
			x = x2 + particle.diameter / 2;
			y2 = particle.y + particle.tilt + particle.diameter / 2;
			if (confetti.gradient) {
				var gradient = context.createLinearGradient(x, particle.y, x2, y2);
				gradient.addColorStop("0", particle.color);
				gradient.addColorStop("1.0", particle.color2);
				context.strokeStyle = gradient;
			} else
				context.strokeStyle = particle.color;
			context.moveTo(x, particle.y);
			context.lineTo(x2, y2);
			context.stroke();
		}
	}

	function updateParticles() {
		var width = window.innerWidth;
		var height = window.innerHeight;
		var particle;
		waveAngle += 0.01;
		for (var i = 0; i < particles.length; i++) {
			particle = particles[i];
			if (!streamingConfetti && particle.y < -15)
				particle.y = height + 100;
			else {
				particle.tiltAngle += particle.tiltAngleIncrement;
				particle.x += Math.sin(waveAngle) - 0.5;
				particle.y += (Math.cos(waveAngle) + particle.diameter + confetti.speed) * 0.5;
				particle.tilt = Math.sin(particle.tiltAngle) * 15;
			}
			if (particle.x > width + 20 || particle.x < -20 || particle.y > height) {
				if (streamingConfetti && particles.length <= confetti.maxCount)
					resetParticle(particle, width, height);
				else {
					particles.splice(i, 1);
					i--;
				}
			}
		}
	}
})();
        // start

        const start = () => {
            setTimeout(function() {
                confetti.start()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };

        //  Stop

        const stop = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };

        start();
        stop();
    </script>
</body>
</html>