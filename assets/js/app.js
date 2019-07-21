'use strict';

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../scss/app.scss');


const $ = require('jquery');
import 'bootstrap';

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.


$(() => {
    let dateSelect = $('#dateSelect');

    dateSelect.on('change', function(){
        let dateValue=dateSelect.val();
        let ur = 'mon';

        //envoyer cette valeur en ajax à indexAction $currentDate
        $.ajax({
            type: 'POST',
            url: `/api/testAjax/${ur}`, // url: '/' + ur,
            data: {dateStr: dateValue},
        }).then((data) => {
            $('#main-table tbody').empty().html(data.tableBody);
        }).fail(() => {
            console.log('error');
        });
    });
});


