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



<section id="our-services" style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 50px 0;">
    <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
        <h2 style="font-size: 2.5rem; color: #2c3e50; margin-bottom: 20px;">Our Services</h2>
        <p style="font-size: 2rem; color: #7f8c8d; margin-bottom: 40px;">
            At <strong>Your Mobile Pet Spa</strong>, we are committed to offering tailored solutions that prioritize your pet’s comfort, health, and happiness. Discover our comprehensive range of services designed for convenience and excellence.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <!-- Service 1 -->
            <div style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
                <img src="images/grooming.jpg" alt="Full Grooming Service" style="width: 100%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                <h3 style="font-size: 3rem; color: #2c3e50; margin-bottom: 10px;">Full Grooming</h3>
                <p style="color: #7f8c8d; font-size: 1.7rem;">A complete grooming package to keep your pet healthy and looking fabulous. Our service includes a luxurious bath using pet-friendly shampoos, a stylish haircut suited to your pet's breed and personality, nail trimming to prevent discomfort, ear cleaning for hygiene, and coat brushing to eliminate tangles. Your pet deserves the royal treatment!</p>
            </div>
            <!-- Service 2 -->
            <div style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
                <img src="images/luxury.jpg" alt="Spa Treatments" style="width: 100%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                <h3 style="font-size: 3rem; color: #2c3e50; margin-bottom: 10px;">Luxury Spa Treatments</h3>
                <p style="color: #7f8c8d; font-size: 1.7rem;">Treat your furry companion to a day of indulgence with our specialized spa treatments. Services include soothing paw massages to relieve stress, deep coat conditioning for enhanced shine and softness, and calming aromatherapy to create a serene experience. Let us pamper your pet like never before.</p>
            </div>
            <!-- Service 3 -->
            <div style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
                <img src="images/special.jpg" alt="Specialized Pet Care" style="width: 100%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                <h3 style="font-size: 3rem; color: #2c3e50; margin-bottom: 10px;">Specialized Pet Care</h3>
                <p style="color: #7f8c8d; font-size: 1.7rem;">Whether your pet requires extra attention due to age, health conditions, or specific sensitivities, our team provides customized care. From senior pet check-ups to treatments for sensitive skin, we focus on addressing unique needs with patience and expertise.</p>
            </div>
            <!-- Service 4 -->
            <div style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
                <img src="images/mobile.jpg" alt="Mobile Vet Assistance" style="width: 100%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                <h3 style="font-size: 3rem; color: #2c3e50; margin-bottom: 10px;">Mobile Vet Assistance</h3>
                <p style="color: #7f8c8d; font-size: 1.7rem;">Collaborating with licensed veterinarians, we offer convenient mobile veterinary services. These include routine wellness check-ups, vaccinations to protect against diseases, basic health consultations, and professional advice tailored to your pet's well-being—all from the comfort of your home.</p>
            </div>
            <!-- Service 5 -->
            <div style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
                <img src="images/training.jpg" alt="Pet Training Sessions" style="width: 100%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                <h3 style="font-size: 3rem; color: #2c3e50; margin-bottom: 10px;">Pet Training Sessions</h3>
                <p style="color: #7f8c8d; font-size: 1.7rem;">Our experienced trainers specialize in equipping pets with essential behavioral and obedience skills. From basic commands to resolving behavioral challenges, each session is designed to cater to your pet's temperament and learning style, ensuring long-lasting positive results.</p>
            </div>
            <!-- Service 6 -->
            <div style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
                <img src="images/accessories.jpg" alt="Pet Accessories Store" style="width: 100%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                <h3 style="font-size: 3rem; color: #2c3e50; margin-bottom: 10px;">Pet Accessories Store</h3>
                <p style="color: #7f8c8d; font-size: 1.7rem;">We offer a curated selection of high-quality pet accessories, including durable leashes, engaging toys, grooming tools, and cozy beds. These items are carefully chosen to enhance your pet’s comfort, safety, and enjoyment at every stage of their life.</p>
            </div>
        </div>
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