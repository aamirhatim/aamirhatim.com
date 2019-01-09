<!--

PROJECT DESCRIPTION FORMAT:
h4: Section title
h6: Subtitle/Info-Box title
p: Regular text

FIGURES:
<figure>
  <img src = ...>
  <figcaption>Caption</figure>
</figure>
-->

<h4>Overview</h4>
<p>
    When it comes to moving large objects, coordination becomes vital as risk to damage increases. If not everyone is working together, it could lead to disatrous consequences on a factory floor. One method to mitigate this risk is to have a fleet of autonomous agents that can take the place of humans in doing these tasks. The benefits of this are two-fold. First, the likelihood of injury decreases since there are no humans directly involved in moving. Second, performance increases when using robots that can react and communicate more quickly than its average human counterpart, which also allows humans to focus on other important tasks that need to be done.
</p><p>
    The goal of this ongoing project is to create an autonomous fleet of mobile robots, each one made up of an omni-directional mobile base and a delta arm, that are capable of sensing their environment and move together as a single unit (like a rigid body) as well as relative to their own positions (like a fleet) so that they can collaboratively work together to pick up and move large, unwieldy objects to a desired destination - all without human intervetion. During the Spring and Fall quarters of 2018, my partner, <a href = "https://swiz23.github.io/Portfolio/">Solomon Wiznitzer</a> and I worked alongside our advisor <a href = "https://nxr.northwestern.edu/people/matthew-elwin">Matthew Elwin</a> to get closer towards this end goal. Continuing the work of previous MSR students, we were able to construct three mobile bases, control them both as a fleet and as a rigid body, and integrate multiple on-board sensors for localization and odometry. By the end of the project, we had built a solid foundation for future students to better integrate multi-agent control and higher level processes like SLAM and coordinated movement.
</p><p>
    Special thanks also to <a href = "https://nxr.northwestern.edu/people/jarvis-schultz">Jarvis Schultz</a>, <a href = "https://nxr.northwestern.edu/people/bill-hunt">Bill Hunt</a>, and the <a href = "https://nxr.northwestern.edu">Northwestern NxR Lab</a> for the invaluable help and support to make this project happen.
</p>

<h4>Building the Mobile Bases</h4>
<p><i>Note: Complete build instructions, as well as a bill of materials, CAD models, schematics, etc., are documented in the project's GitHub repository. Please contact Matthew Elwin for more information.</i></p><br>

<h6>Mechanical</h6>
<p>
    The mobile base was built using a <a href = "https://www.superdroidrobots.com/shop/item.aspx/programmable-mecanum-wheel-vectoring-robot-ig52-db/1788/">robot kit</a> purchased from SuperDroid robots. Some modifications were needed to meet our requirements for the project, like turning the chassis upside down to have easier access to the motors, altering the position of the batteris for better space management, drilling extra holes in the chassis for peripheral attachments, etc. Once one robot was fully constructed and operational, two more were built with a special focus on cable management and optimal component positioning for ease of access and efficient use of space.
</p>

<div class = "info-box">
    <h6>Key Components for the Mobile Base</h6>
    <ul>
        <li>12V 18Ah SLA batteries (x2)</li>
        <li>Intel NUC7i7BNH PC</li>
        <li>24V-15V isolated DC/DC converter</li>
        <li>Sabertooth motor driver (x2)</li>
        <li>Tiva C LaunchPad boards (x3)</li>
        <li>Inertial Measurement Unit (IMU) + magnetometer</li>
        <li>Brushed DC motor with encoder (x4)</li>
        <li>Electrostatic discharge drag chains (x2)</li>
        <li>Emergency stop button (never forget!)</li>
    </ul>
</div>

<h6>Electrical</h6>
<p>
    The original version of the mobile base used an Arduino and a Kangaroo motor controller to operate the robot, but it was decided at the start of the quarter to replace these components with a setup of <a href = "http://processors.wiki.ti.com/index.php/Tiva_C_Series_TM4C123G_LaunchPad">Tiva C LaunchPad</a> boards. There were a few reasons for this change. One was to standardize the electrical components used across the whole system: the mobile base and the delta arm that will eventually be placed on top. The arm already used a robust communications protocol using Tiva boards and so it would be easier to integrate it with the mobile base if everything was using the same setup. Another reason was to fix timing and latency issues that arose with the Arduino/Kangaroo combination. The libraries used with this setup required massive amounts of overhead just to make it run, and the frequency at which commands were being sent were not reliable.
</p><p>
    For the final version of the mobile base, two Tiva boards were used to measure wheel velocities (two wheels per Tiva) and send motor commands via serial communication. A third Tiva, the "omni" Tiva, was used to convert input twist commands to individual wheel velocities that get sent to the two "wheel" Tiva's previously mentioned. The omni Tiva was also responsible for relaying calculated twists to the on-board computer for odometry calculations.
</p><p>
    Two custom boards were designed to connect the Tiva boards to each other, the on-board PC, and to the motor drivers. The omni custom board created a communication line between the PC and the omni Tiva. It also created communication lines between the two wheel Tiva boards by using RS-485 chips and ethernet cabling. The wheel custom board created two isolated circuits, one for the motors powered with 24V, and another for all the logic components running on 15V. This board also had a communication line from the the wheel Tiva to the Sabertooth motor controllers. All boards had an input for an emergency stop as well.
</p>

<figure>
    <img src = "img/omni_block_diagram.svg" width = "600px">
    <figcaption>
        High level diagram of the communication connections on a single omni robot.
    </figcaption>
</figure>

<h4>Software</h4>
<h6>Low Level Code</h6>
<p>
    Low level code involves code responsible for communication between the Tiva boards and directly interfacing with motors. The communication protocol uses UART to send data between the NUC and the Tiva, between multiple Tiva's, and between the Tiva and motor controllers. It also implements the steps described in Kevin Lynch's Modern Robotics textbook to calculate odometry of a four-wheeled mecanum robot, and to transform a twist from one reference frame to another.
</p>

<h6>Higher Level Code & ROS</h6>
<p>
    ROS was used to develop packages for high level formation control, visualization, data bagging, manual robot control, and sensor integration. A high level description of the most important aspects are described below.
</p><p>
    <b>Client:</b>
    <br>
    The client node is how the user interfaces with the whole system. It provides options for controlling robots (individually or all together), setting their locations, and sending velocity commands.
</p>

<figure>
    <img src = "img/omni_control_setup.svg" width = "300px">
    <figcaption>
        High level diagram of multi-robot control.
    </figcaption>
</figure>

<p>
    <b>Odometry Calculation:</b>
    <br>
    Each robot is constantly reading its own velocity to know where it is relative to its starting point. This is done by getting the velocity of each wheel, converting them to a twist using a four-wheeled omni-directional car model, and then using odometry update laws to calculate where the robot has travelled for a given linear and angular velocity. The robot's wheel odometry is one of the primary methods of relative localization, but this system uses three other methods as well. The robot's IMU and laser scanner both gather their own odometry data that can be fused with the odometry gathered from the wheels to get a more comprehensive, and ideally more accurate, representation of where the robot is in its environment. The third method is an external camera setup that overlooks the robot's environment and uses AR tags for tracking.
</p><p>
    <b>Formation Control:</b>
    <br>
    Along with having the ability to move all robots at the same time relative to themselves, this package also has a feature to control multiple robots as a single rigid body, or formation. To do this, the user first specifies the the point from which the rigid body's movements will be executed. Knowing the transformation between the robots and this pivot point, as well as the transformation between the robot and a world frame coordinate, we can use planar rigid body dynamics to convert an input twist at the pivot to an output twist at any other point on the rigid body. In this case, each robot's location would be one of those points. This output twist is then represented in the robot's own coordinate frame so that it knows how to command its wheels.
</p>

<figure>
    <img src = "img/omni_control_modes.svg" width = "500px">
    <figcaption>
        Left: Rigid body control - input twists for a specified pivot point are translated to different twists for each robot to maintain a formation. Right: Freeform control - input twist is executed by all robots relative to their own positions.
    </figcaption>
</figure>

<p>
    <b>Data Visualization</b>
    <br>
    The data visualizer does just that - it records positional data for a desired time frame and then displays the information with a set of graphs. This was especially helpful seeing the performance of how one odometry method compares to another.
</p>

<figure>
    <img src = "img/tracking_omni_1.png" width = "800px">
    <figcaption>
        Left: Visualization of wheel odometry and AR-tag tracking. Right: Difference in x, y, and theta over time.
    </figcaption>
</figure>

<p>
    <b>Velocity Smoothing</b>
    <br>
    Executing raw twist commands result in very fast and agile maneuverability, but it also results in a significant amount of slipping and inaccurate odometry calculations. One way to prevent this is to add a filter to the robot's velocity so that it does not accelerate too quickly. This system runs a few instances of a twist filter that can control for max speed and acceleration for both linear and angular components of a twist. These "smoothed" twists are what the robot ultimately executes.
</p>

<figure>
    <img src = "img/twist_filter_diagram.svg" width = "600px">
    <figcaption>
        A twist is read from an input source, filtered to satisfy acceleration and speed constraints, and then sent as an output twist to the omni robot.
    </figcaption>
</figure>

<p>
    <b>Localization and Mapping</b>
    <br>
    We use Gmapping and AMCL to map out the robot's environment with the Hokuyo laser scanner and IMU.
</p>

<h4>Improvements</h4>
<p>
    A main area of improvemement is code structure. We should certainly work to continue to make the code more modular and standardized. Having an object oriented structure allows for easy "plug and play" scenarios for testing out new features, debugging existing ones, and creating a more scalable system. In many areas the code is also constructed to work for a maximum of three robots. Ideally, we would want a system that could control an arbitrary number of robots (within reason).
</p><p>
    A second area that needs more development is sensor integration and odometry fusion. Although we are able to get odometry data from several differet sources, we have only just started fusing these pieces of information together to see if we can improve our current odometry performance. With more reliable odometry we can get better localization, better formation control, and a more robust mobile robot overall.
</p>
