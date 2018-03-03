$(document).ready(function() {
  $('.event-loading').addClass('goup');
  $('.events').addClass('up');
  $('header.navbar').show();

  var $eventTitle = $('.event-title');
  var $eventSub = $('#event-sub');
  var $eventImg = $('#event-img');
  var $eventDay = $('#event-day');
  var $eventRules = $('#event-rules');
  var $eventStaff = $('#event-staff');
  var $eventStud = $('#event-student');
  var $eventDetails = $('.event-details');
  var $eventDetailsHeader = $('.details-header');
  var $headerNav = $('header.navbar');
  var $reg = $('.reg');
  var $regForm = $('#reg-form');
  var $regBtn = $('#reg-btn');
  var $modalForm = $('.modal-body.form');
  var $modalSuccess = $('.modal-body.success');
  var $name = $('#name');
  var $college = $('#college');
  var $phone = $('#phone');
  var $members = $('#members');

  $('.event-card').click(function() {
    window.location.hash = "details";

    type = $(this).attr('data-type');
    var num = $(this).attr('data-event');
    var event = events[type].events[num];
    eventTitle = event.title;

    $eventTitle.html(event.title);
    if(event.short_desc)
      $eventSub.html('(' + event.short_desc + ')');
    else
      $eventSub.html('');
    $eventImg.attr('src', 'img/' + event.img);

    $eventDay.html(event.day);

    var rules = '';
    for(var i = 0; i < event.rules.length; i++) {
      rules += '<li>' + event.rules[i] + '</li>';
    }
    $eventRules.html(rules);

    var staff = '';
    for(var i = 0; i < event.staff_coordinator.length; i++) {
      staff += '<li>' + event.staff_coordinator[i].name;
      if(event.staff_coordinator[i].phone)
        staff += ' (<a href="tel:' + event.staff_coordinator[i].phone + '">' + event.staff_coordinator[i].phone + '</a>)';
      staff += '</li>';
    }
    $eventStaff.html(staff);

    var stud = '';
    for(var i = 0; i < event.student_coordinator.length; i++) {
      stud += '<li>' + event.student_coordinator[i].name;
      if(event.student_coordinator[i].phone)
        stud += ' (<a href="tel:' + event.student_coordinator[i].phone + '">' + event.student_coordinator[i].phone + '</a>)';
      stud += '</li>';
    }
    $eventStud.html(stud);

    $headerNav.hide();
    $eventDetails.addClass('up');
    $eventDetailsHeader.addClass('down');
  });

  $('#event-reg').click(function() {
    $reg.show();
    setTimeout(function() {
      $reg.addClass('show');
    }, 100);
  });

  $('.reg-close').click(function() {
    $reg.removeClass('show');
    $regForm[0].reset();
    $regBtn.html('Register');
    $regBtn.attr('disabled', false);
    $modalForm.show();
    $modalSuccess.hide();
    setTimeout(function() {
      $reg.hide();
    }, 300);
  });

  $regForm.submit(function(e) {
    e.preventDefault();
    $regBtn.html('Registering...');
    $regBtn.attr('disabled', true);
    $.post('register.php', {
      event: eventTitle,
      dept: type,
      name: $name.val(),
      college: $college.val(),
      phone: $phone.val(),
      members: $members.val()
    }, function(data) {
      console.log(data);
      if(!data.err) {
        history.back();
        $modalForm.hide();
        $modalSuccess.show();
      }
    });
  });

  $('.details-header .back-btn').click(function() {
    history.back();
  });

  $(window).on('hashchange', function() {
    if(window.location.hash == '') {
      $eventDetails.removeClass('up').scrollTop(0);
      $eventDetailsHeader.removeClass('down');
      $headerNav.show();
    }
  });

  $('.navbar-toggler').click(function(e){
    e.preventDefault();
    toggleMenu();
  });
});

var menuState = false;

function toggleMenu() {
  if(menuState) {
    $('.menu').addClass('hide');
    setTimeout(function() {
      $('.menu').hide();
    }, 600);
    menuState = false;
  } else {
    $('.menu').show();
    $('.menu').removeClass('hide');
    menuState = true;
  }
}