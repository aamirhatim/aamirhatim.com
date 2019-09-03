<h4>Overview</h4>
<p>
  One of the fundamental aspects of robotics and mechatronics is having the ability to control movement. Just like how we keep track of our muscle movements (eyes, touch, etc.), a robot needs a set of sensors so it knows its current state at any moment. This project uses mainstream sensors like encoders and current sensors to provide position and movement information about a spinning motor. The motor also has a MATLAB GUI so that a user can control the motor's speed and direction, maintain a position angle, follow an input trajectory, read encoder information, and read the motor's current draw. The PIC32MX250F128B microcontroller was used on board the <a href = "http://hades.mech.northwestern.edu/index.php/NU32">NU32</a> board designed at Northwestern University for implementation.
</p>

<div class = "info-box">
  <h6>Hardware Components</h6>
  <ul>
    <li>Brushed DC motor (with encoder)</li>
    <li>NU32 microcontroller board</li>
    <li>Quadrature encoder counter (SPI communication)</li>
    <li>MAX9918 current-sense amplifier</li>
    <li>DRV8835 H-bridge</li>
    <li>6V battery pack</li>
    <li>Various resistors and capacitors</li>
  </ul>
</div>

<h4>Software Implementation</h4>
<p>
  The controller uses two feedback loops: an inner high-frequency 5kHz current controller that controls the PWM output to the motor, and an outer low-frequency 200Hz position controller that controls the location of the motor relative to some reference value.
</p>

<h6>The Current Controller</h6>
<p>
  For an electric motor, the output torque is drectly proportional to the current. Therefore, to controll the speed and power of the motor, we can change the amount of current passing through the motor. This is done by setting the duty cycle of a PWM signal that corresponds to the desired motor torque. The MAX9918 current-sense amplifier is used to read the current at any given moment - specifically, it reads the current at 5kHz for the control loop. A PI controller is implemented to set the right duty cycle.
</p><p>
  The PWM is passed through the DRV8835 H-bridge which safely directs the current through the motor. The H-bride allows for direction and braking control using a set of four switch-diode pairs.
</p>

<figure>
  <img src = "/img/icontrol.png" width = "550px">
  <figcaption>Performance of the current controller. Blue is the desired output and orange is the actual result.</figcaption>
</figure>

<h6>The Position Controller</h6>
<p>
  An optical encoder is used to determine the position of the motor. This type of encoder is made up of a transparent disk with several thin opaque lines around its circumference and a light source/photo-detector pair. Light from the light source passes through the transparent parts of the disk but does not pass through the opaque lines. As the motor spins, the light that passes through comes in small bursts and is picked up by the photo-detector, which can be used as a counter. Knowing the number of lines on the disk, we can then calculate the position of the motor using the number of counts picked up by the photo-detector. In this project, a quadrature decoder is used to count the start and end of a line. This allows us to keep track of which direction the motor is spinning in as well.
</p><p>
  A PID controller is used for position control. It uses encoder information to determine how far the motor is from its desired postion and calculates the required current needed to bring the motor to that position.
</p>

<figure>
  <img src = "/img/pos_control.png" width = "550px">
  <figcaption>Performance of the position controller for a cubic trajectory. Blue is the desired output and orange is the actual result.</figcaption>
</figure>

<h6>MATLAB Interface</h6>
<p>
  The user controls all low level motor functions through a MATLAB menu screen. The controller uses UART communication to send any relevant information to the computer such as encoder counts, motor position, position and current gain control, speed control, trajectory loading and executing, resetting the encoder, and unpowering the motor. The program also outputs error plots for trajectories the motor executes.
</p>
