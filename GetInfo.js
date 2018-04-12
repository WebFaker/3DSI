function GetInfo(data) {
    document.querySelector('.form').innerHTML = '<input type="text" hidden value="'+data.Ring+'" name="shapeRing"><input type="text" hidden value="Pink Gold" name="colorRing">' +
        '<input type="text" hidden value="'+data.Ornement+'" name="shapeProp"><input type="text" hidden value="Blue Metal" name="colorProp">' +
        '<input type="text" hidden value="Ring5.jpg" name="src"><input type="text" hidden value="bague" name="name">' +
        '<input type="text" hidden value="22,90" name="price"><input type="text" hidden value="1" name="idMembers">';
    document.querySelector(".form").submit();
}