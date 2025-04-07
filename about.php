<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/aboutme.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Welcome to SANYU PET MOBILE SPA, where relaxation meets tail-wagging happiness!
At SANYU PET MOBILE SPA, we believe every pet deserves a little pampering. Our spa is not just a place for grooming but a sanctuary where pets are treated like royalty. Whether it’s a soothing bath, a luxurious massage, or a stylish makeover, we provide the ultimate spa experience tailored to your pet’s unique needs.
With years of experience in pet care, our team of certified groomers and pet wellness experts is dedicated to ensuring your furry companions feel comfortable, safe, and loved. We use only the finest pet-friendly products, environmentally conscious practices, and state-of-the-art facilities to make every visit memorable.
From playful pups to serene senior pets, SANYU PET MOBILE SPA is here to nurture, pamper, and celebrate all pets. Because when they’re happy, we’re happy too!</p>
<p>
   <h1>VISION</h1><br>
   <i>"To become the leading mobile pet care provider in the region for exceptional services, compassion and dedication to animal well-fare."</i>
</p>
<p>
   <h1>MISSION</h1><br>
   <i>"To bring professional, compassionate, and personalized pet care services directly to your doorstep, ensuring every pet gets the attention and care they deserve while simplifying pet ownership for families."</i>
</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">Our Dedicated Team Members</h1>

   
<section style="text-align: center; margin: 20px;">
  <h2 style="font-size: 24px; margin-bottom: 20px;">Our Team</h2>
  <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">

    <div style="flex: 0 1 calc(33.33% - 10px); margin: 5px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
      <img src="images/REV1.jpg" alt="John Doe" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0;">Tandeka Judith</h3>
      <p style="font-size: 14px; color: #555;">Sales Manager</p>
    </div>

    <div style="flex: 0 1 calc(33.33% - 10px); margin: 5px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
      <img src="images/REV2.jpg" alt="Jane Smith" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0;">Kweweza Resty</h3>
      <p style="font-size: 14px; color: #555;">Project Manager</p>
    </div>

    <div style="flex: 0 1 calc(33.33% - 10px); margin: 5px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
      <img src="images/REV3.jpg" alt="Alice Brown" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0;">NYAMWIZI RECHEAL</h3>
      <p style="font-size: 14px; color: #555;">Coordinator</p>
    </div>

    <div style="flex: 0 1 calc(33.33% - 10px); margin: 5px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
      <img src="images/REV4.jpg" alt="Alice Brown" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0;">KITIMBO RAMON MWESIGWA</h3>
      <p style="font-size: 14px; color: #555;">Accountant</p>
    </div>

    <div style="flex: 0 1 calc(33.33% - 10px); margin: 5px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
      <img src="images/REV7.jpg" alt="Alice Brown" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0;">NANSUBUGA FLAVIA</h3>
      <p style="font-size: 14px; color: #555;">Human Resource </p>
    </div>

    <div style="flex: 0 1 calc(33.33% - 10px); margin: 5px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
      <img src="images/REV6.jpg" alt="Alice Brown" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0;">KUTEESA JOEL LUMANSI</h3>
      <p style="font-size: 14px; color: #555;">CEO</p>
    </div>

    <div style="flex: 0 1 calc(33.33% - 10px); margin: 5px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
      <img src="images/REV8.jpg" alt="Alice Brown" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0;">KIRIDDE CLAIRE</h3>
      <p style="font-size: 14px; color: #555;"> Veterinary Officer </p>
    </div>

    <div style="flex: 0 1 calc(33.33% - 10px); margin: 5px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
      <img src="images/REV9.jpg" alt="Alice Brown" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0;">KAMWIZA PRISCILLA</h3>
      <p style="font-size: 14px; color: #555;">Trainer Officer</p>
    </div>

    <div style="flex: 0 1 calc(33.33% - 10px); margin: 5px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
      <img src="images/USEER.svg" alt="Alice Brown" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
      <h3 style="margin: 10px 0;">ANGUYO ROY</h3>
      <p style="font-size: 14px; color: #555;"> MARKETEER </p>
    </div>



</section>


   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>