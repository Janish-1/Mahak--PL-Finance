<?php
   include "sidebar.php";
?>

 <style>
        .dark-bold-font {
            color: #000; /* This makes the font color dark. */
            font-weight: bold; /* This makes the font bold. */
        }

        /* If you want to specifically target only the paragraphs inside the div, you can use: */
        .dark-bold-font p {
            color: #000;
            font-weight: bold;
        }
         .dark-bold-font {
            color: #000; /* This makes the font color dark. */
            font-weight: bold; /* This makes the font bold. */
        }

        .dark-bold-font p, 
        .dark-bold-font h3, 
        .dark-bold-font input,
        .dark-bold-font button {
            color: #000;
            font-weight: bold;
        }
    </style>
<!-- nav part end -->
<section class="page-title bg-1">
   <div class="container">
      <div class="columns">
         <div class="column is-12">
            <div class="has-text-centered">
               <!-- <p>Contact Us</p> -->
               <h1 class="text-capitalize mb-4 text-lg">Touch For DSA</h1>
              
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
           <img src="images/teamimg66.jpg" >

         </div>
       <div class="column is-6-desktop is-12-tablet dark-bold-font">
    <div class="contact-content">
        <p class="mb-4 mt-2 lead h4">TERMS AND CONDITION FOR D.S.A. COLLECTION CENTER</p>
        <p>
            1. DEPOSIT AMOUNT FOR D.S.A. HOLDER IS Rs 2,50,000/- TWO LACKS FIFTY THOUSAND (In LOCAL AREA) / Rs.5,00,000/-FIVE LACKS (InOut M.P) FOR LIMITED TIME PERIOD.<br>
            2. COLLECTION CENTER WILL GET 2 PINS ID OF VALUE Rs.10,000/- PER MONTH’S AS A RENT.<br>
            3. PROVIDING FURNITURE, FIXTRES AND INTERIOR.<br>
            4. MAHAK PL PROVIDING Rs.300 /- FOR LOAN FILE TO D.S.A. HOLDER.<br>
            5. TRAINING PROVIDING TO ONE STAFE (PAYMENT GIVEN BY D.S.A HOLDER)<br>
            6. DEPOSIT AMOUNT WILL BE REFUNDABLE AFTER COMPLETION OF 300 AND ABOUT LONE FILE.<br>
            7. TIME PERIOD FOR COMPLETION OF 300 FILE MINIMUM 6TH MONTHS<br>
            8.IF D.S.A. HOLDER COMPLETE 300 LONE FILE’S WITH IN 6TH MONTH’S AND CONTINUE,THEY WILL GET PIN’S MEMBER VALUE OF Rs.50,000/-PER MONTS (e.g. EVERY MONTHS MAHAK PL GOING TO PAY 10 I.D.PIN’S WHICH HAS VALVE OF Rs.5000/-PER PIN’S MEMBER)
        </p>
    </div>
</div>
      </div>
    <div class="columns is-justify-content-center mt-5 dark-bold-font">
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
            <h3 class="text-md">DSA Registration</h3>
            <p class="mb-5"></p>
            <div class="input-group">
                <input name="name" type="text" class="input" placeholder="Your Name">
            </div>
            <div class="input-group">
                <input name="tel" type="telephone" class="input" placeholder="Mobile No.">
            </div>
            <div class="input-group">
                <input name="address" type="address" class="input" placeholder="Address">
            </div>
            <button class="btn btn-main" name="submit" type="submit">Register</button>
        </form>
    </div>
</div>
   </div>
</section>
<!-- contact form end -->
<?php
   include "footer.php";
?>