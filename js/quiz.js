if (localStorage.getItem("selectCharacter")) {
    const text = localStorage.getItem("selectCharacter");
    console.log(text);
    $(".selectChara").text(text);
  }

  $('.choices').on('click', function(){
    $('.choices').toggleClass('isActive',false);
    $(this).toggleClass('isActive');
  })



  $(".btn-custom01-front").on("click", function (e) {
    // const text = $(".isActive").text();
    // console.log(text);
    // localStorage.setItem("selectCharacter", text);
    judge();
    location.href="game.php";
});



function judge(){
  


}