<section>
  <h2>Overview</h2>
  <p>
    There are several ways to get a robot fom point A to point B, and they all rely heavily on the principles behind forward and inverse kinematics, rigid body motion, controls, and joint configurations. This project provided an introduction to these fundamentals of robotic control. All simulations were calculated using Mathematica and visualized with V-REP, a virtual robot simulator.
  </p>
</section>

<section>
  <h2>End-Effector Configuration</h2>
  <p>
    There are several steps involved in determining the best path for a robot to follow to reach a desired end-effector configuration. The robot's task space, work space, joint limitations, and wheel configuration must be taken into account to find a feasible solution. There could be the chance that the desired end-effector configuration is impossible for the robot to achieve in real life. Noise, sensor error, and computing limitations make it challenging to create the perfect simulation, so error control must also be implemented to ensure the robot stays on the desired path towards the final configuration.
  </p>

  <div class = "info-box">
    <h4>Visualizing the Path</h4>
    <ol>
      <li>Use forward kinematics to find the robots current configuration given a set of initial conditions. This includes the Jacobian which provides joint angle configurations for the arm and the base of the robot.</li>
      <br>
      <li>Find the robot's desired configuration and twist using a given path.</li>
      <br>
      <li>Calculate the configuration error between the current and desired configurations.</li>
      <br>
      <li>Evaluate control laws and keep track of the total error. This helps in visualizing the system's error over time. In this step, multiple kinds of control laws can be implemented. This project uses a typical PI velocity controller.</li>
      <br>
      <li>Update the wheel and joint velocities of the robot so that the next time step can be simulated. Use odometry and wheel modeling to determine the robot's F matrix which provides the driving angular wheel speeds necessary for the robot to move along the desired path.</li>
      <br>
      <li>Simulate the next time step by updating the robot's new arm, base, and wheel configurations. For this project, a time step of .01s was used. Export this new set of configurations to a CSV file for V-REP simulations.</li>
      <br>
      <li>Repeat this process for the next time step, using the configuration found in step 6 as the new set of initial conditions needed for step 1.</li>
    </ol>
  </div>
</section>