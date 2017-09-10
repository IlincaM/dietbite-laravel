/* 
 * Open and close buttons for the Meals Table
 */


$(document).ready(function () {
    var keys = Object.keys(json);
    var first = keys.slice(0)[0];
    var last = keys.slice(-1)[0];
    var firstDay = moment(first).format("DD MMMM YYYY");
    var lastDay = moment(last).format("DD MMMM YYYY");
    $(".firstDay").text(firstDay);
    $(".lastDay").text(lastDay);

    $(".btn-xs-style").click(function (e) {
        e.preventDefault();

        $(".container-break").toggle();

        $(".breakfast-result-div").toggle();

        $(".btn-xs-style").find('i').toggleClass('fa-plus fa-times');
    });

    $(".btn-xs-style-lunch").click(function (e) {
        e.preventDefault();

        $(".container-lunch").toggle();


        $(".lunch-result-div").toggle();

        $(".btn-xs-style-lunch").find('i').toggleClass('fa-plus fa-times');
    });
    $(".btn-xs-style-dinner").click(function (e) {
        e.preventDefault();

        $(".container-dinner").toggle();


        $(".dinner-result-div").toggle();

        $(".btn-xs-style-dinner").find('i').toggleClass('fa-plus fa-times');
    });
    $(".btn-xs-style-snack").click(function (e) {
        e.preventDefault();

        $(".container-snack").toggle();


        $(".snack-result-div").toggle();

        $(".btn-xs-style-snack").find('i').toggleClass('fa-plus fa-times');
    });



});