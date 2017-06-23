$( document ).ready(function() {
    console.log( "ready!" );
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });  

        $('form').on('submit', function (e) {
  e.preventDefault();
          $.ajax({

            method: 'POST',
            url: '/calculate',
   data: $('form').serialize(),
        dataType: 'json',
            success: function (data) {
                console.log(data);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

       
});    
    
});

