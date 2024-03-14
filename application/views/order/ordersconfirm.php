
<style type="text/css">

body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }


a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

@media screen and (max-width: 480px) {
    .mobile-hide {
        display: none !important;
    }
    .mobile-center {
        text-align: center !important;
    }
}
div[style*="margin: 16px 0;"] { margin: 0 !important; }


.confetti-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
}

.confetti {
  position: absolute;
  width: 10px; /* Adjust the size of the confetti */
  height: 10px; /* Adjust the size of the confetti */
  opacity: 0; /* Initially hidden */
  transform-origin: 50% 50%;
  animation: confettiFall 5s linear;
}

@keyframes confettiFall {
  0% {
    transform: translateY(0) rotate(0);
  }
  1% {
    opacity: 1; /* Fade in at 1% of the animation */
  }
  100% {
    transform: translateY(100vh) rotate(360deg);
    opacity: 0; /* Fade out at the end of the animation */
  }
}




</style>
<body style="margin: 0 !important; padding: 0 !important;">


<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them. 
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<div class="confetti-container">
    <!-- Generate confetti dynamically using JavaScript -->
  </div>
    <tr>
        <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;top: 40px;position: relative;margin-bottom: 86px;">
            <tr>
                <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#ffffff">
               
                <div style="display:inline-block; max-width:600px; min-width:100%; vertical-align:top; width:100%;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                        <tr>
                            <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                <img src="<?= base_url('assets/site/images/green-check.png'); ?>" width="125" height="120" style="display: block; border: 0px;" /><br>
                                <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                    Thank You For Your Order!
                                </h2>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                    <a href="<?= base_url(''); ?>">
                                        Go Back to Home
                                    </a>
                                </p>
                                <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                    Going to Profile, Redirecting in <span id="countdown">5</span> seconds...
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
                </td>
            </tr>
            
            
        </table>
        </td>
    </tr>
</table>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const confettiContainer = document.querySelector(".confetti-container");

            // Number of confetti particles
            const confettiCount = 200;

            // Define a color theme
            const colorTheme = ['#3498db', '#e74c3c', '#2ecc71', '#f39c12', '#9b59b6', '#1abc9c', '#d35400', '#27ae60'];

            for (let i = 0; i < confettiCount; i++) {
                const confetti = document.createElement("div");
                confetti.className = "confetti";
                confetti.style.left = `${Math.random() * 100}vw`;
                confetti.style.animationDuration = `${Math.random() * 5}s`;
                confetti.style.backgroundColor = getRandomColorFromTheme();
                confettiContainer.appendChild(confetti);
            }

            function getRandomColorFromTheme() {
                return colorTheme[Math.floor(Math.random() * colorTheme.length)];
            }
        });
        // Timer function
        function countdown() {
            var seconds = 5; // Set the countdown duration
            var countdownElement = document.getElementById('countdown');

            var timer = setInterval(function() {
                seconds--;
                countdownElement.innerText = seconds;

                if (seconds <= 0) {
                    clearInterval(timer);
                    // Redirect using JavaScript
                    <?php if($this->auth_user->role == 'buyer'){ ?>
                        window.location.href = '<?= base_url("/orders"); ?>'; // Change "destination-page" to your desired destination URL
                    <?php } ?>
                    <?php if($this->auth_user->role == 'admin'){ ?>
                        window.location.href = '<?= base_url("/admin/orders/"); ?>'; // Change "destination-page" to your desired destination URL
                    <?php } ?>
                }
            }, 1000);
        }

        // Start the countdown when the page loads
        window.onload = function() {
            countdown();
        };
    </script>

