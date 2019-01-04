<!--

PROJECT DESCRIPTION FORMAT:
h4: Section title
h6: Subtitle/Info-Box title
p: Regular text

FIGURES:
<figure>
  <img...>
  <figcaption>Caption</figure>
</figure>

-->
<p style = "text-align: center;">Part I: Fall 2018 Final Project write-up</p>
<br><br><br>

<h4>OVERVIEW</h4>
<p>
    This project continues the previous work done by other MSR students and the work done by Matthew Elwin to design a system in which multiple omni-directional robots collaboratively work together to pick up and move objects to a desired destination. The primary goals for this quarter were to construct three omni-directional mobile bases and develop a set of packages that can perform robot odometry, track the robot's location, execute freeform control of all the robots, and control an X number of robots as a single rigid body.
    <br><br><br>
</p>

<h4>BUILDING THE MOBILE BASES</h4>
<h6>Mechanical</h6>
<p>
    The mobile base was built using a robot kit purchased from SuperDroid robots. Some modifications were needed to meet our requirements for the project, like turning the chassis upside down to have easier access to the motors, altering the position of the batteris for better space management, drilling extra holes in the chassis for peripheral attachments, etc. Once one robot fully constructed, the other two were built with a special focus on cable management and optimal component positioning for ease of access and efficient use of space. Each robot has the following components: on-board computer (Intel NUC), 24V-15V isolated DC/DC converter, Sabertooth motor driver (x2), Tiva microcontrollers (x3), IMU, brushed DC motor with encoder (x4).
    <br><br>
</p>
<h6>Electrical</h6>
<p>
    The original version of the mobile base used an Arduino and a Kangaroo motor controller to operate the robot, but it was decided at the start of the quarter to replace these components with a setup of Tiva microcontrollers. There were a few reasons for this change. One was to standardize the electrical components used across the whole system: the mobile base and the delta arm that will eventually be placed on top. The arm already used a robust communications protocol using Tiva boards and so it would be easier to integrate it with the mobile base if everything was using the same setup. Another reason was to fix timing and latency issues that arose with the Arduino/Kangaroo combination. The libraries used with this setup required massive amounts of overhead just to make it run, and the frequency at which commands were being sent were not reliable.
    <br>
    For the final version of the mobile base, two Tiva boards were used to measure wheel velocities (two wheels per Tiva) and send motor commands via serial communication. A third Tiva, the "omni" Tiva, was used to convert input twist commands to individual wheel velocities that get sent to the two "wheel" Tiva's previously mentioned. The omni Tiva was also responsible for relaying calculated twists to the on-board computer for odometry calculations.
    <br><br><br>
</p>

<h4>SOFTWARE</h4>
<h6>Low Level Code</h6>
<p>
    Low level code involves code responsible for communication between the Tiva boards and directly interfacing with motors. The communication protocol uses UART to send data between the NUC and the Tiva, between multiple Tiva's, and between the Tiva and motor controllers. It also implements the steps described in Kevin Lynch's Modern Robotics textbook to calculate odometry of a four-wheeled mecanum robot, and to transform a twist from one reference frame to another.
    <br><br>
</p>

<h6>Higher Level Code & ROS</h6>
<p>
    ROS was used to develop packages for high level formation control, visualization, data bagging, manual robot control, and sensor integration. A high level description of the most important aspects are described below.
    <br><br>
    <b>Client:</b>
    <br>
    The client node is how the user interfaces with the whole system. It provides options for controlling robots (individually or all together), setting their locations, and sending velocity commands.
    <br><br>
    <b>Odometry Calculation:</b>
    <br>
    Each robot is constantly reading its own velocity to know where it is relative to its starting point. This is done by getting the velocity of each wheel, converting them to a twist using a four-wheeled omni-directional car model, and then using odometry update laws to calculate where the robot has travelled for a given linear and angular velocity. The robot's wheel odometry is one of the primary methods of relative localization, but this system uses three other methods as well. The robot's IMU and laser scanner both gather their own odometry data that can be fused with the odometry gathered from the wheels to get a more comprehensive, and ideally more accurate, representation of where the robot is in its environment. The third method is an external camera setup that overlooks the robot's environment and uses AR tags for tracking.
    <br><br>
    <b>Formation Control:</b>
    <br>
    Along with having the ability to move all robots at the same time relative to themsleves, this package also has a feature to control multiple robots as a single rigid body, or formation. To do this, the user first specifies the the point from which the rigid body's movements will be executed. Knowing the transformation between the robots and this pivot point, as well as the transformation between the robot and a world frame coordinate, we can use planar rigid body dynamics to convert an input twist at the pivot to an output twist at any other point on the rigid body. In this case, each robot's location would be one of those points. This output twist is then represented in the robot's own coordinate frame so that it knows how to command its wheels.
    <br><br>
    <b>Data Visualization</b>
    <br>
    The data visualizer does just that - it records positional data for a desired time frame and then displays the information with a set of graphs. This was especially helpful seeing the performance of how one odometry method compares to another.
    <br><br>
    <b>Velocity Smoothing</b>
    <br>
    Executing raw twist commands result in very fast and agile maneuverability, but it also results in a significant amount of slipping and inaccurate odometry calculations. One way to prevent this is to add a filter to the robot's velocity so that it does not accelerate too quickly. This system runs a few instances of a twist filter that can control for max speed and acceleration for both linear and angular components of a twist. These "smoothed" twists are what the robot ultimately executes.
    <br><br><br>
</p>

<h4>IMPROVEMENTS</h4>
<p>
    A main area of improvemement is code structure. We should certainly work to continue to make the code more modular and standardized. Having an object oriented structure allows for easy "plug and play" scenarios for testing out new features, debugging existing ones, and creating a more scalable system. In many areas the code is also constructed to work for a maximum of three robots. Ideally, we would want a system that could control an arbitrary number of robots (within reason).
    <br>
    A second area that needs more development is sensor integration and odometry fusion. Although we are able to get odometry data from several differet sources, we have only just started fusing these pieces of information together to see if we can improve our current odometry performance. With more reliable odometry we can get better localization, better formation control, and a more robust mobile robot overall.
    <br><br><br>
</p>

<p style = "text-align: center;">-----------------------------------------------------------------------------------------------------------------<br>
Part II: Spring 2018 write-up</p>
<br><br><br>

<h4>OVERVIEW</h4>
<p>
  When working with large or heavy objects, it's often times better to handle them with the help of a machine. However, it would be fantastic if a machine, or a group of machines, can take on the task without any human intervention. The end goal of this project is to be able to simultaneously and wirelessly control three mobile robots capable of cooperatively manipulating large objects. As a continuation of a project from last year's MSR cohort, this year will focus on finalizing the design for a single robot, making two more of them, and setting up communication/mapping capabilities for each robot. Information about last year's progress can be found <a href = "https://echeng22.github.io/robotics/Mobile-Base.html">here</a>.
  <br><br><br>
</p>

<h4>SPRING 2018 PROGRESS</h4>
<p>
  The primary agenda for this quarter was to to take the current setup of the mobile base and make improvements so that it was easier to use and more robust. There were a number of documented issues in the link provided above, and a few more were brought up over the course of this quarter. Once the new design is confirmed to work, we will order parts to build two additional robots.
  <br><br>
</p>

<h6>Getting a new chassis</h6>
<p>
  The current model often fails in keeping the wheel shaft firmly mounted to the sprocket that turns it. This results in wheel slipping even during regular operation. The kit used to build the base, provided by <a href = "https://www.superdroidrobots.com/shop/item.aspx/programmable-mecanum-wheel-vectoring-robot-ig52-db/1788/">SuperDroid</a>, has since updated their kit to address this issue. Unfortunately, we could not simply just buy a few new parts to retrofit our current base, so we had to purchase a complete wheel and chassis set. Ordering individual parts to fit our current model was considered, but it proved to be difficult to find a reliable setup we needed at a reasonable price.
  <br><br>
</p>

<h6>Purchase an on-board computer</h6>
<p>
  The robot was previously controlled using a laptop with ensor readings from an Arduino were passed along to the computer for computation. This is useful for prototyping but it becomes a hassle when it comes to making this robot fully "untethered." After some deliberation, we decided to use the <a href = "https://www.intel.com/content/www/us/en/products/boards-kits/nuc/kits/nuc7i7bnh.html">Intel NUC7i7BNH</a> for its ease of use, compatibility with ROS, size, computation power, and price tag. The NUC will be mounted on the mobile base and powered by the same battery that drives the motors. An isolated DC/DC converter takes the 24V from the batery and outputs an isolated 15V to power the NUC.
  <br><br>
</p>

<h6>Design and isolated circuit</h6>
<p>
  The previous version of the base has all of its components connected to a common ground. Though it may be okay to operate the device like this, we would ideally like to have the motors and their drivers/controllers completely isolated from our other electronics (NUC, Arduino). To address this problem, we purchased an isolated DC/DC converter (mentioned above) to power the NUC. On the motor communication side, we used two optoisolator chips (one for each motor/controller/driver unit) to isolate the Arduino from the Kangaroo motor controllers.
  <br><br>
</p>

<h6>Design an emergency stop switch</h6>
<p>
  We want to be able to safely disengage the robot, which does not necessarily mean cutting off power to the whole machine. Having the ability to keep the computer on would be huge plus so that we can run an emergency shutoff procedure if the button is ever pressed. The Kangaroo controllers have a built in automatic emergency stop that is activated if connection on its S1 pin is severed. We confirmed this feature and implemented it on the PCB shield. Each optoisolator has an output enable/disable pin which can be used to sever our S1 connection to the Kangaroo. The switch is positioned such that when it is not activated, the enable/disable pin is pulled to high, enabling output to the Kangaroo. When the button is pressed, the pin is driven low to sever the connection. A logic line is also connected to the switch that goes back into the Arduino and the robot arm that i to be mounted on top of the base. This allows the computer to know when the button has been pressed so that we can run any shutoff procedures in software.
  <br><br><br>
</p>

<figure>
  <img class = "proj-img" src = "/img/mobile_base.png">
  <figcaption>Schematic of the mobile base including the Arduino and emergency stop switch</figure>
</figure>
<br><br>

<h6>Make the Arduino shield</h6>
<p>
  A custom Arduino shield was made to hold the optoisolators, emergency stop switch, and communication lines to the motor controllers. This prototype board was milled here at the Northwestern mechanical engineering department. Once a workable version of this board is finalized, we will have more professionally made for the remaining robots.
  <br><br><br>
</p>

<figure>
  <img class = "proj-img" src = "/img/arduino_shield.png">
  <figcaption>Arduino shield PCB layout (designed by <a href = "https://swiz23.github.io/Portfolio/">Solomon Wiznitzer</a>)</figure>
</figure>
<br><br>

<h6>Set up a clean physical circuit design</h6>
<p>
  Once the schematic for the complete mobile base was finalized, the next step was to design the physical layout of the base - the connectors we would use, type of wire, location of components, what mounts to make/buy. The current setup was put together as an initial working prototype, but now that we have come up with several improvements, the construction should be redone so that it is cleaner, safer, and much more robust.
  <br><br><br>
</p>

<h4>SUMMER 2018 PLANS</h4>
<p>
  Plans for this summer are to hopefully complete building the new version of the mobile base as well as verify the PCB shield works. Once we confirm everything works as expected, we will go ahead and order the parts to build the remaining two robots. Ideally, it would be fantastic to have all three robots completed by the end of the summer, but we will see how that goes.
  <br><br><br>
</p>

<h4>AGENDA FOR FALL 2018</h4>
<p>
  The plan for the fall quarter is to begin diving into the software components of the projects: using sensor data and ROS to do localization, pose estimation, and mapping. The details of what we plan to focus on are still being discussed.
</p>
