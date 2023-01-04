$(".btn-custom01-front").on("click", function (e) {
    const text = $(".isActive").text();
    console.log(text);
    localStorage.setItem("selectCharacter", text);
    location.href="quiz.php";
});

$("h1").on("click", function (e) {
    console.log('コンソール');
    location.href="settings.php";
});


$('.diapers').on('click', function(){
    $('.diapers').toggleClass('isActive',false);
    $(this).toggleClass('isActive');
  })
