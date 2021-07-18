//Year
for(i = new Date().getFullYear(); i > 1900 ; i--) {
    $("#years").append($('<option/>').val(i).html(i));
}
// Month
for(i = 1; i < 13; i++) {
    $("#months").append($('<option/>').val(i).html(i));
}
// Day
updateNumberOfDays();

function updateNumberOfDays() {
    $("#days").html('');
    year = $("#years").val();
    month = $("#months").val();
    days = daysInMonth(year, month);
    for(i = 1; i < days + 1; i++) {
        $("#days").append($('<option/>').val(i).html(i));
    }
}
$('#years, #months').on('change', function() {
    updateNumberOfDays();
});

function daysInMonth(year, month) {
    return new Date(year, month, 0).getDate();
}