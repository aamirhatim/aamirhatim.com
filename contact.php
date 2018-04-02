<div class = "contact" id = "contact-text">
  <h1>ASK ME ANYTHING!</h1>
  <p>Questions? Need to see my resume? Just stopping by to say hi? I'd love to hear from you! Fill out the form and I'll get back to you as soon as I can.</p>

  <div id = "links">
    <a href = "https://github.com/aamirhatim" target = "blank"><img src = "/img/github_black.svg"></a>
    <a href = "https://www.linkedin.com/in/aamir-husain-19396950/" target = "blank"><img src = "/img/linkedin.svg"></a>
    <a href = "https://www.instagram.com/aamirhatim/" target = "blank"><img src = "/img/insta.svg"></a>
  </div>
</div>

<form class = "contact" id = "contact-form" action = "/php/email_script.php" method = POST>
  <img src = "/img/stamp.svg">
  <input type = "text" name = "name" placeholder = "name." required/>
  <input type = "text" name = "email" placeholder = "email." required/>
  <textarea name = "message" placeholder = "message." autocomplete = "off" required></textarea>
  <input type = "submit" name = "submit" value = "send"/>
</form>
