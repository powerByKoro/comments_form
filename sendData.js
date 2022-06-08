window.addEventListener( "load", function () {

            //Отправка данных с формы
    function sendData() {
        const XHR = new XMLHttpRequest();
        let name = document.getElementById('name').value;
        let msg = document.getElementById('msg').value;
        let mnumber = document.getElementById('mnumber').value;
        let email = document.getElementById('email').value;


        const FD = new FormData( form );

        XHR.addEventListener( "load", function(event) {
            //ббработка пришеднего json
            let response = event.target.responseText;
            let element = JSON.parse(response);
            document.getElementById('result').innerHTML = '<h1 style="color: black">Комментарии</h1> <form method="post" action="index.php">\n' +
                '                    <input type="submit" name="true" value="Сначала новые комментарии">\n' +
                '                    <input type="submit" name="false" value="Сначала старые комментарии">\n' +
                '                </form>'
            element.forEach(row => document.getElementById('result').innerHTML += '<div class="comment mt-4 col-12 " >\n' +
                '                    <h4>'+ row['name'] +' </h4>\n' +
                '                    <span>' + row['date'] +'</span>\n' +
                '                    <br>\n' +
                                    '<br>\n' +
                                        '<h5 style="color: white">Номер телефона :' + ' ' +row['number'] +'</h5>\n' +
                                        '<h5 style="color: white">Адрес электронной почты :'+ ' ' + row['email'] +'</h5>\n' +
                '                    <p>'+ row['msg'] +'</p>\n' +
                                    '<form action="" method="post" class="likes_form">\n' +
                                        '<h5 style="color: white">Отметок нравится :' +' '+ row['likes'] + '</h5>\n' +
                                        '<input onKeyPress="return false" id="id_element" name="id_element" type="number"  style="display: none" value="'+ row['id'] + '">\n' +
                                            '<input id="likes" type="number" name="likes" class="" style="display: none" value="' + row['likes'] + '"> \n' +
                                                '<button class="btn btn-primary" type="submit">Нравится</button>\n' +
                                    '</form>\n' +
                '                </div>');
        } );
        XHR.addEventListener( "error", function( event ) {
            alert( 'Что-то пошло не так!' );
        } );


        XHR.open( "POST", "Send.php" );
        FD.append('msg',msg);
        FD.append('name',name);
        FD.append('mnumber',mnumber);
        FD.append('email',email);

        XHR.send( FD );
    }


    const form = document.getElementById( "ajax_form" );

    form.addEventListener( "submit", function ( event ) {
        event.preventDefault();
        sendData();
        document.querySelector('#post').disabled = true;
    } );

    //Добавление лайков

    function sendLikes(likes, id_element){
        const XHR = new XMLHttpRequest();
        const FD = new FormData();

        XHR.addEventListener( "load", function(event) {


        } );

        XHR.open( "POST", "UpdateLikes.php" );
        FD.append('likes',likes);
        FD.append('id_element',id_element);
        XHR.send(FD);
    }



    const form_2 = document.querySelectorAll('.likes_form');
    form_2.forEach(row =>
        row.addEventListener( "submit", function ( event ) {
            event.preventDefault();
            let likes = row.querySelector('#likes').value;
            let id_element = row.querySelector('#id_element').value;
            let new_like = Number(likes) +1;
            row.querySelector('#like_json').innerHTML = '<h5 style="color: white" id="like_json">Отметок нравится :'+ ' ' + new_like + ' </h5>' ;
            row.querySelector('#btn_id').disabled = true ;
            sendLikes(likes, id_element);
        }));

} );