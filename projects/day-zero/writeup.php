<h4>RAISING AWARENESS OF WATER AVAILABILITY</h4>
<p>
  <i>Curious what our model will predict for a particular country? Go find out <a href = "https://aamirhatim.github.io/day_zero_predictor/" target = "_blank">here</a>!</i>
</p><p>
  "Day Zero" is a term that is used to refer to a situation of extreme water shortage - a situation that Cape Town came very close to in 2017. They have managed to avoid complete water shortage as of now, but it is a huge warning for the rest of the world. Many cities all around the world experience water shortages throughout the year, causing massive disruptions in day-to-day life of locals, businesses, and the economy. The ability to keep an eye on cities coming close to a ‘Day Zero’ event could be incredibly useful in not only effectively deploying aid, but also to take preventative actions early on so that local authorities are not forced to impose extreme water usage laws on short notice.
</p><p>
  To help raise awareness to this situation, we used machine learning to develop a model to predict the water stress level of a country given a particular set of attributes. We divided the raw stress values (a scale from 0-100) into 6 categories:
</p>

<style>
table{
  border-collapse: collapse;
  margin: 0 auto;
}

td{
  padding: 10px;
}

table, tr, td{
  border: 1px solid #303030;
}

dl{
  font-size: 13pt;
}
</style>

<table class = "thin">
  <tr style = "font-weight: 500;">
    <td>Stress Value</td>
    <td>Stress Category</td>
  </tr>

  <tr>
    <td>0 - 20</td>
    <td>None</td>
  </tr>

  <tr>
    <td>21 - 40</td>
    <td>Low</td>
  </tr>

  <tr>
    <td>41 - 60</td>
    <td>Medium</td>
  </tr>

  <tr>
    <td>61 - 80</td>
    <td>Alert</td>
  </tr>

  <tr>
    <td>81 - 100</td>
    <td>High</td>
  </tr>

  <tr>
    <td>> 100</td>
    <td>Critical</td>
  </tr>
</table>
<br><br>

<p>
  Though we do not have enough data to go down to the city level, viewing things from a larger perspective can certainly provide insight into how a nation should work as a whole to prevent reaching a Day Zero situation.
</p>

<h4>About the Data</h4>
<p>
  Most of our data was gathered from the extensive <a href = "http://www.fao.org/nr/water/aquastat/main/index.stm" target = "_blank">AQUASTAT</a> database which provides many different water metrics for every country for the past 60 years. Another source was used to get rainwater harvesting information. Our goal was to develop a model that incorporates new attributes compared to other models. After doing some initial research, we made a small list of attributes we thought would be useful in classifying a nation’s stress level. Fortunately, we did not have to hunt down every data sample. The water consumption and usage database from AQUASTAT proved to be extremely comprehensive, however we were still tasked with consolidating multiple tables for the attributes we were interested in.
</p>

<div class = "info-box">
  <h6>Attributes</h6>
  <dl>
    <dt>Total land cultivated (%)</dt>
    <dd>Percentage of the total land area of the country that has been cultivated</dd>
    <br>

    <dt>Annual precipitation (mm/yr)</dt>
    <dd>Total depth of precipitation per year</dd>
    <br>

    <dt>Rainwater harvesting awareness</dt>
    <dd>True/False value determined by whether or not rainwater harvesting is widely practiced</dd>
    <br>

    <dt>Water consumption per capita (m^3/year/inhabitant)</dt>
    <dd>Total amount of water withdrawn per capita</dd>
    <br>

    <dt>Total renewable water resources per capita (m^3/year/inhabitant)</dt>
    <dd>The maximum theoretical yearly amount of water available per person for a country at a given moment</dd>
    <br>

    <dt>Desalination capacity (km^3/year)</dt>
    <dd>Fresh water produced using brackish or salt water</dd>
    <br>

    <dt>Water dependency ratio (%)</dt>
    <dd>Percentage of water that comes from other countries</dd>
    <br>

    <dt>Agricultural water withdrawal (%)</dt>
    <dd>Percentage of total water withdrawn used for agriculture</dd>
    <br>

    <dt>Industrial water withdrawal (%)</dt>
    <dd>Percentage of total water withdrawn used for industrial purposes</dd>
    <br>

    <dt>Municipal water withdrawal (%)</dt>
    <dd>Percentage of total water withdrawn used for municipal purposes</dd>
    <br>

    <dt>Water stress level (%)</dt>
    <dd>Water stress level measured by dividing total water withdrawal by the total water available minus any water needed for environmental flow. This was used to determine the class label for each sample</dd>
  </dl>
</div>

<h6>Dealing with missing attributes</h6>
<p>
  Much of this data (at the time of this project) is difficult to measure and record for several countries, so there were many missing fields to deal with. To see what effect missing attributes had over a complete dataset, we generated two sample sets. The filled dataset uses linear regression to come up with a simple best-fit model for every attribute of every country. Any missing attributes are then populated using this model. Any negative values generated by the models are saturated at 0. The original uses ridge regression to complete only the stress column - the value we use to classify our data. All other missing attributes are left as missing.
</p>

<h6>Pre-processing</h6>
<p>
  Pre-processing proved to be a very time consuming task, however it set us up for developing a high quality model. The final dataset contains a total of 1,986 samples including data on 179 countries from 1960 to 2014.
</p><p>
  Data from our sources were presented in several different formats and contained extra information that was not useful for our application, so we developed data purification scripts to keep only what was necessary. All of the clean datasets were then merged into one master dataset using a custom data combining script. This script also handles the best-fit model creation (described above) for each country's attribute, categorizing the output stress levels into 6 classes, and splitting the whole dataset into testing and training subsets.
</p><p>
  AQUASTAT presents nearly all of their values in 5 year increments, however the initial start time for one attribute might be different from another. This led to instances where half the attributes were present for one year and the remaining attributes were present for the year or two years after. As a result, we had large gaps of information for every documented year. To fix this issue, we shifted the years of some attributes so that all attributes would follow the same 5 year time step for each country. For example, an attribute that has a year label of 1991 would be shifted to 1990 unless a value was already present in the 1990 space. This is under the assumption that values are relatively steady over the course of a couple years.
</p>

<h4>BUILDING THE MODEL</h4>
<p>
  The target attribute that is used to train the machine learning model is water stress for a particular country and for a particular year. Using the randomly generated training and testing sets, we ran a series of tests to find the best algorithm that would classify the data. Given the type of inputs and outputs, we suspected using a decision tree or some instance based learner would be effective in classifying the data. We also predicted that a multilayer perceptron may do well with our wide range of attributes because of its flexibility. The results of several machine algorithms are shown below.
</p>

<table class = "thin">
  <tr style = "font-weight: 500;">
    <td>Algorithm</td>
    <td>Accuracy</td>
  </tr>

  <tr>
    <td>IBk</td>
    <td>88.26%</td>
  </tr>

  <tr>
    <td>KStar</td>
    <td>89.28%</td>
  </tr>

  <tr>
    <td>RandomForest</td>
    <td>88.26%</td>
  </tr>

  <tr>
    <td>RandomTree</td>
    <td>84.69%</td>
  </tr>

  <tr>
    <td>MultiClassClassifier</td>
    <td>86.22%</td>
  </tr>

  <tr>
    <td>J48</td>
    <td>84.69%</td>
  </tr>

  <tr>
    <td>LogitBoost</td>
    <td>84.69%</td>
  </tr>

  <tr>
    <td>BayesNet</td>
    <td>85.00%</td>
  </tr>

  <tr>
    <td>NaiveBayes</td>
    <td>67.85%</td>
  </tr>

  <tr>
    <td>AdaBoostM1</td>
    <td>75.51%</td>
  </tr>

  <tr>
    <td>ZeroR</td>
    <td>75.51%</td>
  </tr>

  <tr>
    <td>MLP</td>
    <td>75.51%</td>
  </tr>
</table>
<br>

<figcaption>
  NOTE: All models were generated using 10-Fold cross validation in Weka
</figcaption>

<h4>ANALYSIS</h4>
<p>
  Despite the high number of missing attributes, our model was able to predict Day Zero for all countries in the list within a reasonable range compared to other existing models. According to our model’s predictions, some countries appear to be rapidly approaching a water crisis, like Spain and Azerbaijan. Our model predicted that Spain would reach Day Zero by 2026, and Azerbaijan would reach Day Zero by 2065. For countries that have not been facing any water shortage so far, the Day Zero predictions show that they may only run out of water after many centuries, which seemed quite accurate.
</p><p>
  Given the type of inputs and outputs of our dataset, we suspected using a decision tree or some instance based learner would be effective in classifying the data. We also predicted that a multilayer perceptron may do well with our wide range of attributes because of its flexibility. The results obtained for our project were very interesting. As expected, the best models were either trees or instance based learners. These algorithms did much better than ZeroR, showing that a decent model can certainly be generated with our sample size and attributes. Our best performer was the KStar model which is implemented in the visualization tool on the website. The MLP model performed much lower than expected, possibly because it was overfitting the training set. Further tuning could potentially improve this model, but there was unfortunately not enough time to test them all out due to the time it takes to generate just one model.
</p>

<h4>Future Work</h4>
<p>
  It is hard to deny that accurately determining Day Zero is influenced by many attributes that we have not even considered for our model. It is likely that many of these other attributes simply cannot be measured in a useful way. Our future plans to improve this model are to expand the list of attributes that have plentiful and reliable data so that we can get even more information about which factors are the most impactful in determining a country’s water supply.
</p><p>
    A second goal is to make the model more fine grained and include data on major cities rather than countries. Though our model can still provide useful information, it is still very generalized, especially for large countries that have varying climates, populations, and socioeconomic structures.
</p><p>
  Finally, we would like to add more to our website and make it more interactive for users. Providing more information on each country and going into more detail on how to conserve water for a specific country can help raise awareness for areas that are in need.
</p><p>
  This project was a team effort, completed by myself and <a href = "https://am2512.github.io/" target = "_blank">Ahalya Mandana</a>.
</p>
