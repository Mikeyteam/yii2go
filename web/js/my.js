/**
 * Created by Андрей on 30.09.16.
 */
$(document).ready(function(){
    var sex = 'mail';
    var phone = 122-1355;

    $.ajax({
        url: '/ajax/test',
        type: 'POST',
        //Передали переменную из javascript (var sex = 'mail') в php
        data: {
            sex : sex,
            phone : phone
        },
        dataType: 'json',

        //Получили json объект data {"name":"Andrey","fio":"lebedev","age":34}, который был сконверитрован php encodeJson
        success : function(data){
            $('.wrap').children('.container').append(data.name);
            function sayHello1()
            {
                setTimeout(sayHello(), 3000)
            }
            function sayHello()
            {
              console.log('Hello ' + data.name);
            }
            sayHello1();
        }

    })


    $('.btn-my').on('click', 'button', function(){
        var array = [];
        $(this).parent().find('button').each(function(i,val){
            array.push(val.innerHTML);
        });

        var k = 1;//шаг
        for (i = 0; i < k; i++) array.unshift(array.pop());
        $(this).parent().find('button').each(function (i) {
            ($(this).html(array[i]));
        });


    })

});