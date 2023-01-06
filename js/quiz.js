if (localStorage.getItem("selectCharacter")) {
    const text = localStorage.getItem("selectCharacter");
    console.log(text);
    $(".selectChara").text(text);
  }

  $('.choices').on('click', function(){
    $('.choices').toggleClass('isActive',false);
    $(this).toggleClass('isActive');
  })