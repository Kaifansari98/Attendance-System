
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="css/responsive.css?v=<?php echo time(); ?>">




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    

    $(document).ready(function() {
    if (!localStorage.getItem("mode")) {
    if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
    localStorage.setItem("mode", "dark-theme");
    } else {
    localStorage.setItem("mode", "light-theme");
    }
    }
//   set interface to match localStorage
if (localStorage.getItem("mode") == "dark-theme") {
// dark theme
$("body").addClass("dark-theme");
$("body").removeClass("light-theme");
$("#sun").addClass('night');

} else {
// light theme
$("body").removeClass("dark-theme");
$("body").addClass("light-theme");
$("#sun").removeClass('night');
}


$("#sun").on("click", function() {
if ($("body").hasClass("dark-theme")) {
$("body").removeClass("dark-theme");
$("body").addClass("light-theme");
localStorage.setItem("mode", "light-theme");
$("#sun").removeClass('night');
} else {
$("body").addClass("dark-theme");
$("body").removeClass("light-theme");
localStorage.setItem("mode", "dark-theme");
$("#sun").addClass('night');}
});

$("#toggle").on("click", function() {
    $(".main").toggleClass("active");
    $(".navigation").toggleClass("active");
    $(".toggle").toggleClass("active");
});

// sidebar
// if (localStorage.getItem("sidebar") == "open") {
//     $(".main").addClass("active");
//     $(".navigation").addClass("active");
//     $(".toggle").addClass("active");
// }
// else{
//     $(".main").removeClass("active");
//     $(".navigation").removeClass("active");
//     $(".toggle").removeClass("active");
// }

// $("#toggle").on("click", function() {
// if ($(".navigation").hasClass("active")) {
// localStorage.setItem("sidebar", "close");
// $(".main").removeClass("active");
// $(".navigation").removeClass("active");
// $(".toggle").removeClass("active");
// } else {
// localStorage.setItem("sidebar", "open");
// $("#sun").addClass('night');
// $(".main").addClass("active");
// $(".navigation").addClass("active");
// $(".toggle").addClass("active");
// }
// });


});



</script>
