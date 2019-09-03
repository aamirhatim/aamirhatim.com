<style>
#code-block{
  background-color: #f2f4f7;
  border: 1px solid #b6bcc4;
  border-radius: 15px;
  padding: 20px;
}

code{
  font-size: 10pt;
}
</style>

<section>
  <h2>The Power of Neural Networks</h2>
  <p>
    Neural networks have the potential to learn incredibly complex functions that can help us classify all kinds of data. Given the right hardware, and a little time, neural networks can be fine tuned to deliver great performance in tasks like object recognition, captioning pictures, and making music. For this project, I learned the fundamentals behind deep learning and how one can build a basic but efficient library in Python to implement your own network.
  </p>
</section>

<section>
  <h2>Components</h2>
  <h3>Normalizer</h3>
  <p>
    A standard normalizer is included in the library to normalize the input data. Normalizing helps in making optimization methods like gradient descent much quicker since it helps "steer" each step closer to the actual minimum of the gradient. Standard normalization is done by subtracting the mean and dividing by the standard deviation:
    $$X_{norm}= \frac {X - \mu}{\sigma}$$
  </p>

  <h3>Cost Functions</h3>
  <p>
    A cost function allows us to determine the best relationship we can find between the input and output of our data. The library contains two cost functions to optimize: <i>least squares</i> and <i>softmax</i>. In a least squares cost function, larger errors are penalized more than smaller errors due to the squared term.
    $$loss(y,y_p)=(y-y_p)^2$$
    A softmax (log-loss) function takes in a dataset and outputs a new set with values ranging from 0 to 1. Additionally, the sum of all values of the dataset add up to 1.
    $$loss(w_0,w_1)=log(1+e^{-y_p(w_0+xw_1)})$$
  </p>

  <h3>Multilayer perceptron</h3>
  <p>
    This module of the library initializes the multilayer perceptron (MLP) used to generate a classifier. The number of hidden units and number of layers can be modified as well as the activation function (ReLU, tanh, maxout). The activation functions serve as various <i>feature transforms</i> that can be used to modify how the network deals with inputs.
  </p>

  <h3>Optimizer</h3>
  <p>
    Gradient descent is used to optimize the loss functions mentioned above. The algorithm calculates the gradient at a location on the cost function and then takes a step in a direction negative to the gradient. This process is repeated until (ideally) a minimum is reached. Convergence indicates that a fit has been found to minimize the cost, or error, of the regression model.
  </p>
</section>

<section>
  <h2>Using the Library</h2>
  <p>
    The library can be used to construct a neural network and plot its performance on a given dataset. See the sample code below for proper syntax in Python 3.6.
  </p>

  <div id = "code-block">
    <code>
      # Import deep learning library<br>
      from dl_lib import deep_learner as DL<br>
      import autograd.numpy as np<br><br>

      # Initilaize learner, including weight and cost histories<br>
      learner = DL.Setup(x,y)<br><br>

      # Choose normalization method<br>
      learner.choose_normalizer(name = 'standard')<br><br>

      # Dimensions of input and output, 3 hidden layers of ten units each<br>
      N = 1; M = 1<br>
      layer_sizes = [N, 10, 10, 10, M]<br><br>

      # MLP parameters<br>
      learner.choose_features(name = 'multilayer_perceptron', layer_sizes = layer_sizes, activation = 'maxout', scale = .3)<br><br>

      # Choose cost function<br>
      learner.choose_cost(name = 'least_squares')<br><br>

      # Run gradient descent and plot weight and cost histories<br>
      learner.optimize(max_its = 200, alpha_choice = 1)<br>
      learner.plot_model()
    </code>
  </div>
</section>