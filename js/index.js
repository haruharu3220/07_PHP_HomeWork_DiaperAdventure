$(".btn-custom01-front").on("click", function (e) {
    console.log('コンソール');
    location.href="settings.php";
});

$("h1").on("click", function (e) {
    console.log('コンソール');
    location.href="settings.php";
});


$('.diapers').on('click', function(){
    $('.diapers').toggleClass('isActive',false);
    $(this).toggleClass('isActive');
  })
