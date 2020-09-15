<html>
    <head>
        <link rel="stylesheet" href="main.css" type="text/css" />
        <script type="text/javascript" src="../../Winwheel.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    </head>
    <body>
        <div align="center">
            <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>

                        <img id="spin_button" src="spin_off.png" alt="Spin" onClick="startSpin();" />
                    </div>
                </td>
                <td width="438" height="582" class="the_wheel" align="center" valign="center">
                    <canvas id="canvas" width="434" height="434">
                        <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                    </canvas>
                </td>
            </tr>
        </table>
        <script>
            // Create new wheel object specifying the parameters at creation time.
            var theWheel = new Winwheel({
                'numSegments'   : 16,   // Specify number of segments.
                'outerRadius'   : 212,  // Set radius to so wheel fits the background.
                'innerRadius'   : 120,  // Set inner radius to make wheel hollow.
                'textFontSize'  : 16,   // Set font size accordingly.
                'textMargin'    : 0,    // Take out default margin.
                'segments'      :       // Define segments including colour and text.
                [
                   {'fillStyle' : '#eae56f', 'text' : 'Jaasmijn'},
                   {'fillStyle' : '#89f26e', 'text' : 'Robert'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Jasmijn'},
                   {'fillStyle' : '#e7706f', 'text' : 'Robert'},
                   {'fillStyle' : '#eae56f', 'text' : 'Jasmijn'},
                   {'fillStyle' : '#89f26e', 'text' : 'Robert'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Prize 7'},
                   {'fillStyle' : '#e7706f', 'text' : 'Robert'},
                   {'fillStyle' : '#eae56f', 'text' : 'Prize 9'},
                   {'fillStyle' : '#89f26e', 'text' : 'Robert'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Prize 11'},
                   {'fillStyle' : '#e7706f', 'text' : 'Prize 12'},
                   {'fillStyle' : '#eae56f', 'text' : 'Prize 13'},
                   {'fillStyle' : '#89f26e', 'text' : 'Prize 14'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Prize 15'},
                   {'fillStyle' : '#e7706f', 'text' : 'Prize 16'}
                ],
                'animation' :           // Define spin to stop animation.
                {
                    'type'     : 'spinToStop',
                    'duration' : 5,
                    'spins'    : 8,
                    'callbackFinished' : 'alertPrize()'
                }
            });
            
            // Vars used by the code in this page to do power controls.
            var wheelPower    = 0;
            var wheelSpinning = false;
            
            // -------------------------------------------------------
            // Function to handle the onClick on the power buttons.
            // -------------------------------------------------------
            function powerSelected(powerLevel)
            {
                // Ensure that power can't be changed while wheel is spinning.
                if (wheelSpinning == false)
                {
                    // Reset all to grey incase this is not the first time the user has selected the power.
                    document.getElementById('pw1').className = "";
                    document.getElementById('pw2').className = "";
                    document.getElementById('pw3').className = "";
                    
                    // Now light up all cells below-and-including the one selected by changing the class.
                    if (powerLevel >= 1)
                    {
                        document.getElementById('pw1').className = "pw1";
                    }
                        
                    if (powerLevel >= 2)
                    {
                        document.getElementById('pw2').className = "pw2";
                    }
                        
                    if (powerLevel >= 3)
                    {
                        document.getElementById('pw3').className = "pw3";
                    }
                    
                    // Set wheelPower var used when spin button is clicked.
                    wheelPower = powerLevel;
                    
                    // Light up the spin button by changing it's source image and adding a clickable class to it.
                    document.getElementById('spin_button').src = "spin_on.png";
                    document.getElementById('spin_button').className = "clickable";
                }
            }
            
            // -------------------------------------------------------
            // Click handler for spin button.
            // -------------------------------------------------------
            function startSpin()
            {
                // Ensure that spinning can't be clicked again while already running.
                if (wheelSpinning == false)
                {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1)
                    {
                        theWheel.animation.spins = 3;
                    }
                    else if (wheelPower == 2)
                    {
                        theWheel.animation.spins = 8;
                    }
                    else if (wheelPower == 3)
                    {
                        theWheel.animation.spins = 15;
                    }
                    
                    // Disable the spin button so can't click again while wheel is spinning.
                    document.getElementById('spin_button').src       = "spin_off.png";
                    document.getElementById('spin_button').className = "";
                    
                    // Begin the spin animation by calling startAnimation on the wheel object.
                    theWheel.startAnimation();
                    
                    // Set to true so that power can't be changed and spin button re-enabled during
                    // the current animation. The user will have to reset before spinning again.
                    wheelSpinning = true;
                }
            }
            
            // -------------------------------------------------------
            // Function for reset button.
            // -------------------------------------------------------
            function resetWheel()
            {
                theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                theWheel.draw();                // Call draw to render changes to the wheel.
                
                document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";
                
                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
            }
            
            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
            // -------------------------------------------------------
            function alertPrize()
            {
                // Get the segment indicated by the pointer on the wheel background which is at 0 degrees.
                var winningSegment = theWheel.getIndicatedSegment();
                
                // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
                document.write("You have won " + winningSegment.text);
            }
        </script>
    </body>
</html>