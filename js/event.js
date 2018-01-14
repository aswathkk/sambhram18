var events;
$.getJSON('events.json', function(data) {
  events = data;
});

$(document).ready(function() {
  $('.event-loading').addClass('goup');
  $('.events').addClass('up');
  $('header.navbar').show();

  $('.lripple').ripple();

  var $eventTitle = $('#event-title');
  var $eventSub = $('#event-sub');
  var $eventImg = $('#event-img');
  var $eventRules = $('#event-rules');
  var $eventStaff = $('#event-staff');
  var $eventStud = $('#event-student');

  var $eventDetails = $('.event-details');
  var $eventDetailsHeader = $('.details-header');
  var $headerNav = $('header.navbar')

  $('.event-card').click(function() {
    var type = $(this).attr('data-type');
    var num = $(this).attr('data-event');
    var event = events[type][num];

    $eventTitle.html(event.title);
    $eventSub.html('(' + event.short_desc + ')');
    $eventImg.attr('src', 'img/' + event.img);

    var rules = '';
    for(var i = 0; i < event.rules.length; i++) {
      rules += '<li>' + event.rules[i] + '</li>';
    }
    $eventRules.html(rules);

    var staff = '';
    for(var i = 0; i < event.staff_coordinator.length; i++) {
      staff += '<li>' + event.staff_coordinator[i].name + ' (' + event.staff_coordinator[i].phone + ')' + '</li>';
    }
    $eventStaff.html(staff);

    var stud = '';
    for(var i = 0; i < event.student_coordinator.length; i++) {
      stud += '<li>' + event.student_coordinator[i].name + ' (' + event.student_coordinator[i].phone + ')' + '</li>';
    }
    $eventStud.html(stud);

    $headerNav.hide();
    $eventDetails.addClass('up');
    $eventDetailsHeader.addClass('down');
  });

  $('.details-header .back-btn').click(function() {
    $eventDetails.removeClass('up').scrollTop(0);
    $eventDetailsHeader.removeClass('down');
    $headerNav.show();
  });
});