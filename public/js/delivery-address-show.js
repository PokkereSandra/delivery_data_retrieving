$(document).ready(function () {

    function showAddresses(user_id) {
        $.ajax({
            type: 'GET',
            url: './show-addresses/' + user_id,
            dataType: 'json',
            success: function (response) {
                $('ul').html('');
                $.each(response.clientAddresses, function (client, address) {
                    $('ul').append('<li>' + address.address + '</li>');
                });
            }
        });
    }

    $('.show-addresses').click(function (e) {
        e.preventDefault();
        var user_id = $(this).val();
        console.log(user_id)

        showAddresses(user_id);
    })
});
