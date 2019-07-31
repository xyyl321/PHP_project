$(function () {
    $(".contents").mouseover(function (e) {
        if (e.target.className == 'item-box') {
            let imgBox = $(e.target).children()[0];
            $(imgBox).children().css({
                "opacity": "1"
            });
            let content = $(e.target).children()[1];
            $(content).css({
                "top": "80px",
                "color": "#fff"
            })
        }
    })
    $(".contents").mouseout(function (e) {
        if (e.target.className == 'item-box') {
            let imgBox = $(e.target).children()[0];
            $(imgBox).children().css({
                "opacity": "0"
            });
            let content = $(e.target).children()[1];
            $(content).css({
                "top": "150px",
                "color": "#7b7b7b"
            })
        }
    })

})