
<?php
session_start();

// Check if the username is set in the session
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Cute+Font&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DREAMY DUEL | MAIN</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.freepik.com/512/566/566294.png">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <style>
        .swal2-confirm {
            background-color: #ff69b4 !important;
            color: #fff !important;
        }

        .swal2-cancel {
            background-color: #ff1493 !important;
            color: #fff !important;
        }

        #ticTacToeTitle {
            font-family: 'Brush Script MT', 'Brush Script Std', cursive;
            margin-top: -50px;
            font-size: 40px;
            color: white;
        }

        #menuTitle {
            font-family: 'Cute Font', cursive;
            text-align: center;
            margin-bottom: 20px;
        }

        .wrapper {
            display: grid;
            place-content: center;
            min-height: 5px;
            font-family: "Oswald", sans-serif;
            font-size: 100px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-color);
        }

        .wrapper>div {
            grid-area: 1/1/-1/-1;
        }

        .top {
            clip-path: polygon(0% 0%, 100% 0%, 100% 48%, 0% 58%);
        }

        .bottom {
            clip-path: polygon(0% 60%, 100% 50%, 100% 100%, 0% 100%);
            color: transparent;
            background: -webkit-linear-gradient(177deg, rgb(93, 93, 93) 53%, var(--text-color) 65%);
            background: linear-gradient(177deg, rgb(107, 106, 106) 53%, var(--text-color) 65%);
            background-clip: text;
            -webkit-background-clip: text;
            transform: translateX(-0.02em);
        }

        @media (max-width: 768px) {

            .wrapper {
                font-size: 40px;
            }

            .skill_stack {
                width: 50%;
            }
        }

        .circle {
            position: fixed;
            border: solid 1px #ccc;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: rgba(255, 0, 0, 0.5);
            pointer-events: none;
            z-index: 9999;
        }

        * {
            box-sizing: border-box;
        }

        :root {
            --background-color: black;
            --text-color: hsl(0, 0%, 100%);
        }

        h1,
        p {
            color: white;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        #main-screen {
            display: none;
            font-family: 'Montserrat', sans-serif;
        }


        .image-container {
            position: relative;
            transition: transform 0.3s ease;
        }

        .image-container:hover {
            transform: translateY(-10px);
        }

        body {
            background-position: center bottom;
            width: 100%;
            background-image: url('https://wallpapercave.com/wp/wp10396319.jpg');
            -webkit-animation: slidein 100s;
            animation: slidein 15s;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;

            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;

            -webkit-animation-direction: alternate;
            animation-direction: alternate;
        }

        @-webkit-keyframes slidein {
            from {
                background-position: bottom;
                background-size: 3000px;
            }

            to {
                background-position: -100px 0px;
                background-size: 2750px;
            }
        }

        @keyframes slidein {
            from {
                background-position: top;
                background-size: 3000px;
            }

            to {
                background-position: -100px 0px;
                background-size: 2750px;
            }

        }

        html::-webkit-scrollbar {
            display: none !important;
        }

        body,
        html {
            -ms-overflow-style: none;
            scrollbar-width: none;
            overflow-y: scroll;
            height: 100%;
        }

        .menu-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .menu-link {
            margin-bottom: 10px;
        }

        #welcome {
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            font-size: 20px;
        }

        .btn {
            padding: 10px;
            border-radius: 50px;
            background-color: #ff69b4;
            /* Pink background */
            color: #fff;
            /* White text */
            border: none;
        }

        .menu-container {
            text-align: center;
        }

        #menuTitle,
        #ticTacToeTitle,
        .btn {
            display: none;
        }
    </style>
</head>

<body>
    <iframe src="nocopyrightpls.mp3" allow="autoplay" style="display:none" id="iframeAudio">
    </iframe>

    <audio autoplay loop id="playAudio" volume="-03">
        <source src="nocopyrightpls.mp3" volume="-03" type="audio/mpeg">
    </audio>
    </audio>
    <div class="menu-container">
        <div class="container">
            <div>
                <h2 id="menuTitle" style="color: white; font-size: 100px; position: relative; top: -50px;">D R E A M Y &nbsp; D U E L</h2>
                <div id="ticTacToeTitle" style ="position: relative; top: -30px;">Tic Tac Toe</div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-light col-md-3 mb-2" id="playButton">PLAY</button>
                </div>
            </div>
            <!-- Additional menu buttons if needed -->
            <!-- Logout button -->
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-light col-md-3 mb-2" id="logoutButton">LOGOUT</button>
                </div>
            </div>
        </div>
    </div>

    <div id="welcome">Welcome <?php echo $username; ?></div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.onload = function () {
            document.getElementById('menuTitle').style.display = 'block';
            document.getElementById('ticTacToeTitle').style.display = 'block';
            var buttons = document.querySelectorAll('.btn');
            buttons.forEach(function (button) {
                button.style.display = 'inline';
            });


            TweenMax.staggerFrom(".btn", 2, { scale: 0.5, opacity: 0, delay: 0.5, ease: Elastic.easeOut, force3D: true }, 0.2);

            

            var title = document.getElementById('menuTitle');
            var subtitle = document.getElementById('ticTacToeTitle');
            TweenMax.from(title, 1, { opacity: 0, y: -50, ease: Power2.easeInOut });
            TweenMax.from(subtitle, 1, { opacity: 0, y: -50, ease: Power2.easeInOut });

            
			


            
        };
        document.getElementById("playButton").addEventListener("click", function () {
            Swal.fire({
                title: 'Choose Game Mode',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Player vs Player',
                cancelButtonText: 'Player vs AI',
                reverseButtons: true,
                customClass: {
                    container: 'dark-theme'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.setItem('gameMode', 'Player vs Player');
                    localStorage.setItem('difficulty', '');
                    proceedToGame();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Choose Difficulty',
                        input: 'select',
                        inputOptions: {
                            'easy': 'Easy',
                            'difficult': 'Difficut',
                            'expert': 'Expert'
                        },
                        inputPlaceholder: 'Select a difficulty',
                        showCancelButton: true,
                        reverseButtons: true,
                        inputValidator: (value) => {
                            if (!value) {
                                return 'You must choose a difficulty'
                            }
                        },
                        customClass: {
                            container: 'dark-theme'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            localStorage.setItem('gameMode', 'Player vs AI');
                            localStorage.setItem('difficulty', result.value);
                            proceedToGame();
                        }
                    })
                }
            })
        });

        function proceedToGame() {
            window.location.href = 'tictactoe-game.html';
        }

        document.getElementById("logoutButton").addEventListener("click", function () {
    	localStorage.removeItem('username');
    	goTologinPage(); 
		});

		function goTologinPage() {
    
    	window.location.href = "login.php";
}
        var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
        if (!isChrome) {
            $('#iframeAudio').remove()
        }
        else {
            $('#playAudio').remove()
        }


    </script><script src="tictactoe-game.html"></script>
      <footer style= "background-color: #ff69b4; color: white; text-align: center; padding: 20px;">
        &copy; 2024 Mai. All rights reserved.
    </footer>
	<body>