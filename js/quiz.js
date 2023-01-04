if (localStorage.getItem("selectCharacter")) {
    const text = localStorage.getItem("selectCharacter");
    console.log(text);
    $(".selectChara").text(text);
  }