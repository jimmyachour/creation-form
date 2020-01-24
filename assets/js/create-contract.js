const $contractType = $('#contract_form_type');


// When sport gets selected ...
$contractType.on('change',(function() {

    // ... retrieve the corresponding form.
    const $form = $(this).closest('form');

    const data = this.value;

    $.ajax({
        url : '/contract/select-type/',
        type: 'GET',
        data : data,
        success: function() {

            console.log(this);
            // // Replace current position field ...
            // $('#meetup_position').replaceWith(
            //     // ... with the returned one from the AJAX response.
            //     $(html).find('#meetup_position')
            // );
            // // Position field now displays the appropriate positions.
        }
    });
}));