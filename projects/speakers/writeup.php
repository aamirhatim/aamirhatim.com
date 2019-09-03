<section>
  <h2>Overview</h2>
  <p>
    After getting a grasp on some basic electrical engineering my sophomore year of college, I decided to take those skills to a higher level and get a better understanding how circuit design is applied in real applications. The inspiration for this project came after completing one of my final labs in which I had to build a basic speaker setup that could play music from a smartphone. I wanted to make it more complicated by adding filters to the incoming signal to separate low and high frequencies and send them to their respective speakers. A single speaker may be able to play a large range of frequencies, but the sound quality is much lower compared to having designated speakers that play high/mid-level sounds (tweeters) low-level sounds (woofers).
  </p>
</section>

<section>
  <h2>Filter Design</h2>
  <p>
    The circuit design for this project uses the versatile LM386 op-amp to build low pass filters for the left and right tweeters and the subwoofer. The incoming audio waveform is split into three lines to construct a 2.1 stereo setup. One of the lines goes through a low pass filter with a cutoff frequency of 200Hz to amplify bass. The other two lines are split further into high and mid-level frequency channels for the left and right tweeters. The mid-level lines go through a band pass filter to cut out frequencies lower than 200Hz and higher than 15kHz, and the high-level lines go through a high pass filter to filter out frequencies lower than 15kHz. A total of five lines, each with its own amplifier, go to five speakers: bass, left mid, right mid, left high, and right high.
  </p>
</section>

<section>
  <h2>Hardware Components</h2>

  <div class = "info-box">
    <h4>Parts List</h4>
    <ul>
      <li>MDF</li>
      <li>1 Low frequency speaker</li>
      <li>2 mid-range frequency speakers</li>
      <li>2 high frequency speakers</li>
      <li>5 LM386 op-amps</li>
      <li>Potentiometers for volume control</li>
      <li>Resistors and capacitors</li>
    </ul>
  </div>

  <p>
    Because I had very little experience with speaker materials, quite a bit of research was needed to actually choose components that were both affordable and met my requirements. They were ultimately chosen based on their drum material, power consumption (this was a low power device, so I did not want to get very powerful speakers), resistance (they had to match the load that the LM386 could drive), recommended frequency range (for low, middle, and high frequencies), and of course, user reviews (these people knew much more than I did!). Op-amps and resistors were purchsed easily through RadioShack (RIP).
    <br><br>
    MDF was used for the subwoofer and the tweeter planks because of its ability to damp out extra and unwanted vibrations from the enclosure, allowing only the speaker itself to vibrate. There are three volume knobs: a master volume controller as well as a knob for the subwoofer and the tweeters. This allows for more fine-tuned sound adjustment depending on what is being played. The surfaces of the enclosure and the tweeter stands use thin hobby birch wood and faux leather covering, which are merely there for aesthetics. To conceal the speaker wires, brown shoelace was repurposed and capped with sturdy metal headphone jack adapters.
  </p>
</section>
