<?php
   include "sidebar.php";
?>
<!-- nav part end -->
<section class="page-title bg-1">
   <div class="container">
      <div class="columns">
         <div class="column is-12">
            <div class="has-text-centered">
               <!-- <p>Contact Us</p> -->
               <h1 class="text-capitalize mb-4 text-lg">Get in Touch</h1>
              
            </div>
         </div>
      </div>
   </div>
</section>

<!-- contact form start -->
<section class="contact-form-wrap section">
   <div class="container">
      <div class="columns is-multiline is-align-items-center bg-gray">
         <div class="column is-6-desktop is-12-tablet">
            <div class="google-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d229.95930454177545!2d75.89613911468045!3d22.752430699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9a06a769e51a16c2!2zMjLCsDQ1JzA4LjgiTiA3NcKwNTMnNDcuMCJF!5e0!3m2!1sen!2sin!4v1671022900583!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </div>
         <div class="column is-6-desktop is-12-tablet">
            <div class="contact-content">
               <p class="mb-4 mt-2 lead h4">Don’t Hesitate to contact us <br>with us for any kind of information</p>
               <h2 class="mb-3">+91 9111777818</h2>
               <p>Start the collaboration with us while figuring out the best solution based on your Financial needs.</p>
               <ul class="social-icons list-inline mt-5">
                  <li class="list-inline-item">
                     <a href=""><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="list-inline-item">
                     <a href=""><i class="fab fa-twitter"></i></a>
                  </li>
                  <li class="list-inline-item">
                     <a href=""><i class="fab fa-linkedin-in"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="columns is-justify-content-center mt-5">
         <div class="column is-8-widescreen is-10-desktop has-text-centered mt-4">
            <form id="contact-form" class="contact__form" method="post" action="mail.php">
               <!-- form message -->
               <div class="columns">
                  <div class="column is-12">
                     <div class="alert alert-success contact__msg" style="display: none" role="alert">
                        Your message was sent successfully.
                     </div>
                  </div>
               </div>
               <!-- end message -->
               <h3 class="text-md ">Contact Us</h3>
               <p class="mb-5">Reach out to the world’s most reliable services.</p>
               <div class="input-group">
                  <input name="name" type="text" class="input" placeholder="Your Name">
               </div>
               <div class="input-group">
                  <input name="email" type="email" class="input" placeholder="Email Address">
               </div>
               <div class="input-group-2 mb-4">
                  <textarea name="message" class="input" rows="4" placeholder="Your Message"></textarea>
               </div>
               <button class="btn btn-main" name="submit" type="submit">Send Message</button>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- contact form end -->
<?php
   include "footer.php";
?>