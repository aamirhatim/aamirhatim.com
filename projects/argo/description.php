<!--

PROJECT DESCRIPTION FORMAT:
h4: Section title
h5: Caption
h6: Subtitle/Info-Box title
p: Regular text

-->

<h4>OVERVIEW</h4>
<p>
  With the right kind of sensors, we can (reliably) give a robot full control over many of its own actions. This opens up the door to several uses that can make our everyday lives much more convenient - from small house cleaners like the Roomba all the way to massive auto-manufacturing factories that crank out thousands of cars each year. The inspiration for this project came from the hustle and bustle of the airport, a place that can make or break your whole day of traveling depending on your luck. Wouldn't it be nice if you didn't have to carry your luggage around? Even better, wouldn't it be great if your luggage followed <i>you</i> so you could focus more on finding the right gate? The goal of this project was to design an autonomous robot, from scratch*, that can robustly follow a target. By using a RGB camera and an AR tag, Argo is able to track and follow a known target without any wires or internet connection.
  <br><br><br>
</p>

<h4>HARDWARE</h4>
<p>
  Currently, Argo uses only uses two sensors to get information about itself and the environment: a RGB camera and an encoder on each wheel to measure speed and rotation. Since the original idea for Argo was to function as a carry-on suitcase, it is equipped with motors so that it can haul up to approximately 30 pounds and roll as fast as a human normally walks (about 3 miles per hour). It also has a large enough battery to run the motors for about 4-5 hours until it has to be rolled like a traditional suitcase. Argo uses a Raspberry Pi Model 3 as its CPU.
</p>

<div class = "info-box">
  <h6>Components</h6>
  <ul>
    <li>Raspberry Pi Model 3</li>
    <li>Raspbery Pi Camera Modul v2</li>
    <li>12V Brushed DC Motor w/ 1:50 gearbox</li>
    <li>12V 2800mAh NiMh rechargeable battery</li>
    <li>2 14cm Wheels and Ball Caster Wheel</li>
    <li>RoboClaw 2x15A Brushed Motor Controller</li>
    <li>Power cutoff switch (never forget!)</li>
  </ul>
</div>

<h4>SOFTWARE</h4>
<p>
  Argo uses ROS Kinetic to communicate effectively with all of its sensors. There are several nodes that can be run depending on the mode Argo is set up for (more detail on this below). The RoboClaw controller has it's own proprietary tuning software (IonMotion) which was used for setting up basic motor functionality. The controller also has an extensive library for serial communication with a microcontroller like reading encoder values and setting speed and direction for multiple motors. The Raspberry Pi is running an optimized version of Ubuntu MATE 16.04 on a 32GB microSD card.
  <br><br>
  Two packages are required to run Argo. To publish raw camera data to an Image topic, <a href = "https://github.com/dganbold/raspicam_node" target = "blank">raspicam_node</a> package was used. For detecting AR tags, the popular <a href = "https://github.com/ros-perception/ar_track_alvar" target = "blank">ar_track_alvar</a> package by Alvar was used. As an optional package, image_view can be used to view the camera feed, but this can also be done through several other methods. For a complete description on setting up the Raspberry Pi, ROS, and any packages, see the Github documentation.
</p>

<div class = "info-box">
  <h6>Code Structure</h6>
  <table class = "info-box-table">
    <tr>
      <th>9</th>
      <th>3</th>
      <th>1</th>
    </tr>
    <tr>
      <td>nodes</td>
      <td>launch files</td>
      <td>service</td>
    </tr>
  </table>
  <br><br>

  <h6>ROS Topics</h6>
  <ul>
    <li>/raspicam_node/camera_raw</li>
    <li>/raspicam_node/camera_info</li>
    <li>/argo/key_cmd</li>
    <li>/argo/key_controls</li>
    <li>/argo/encoders</li>
    <li>/argo/wheel_speeds</li>
    <li>/visualization_marker</li>
  </ul>
</div>

<h4>OPERATING MODES</h4>
<h6>Object Tracking</h6>
<p>
  The primary feature of Argo is the Object Tracking mode. In this mode, Argo uses its camera to find an AR tag. Once located, it uses the tag's depth and horizontal displacement from the center of the camera image to determine its speed and turning angle. Argo first determines its forward or backward speed by observing the percieved depth of the tag. Distances less than 0.5 meters will result in backwards movement and distances larger than 0.7 meters will make Argo move forward. For smooth movement, speed is proportional to the distance. The farther the tag is from Argo, the faster it will move (up to a specified maximum speed) so it can catch up to the target. Once it gets close, it will slow down and stop once it is within the 0.5-0.7 meter stopping range. The same idea is used for backwards movements. The closer the tag is to Argo, the faster it will move away from it until is is within the stopping range. Once linear speed has been determined, the motor controller looks at the x location of the tag. The farther left or right the tag is from Argo's center of view, the more it will turn. Turn commands are denoted as positive and negative speeds of the same magnitude. A left turn will have a positive right wheel speed and a negative left wheel speed. A right turn will have the opposite. These turning speeds are then added to the left and right forward speeds to obtain the final speeds for each wheel.
  <br><br>
</p>

<h6>Manual Drive</h6>
<p>
  Putting Argo in manual drive lets you teleoperate the robot from a keyboard. To do this, you must either be able to SSH into the robot, or have a wireless keyboard directly connected to it. Use the WSAD keys to move Argo around. Press E to stop and Q to exit manual drive mode. The "Enter" button must be pressed to send a new command, otherwise it will continue to run the last entered command. Any unexpted commands will make Argo stop as a precautionary measure. The A and D keys spin Argo left and right, and the W and S keys move it forwards and backwards.<br><br>
  To run in Manual mode, launch the manual_mode.launch file. This launch file starts a service (direction_srv) and two nodes (keyboard_cmd, manual_drive). The Direction service is subscribed to the /argo/key_cmd topic which contains keystroke values entered by the user via the keyboard_cmd node. When called, the Direction service simply returns the most recent keystroke. This setup is needed so that the manual_drive node can repeatedly get the last known direction and publish it to the motor controller topic.
  <br><br>
</p>

<h6>Path Following</h6>
<p>
  To run in Path Following mode, run the path_driver node after running roscore. In this mode, Argo will follow a predefined path (line, circle, figure-eight, or curve). This option was primarily used for experimenting with wheel velocity commands sent to the motor controller, and so it is not fully developed and recommended only for testing purposes. the manual_drive node must be run immediately after exiting the path_driver node to stop the robot, otherwise it will continue running its most recent command. Given a path on the x-y plane, Argo determines its linear and angular velocity which are sent to the motor controller to translate into wheel speeds.
  <br><br><br>
</p>

<h4>TIMELINE (JAN 15 - MAR 23, 2018)</h4>
<br>
<table style= "width: 120%; font-size: 16pt; margin: 0 auto; table-layout: fixed; position: relative; right: 10%;">
  <tr>
    <th><h6>January</h6></th>
    <th><h6>February</h6></th>
    <th><h6>March</h6></th>
  </tr>

  <tr style = "vertical-align: top;">
    <td>
      <ul>
        <li>Project idea formulation</li>
        <li>Requirements and specifications gathering</li>
        <li>Parts research and ordering</li>
        <li>Initial construction</li>
      </ul>
    </td>

    <td>
      <ul>
        <li>Complete first prototype build</li>
        <li>Research methods in object tracking</li>
        <li>Research methods in motor control and navigation</li>
        <li>Begin coding motor controller</li>
        <li>Begin coding tracking controller</li>
      </ul>
    </td>

    <td>
      <ul>
        <li>Complete basic motor controller with manual drive</li>
        <li>Abandon tracking based on color or random objects</li>
        <li>Fully develop AR tag tracking functionality</li>
        <li>Combine commands from AR tracker with the motor controller</li>
        <li>Improve tracking performance</li>
        <li>Begin adding more advanced features like real-time path splining and following</li>
      </ul>
    </td>
  </tr>
</table>

<br><br>
<h4>CHALLENGES</h4>
<p>
  There were several problems that came up over the course of the project. Probably the largest one was implementing a tracker that could track objects other than an AR tag. Tracking by color separation was the first attempt, but it was not robust. Moving a few feet in any direction changed the lighting of the environment which meant that color separation had to be re-calibrated every time. Another attempt at general object detection was done using five different object trackers in the OpenCV library (Boosting, MILTrack, Median-Flow, TLD, KCF) but all of them were too slow to perform well in real time on the Raspberry Pi. For more information on this, please see the experiment results <a href = "https://github.com/aamirhatim/tracker_compare_ee432" target = "blank">here</a>.<br><br>
  A second challenge was determining a good way to create spline trajectories based on tag location over time. A global frame must be established, and likely periodically reset when the robot stops moving, to generate new trajectories to follow. This is certainly a solvable problem, and will be worked on in the very near future.<br><br>
  Getting reliable image data proved to be difficult with the Raspberry Pi camera module. Although it performed reasonably well indoors, it failed to locate the AR tag when driving near bright windows or going outside - the scene would be completely washed out. The camera frame rate could also be better. There were several instances when the image would become too blurry to detect an object, like when the robot made quick turns, for example. This issue could potentially be solved in software, however. The robot can rely on the last known tag location as a navigation point rather than waiting for a new one if it cannot get it in time.
  <br><br><br>
</p>

<h4>FUTURE WORK</h4>
<p>
  There are three features that are planned be developed in the near future. The first is to solve the spline generating problem and find a way to use that in tandem with visual cues to create more natural robust following behavior. The second is to add depth sensors to Argo for obstacle avoidance. Possible ideas are switching the current RGB camera with an RGB-D camera. This would give highly detailed information about obstacles and it could also be used for better tracking. However, manipulating this point cloud data may be computationally expensive for the Raspberry Pi. Another option is to use mid-range and short-range sonar modules for programming robust reactive responses. The third is to create a new prototype with an actual suitcase. Enough development has been done to safely and realiably build a more final prototype of the project.
</p>
