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
