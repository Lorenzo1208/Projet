//Built this for an appointment booking website page

//To Get the current date
document.getElementById("datePicker").valueAsDate = new Date();

//To get current time for "startTime" +1 hour
$(function() {
  var d = new Date(),
    h = d.getHours() + 1,
    m = 00;
  if (h < 10) h = "0" + h;
  if (m < 10) m = "0" + m;
  $('input[type="time"][value="Start"]').each(function() {
    $(this).attr({ value: h + ":" + m });
  });
});

//To get current time for "endTime" +2 hour
$(function() {
  var d = new Date(),
    h = d.getHours() + 2,
    m = 00;
  if (h < 10) h = "0" + h;
  if (m < 10) m = "0" + m;
  $('input[type="time"][value="End"]').each(function() {
    $(this).attr({ value: h + ":" + m });
  });
});
