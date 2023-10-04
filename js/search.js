function fill(Value) {
    $('#search').val(Value);
 }
 $(document).ready(function() {
    $("#search").keyup(function() {
        var Day = $('#search').val();
        if (Day == "") {
            //Assigning empty value to "display" div in "search.php" file.
            
        }
        else {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    search: Day
                },
                success: function(html) {
                    $("#display").html(html).show();
                }
            });
        }
    });
 });