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
  It is incredibly useful to be able to model real world situations on the computer, especially if the thing you are trying to model is not easily accessible for experimentation. This project uses the basics of Lagrangian dynamics to model a set of rigid bodies in the shape of a human, and control it in such a way so that it does a split along a constrained line which serves as as the ground.
  <figure>
    <img src = "/img/splits.gif">
  </figure>
</p>

<h4>OBJECTIVE</h4>
<p>
  The goal of this project was to have a biped model follow the trajectory:
  $$(x^d(t),y^d(t),\theta _1^d(t), \theta _2^d(t),\theta _3^d(t))$$
  $$=(0,0,0,\frac{\pi}{20}+\frac{\pi}{3}sin^2(\frac{t}{2}),-\frac{\pi}{20}-\frac{\pi}{3}sin^2(\frac{t}{2}))$$
  where the upper rigid body has a configuration \((x,y,\theta _1)\) and the each leg has an angle \(\theta _2\) and \(\theta _3\). The system is simulated from t = 0 to t = 10.
</p>
<br><br><br>

<h4>SIMULATION</h4>
<h6>Identify Necessary Frames</h6>
<p>
  The first step was to define the relationships between each rigid body using a transformation matrix:
  $$T=\begin{bmatrix}
      R & p\\
      0 & 1
    \end{bmatrix}$$
    where \(R\) is a rotation matrix and \(p\) is the translation of a point from one frame to the other. Knowing the transformation from one body to another or to a global reference frame makes it much more convenient to solve for the dynamics of each individual component.
</p>
<br><br>

<h6>Get Energies</h6>
<p>
  To get the dynamics of the body, the kinetic and potential energy of all the components must be summed together to calculate the total kinetic and total potential energy. The kinetic energy of one componenet is as follows:
  $$KE_{body}=\frac{1}{2}V^TGV$$
  where \(V\) is the angular velocity vector of the rigid body and \(G\) is the spatial inertia matrix which is formed using the mass of the body and its rotational inertia.
  <br>
  Respectively, potential energy is found using
  $$PE_{body}=mgh$$
  where \(h\) is the height of the object's center of mass.
</p>
<br><br>

<h6>Lagrangian & Equations of Motion</h6>
<p>
  The Lagrangian \(L\) is computed simply by subtracting the total potential energy from the total kinetic energy. From here, we can find the equations of motion for \(q=(\theta _2,\theta _3,y)\) using the Euler-Lagrange equation:
  $$\frac{d}{dt}\frac{\partial L}{\partial \dot{q}}-\frac{\partial L}{\partial q}=Q$$
  <br><br>
  Next, constraints \(\phi\) are added to the two legs so that they cannot fall through the "floor." The y-component of each foot must not move from 0, but it can slide back and forth in the x-direction.
</p>
<br><br>

<h6>Solve</h6>
<p>
  Using a set of given control laws \(F\), accelerations and the unknown \(\lambda\) terms are solved for:
  $$Q=F+\lambda \frac{\partial \phi}{\partial q}$$
  The last thing left to do is to evaluate the set of equations for every time step and simulate the results.
