$(document).ready(function () {

  var est1 = "<?php echo $estado[1];?>";
  
  $('.sidenav').sidenav();
  if (!$("#btn").prop('checked')) {
    $("#off").attr('style', 'color:white;font-weight: bold;');
    $("#on").attr('style', '');
    $("#notificacion").html("El dispositivo está apagado");
    $("#icomsj").attr('class', 'material-icons grey-text');
  } else {
    $("#off").attr('style', '');
    $("#on").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion").html("El dispositivo está encendido");
    $("#icomsj").attr('class', 'material-icons yellow-text');
  }

  // if (!$("#btn1").prop('checked')) {
  //   $("#off1").attr('style', 'color:white;font-weight: bold;');
  //   $("#on1").attr('style', '');
  //   $("#notificacion1").html("El dispositivo está apagado");
  //   $("#icomsj1").attr('class', 'material-icons grey-text');
  // } else {
  //   $("#off1").attr('style', '');
  //   $("#on1").attr('style', 'color:white;font-weight: bold;');
  //   $("#notificacion1").html("El dispositivo está encendido");
  //   $("#icomsj1").attr('class', 'material-icons yellow-text');
  // }

  if (!$("#btn2").prop('checked')) {
    $("#off2").attr('style', 'color:white;font-weight: bold;');
    $("#on2").attr('style', '');
    $("#notificacion2").html("El dispositivo está apagado");
    $("#icomsj2").attr('class', 'material-icons grey-text');
  } else {
    $("#off2").attr('style', '');
    $("#on2").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion2").html("El dispositivo está encendido");
    $("#icomsj2").attr('class', 'material-icons yellow-text');
  }

  if (!$("#btn3").prop('checked')) {
    $("#off3").attr('style', 'color:white;font-weight: bold;');
    $("#on3").attr('style', '');
    $("#notificacion3").html("El dispositivo está apagado");
    $("#icomsj3").attr('class', 'material-icons grey-text');
  } else {
    $("#off3").attr('style', '');
    $("#on3").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion3").html("El dispositivo está encendido");
    $("#icomsj3").attr('class', 'material-icons yellow-text');
  }

  if (!$("#btn4").prop('checked')) {
    $("#off4").attr('style', 'color:white;font-weight: bold;');
    $("#on4").attr('style', '');
    $("#notificacion4").html("El dispositivo está apagado");
    $("#icomsj4").attr('class', 'material-icons grey-text');
  } else {
    $("#off4").attr('style', '');
    $("#on4").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion4").html("El dispositivo está encendido");
    $("#icomsj4").attr('class', 'material-icons yellow-text');
  }

  if (!$("#btn5").prop('checked')) {
    $("#off5").attr('style', 'color:white;font-weight: bold;');
    $("#on5").attr('style', '');
    $("#notificacion5").html("El dispositivo está apagado");
    $("#icomsj5").attr('class', 'material-icons grey-text');
  } else {
    $("#off5").attr('style', '');
    $("#on5").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion5").html("El dispositivo está encendido");
    $("#icomsj5").attr('class', 'material-icons yellow-text');
  }

  if (est1==1) {
    $("#btn1").attr('checked', true);
    $("#off1").attr('style', '');
    $("#on1").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion1").html("El dispositivo está encendido");
    $("#icomsj1").attr('class', 'material-icons yellow-text');
  } else {
    $("#btn1").attr('checked', false);
    $("#off1").attr('style', 'color:white;font-weight: bold;');
    $("#on1").attr('style', '');
    $("#notificacion1").html("El dispositivo está apagado");
    $("#icomsj1").attr('class', 'material-icons grey-text');
  }

});

$("marquee").hover(function () {
  this.stop();
}, function () {
  this.start();
});


$("#btn").click(function () {
  if (!$("#btn").prop('checked')) {
    $("#off").attr('style', 'color:white;font-weight: bold;');
    $("#on").attr('style', '');
    $("#notificacion").html("El dispositivo está apagado");
    $("#icomsj").attr('class', 'material-icons grey-text');
  } else {
    $("#off").attr('style', '');
    $("#on").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion").html("El dispositivo está encendido");
    $("#icomsj").attr('class', 'material-icons yellow-text');
  }
});

// $("#btn1").click(function() {
//   if (!$("#btn1").prop('checked')) {
//     $("#off1").attr('style', 'color:white;font-weight: bold;');
//     $("#on1").attr('style', '');
//     $("#notificacion1").html("El dispositivo está apagado");
//     $("#icomsj1").attr('class', 'material-icons grey-text');
//   } else {
//     $("#off1").attr('style', '');
//     $("#on1").attr('style', 'color:white;font-weight: bold;');
//     $("#notificacion1").html("El dispositivo está encendido");
//     $("#icomsj1").attr('class', 'material-icons yellow-text');
//   }


// });

$("#btn2").click(function () {
  if (!$("#btn2").prop('checked')) {
    $("#off2").attr('style', 'color:white;font-weight: bold;');
    $("#on2").attr('style', '');
    $("#notificacion2").html("El dispositivo está apagado");
    $("#icomsj2").attr('class', 'material-icons grey-text');
  } else {
    $("#off2").attr('style', '');
    $("#on2").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion2").html("El dispositivo está encendido");
    $("#icomsj2").attr('class', 'material-icons yellow-text');
  }


});

$("#btn3").click(function () {
  if (!$("#btn3").prop('checked')) {
    $("#off3").attr('style', 'color:white;font-weight: bold;');
    $("#on3").attr('style', '');
    $("#notificacion3").html("El dispositivo está apagado");
    $("#icomsj3").attr('class', 'material-icons grey-text');
  } else {
    $("#off3").attr('style', '');
    $("#on3").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion3").html("El dispositivo está encendido");
    $("#icomsj3").attr('class', 'material-icons yellow-text');
  }


});

$("#btn4").click(function () {
  if (!$("#btn4").prop('checked')) {
    $("#off4").attr('style', 'color:white;font-weight: bold;');
    $("#on4").attr('style', '');
    $("#notificacion4").html("El dispositivo está apagado");
    $("#icomsj4").attr('class', 'material-icons grey-text');
  } else {
    $("#off4").attr('style', '');
    $("#on4").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion4").html("El dispositivo está encendido");
    $("#icomsj4").attr('class', 'material-icons yellow-text');
  }


});

$("#btn5").click(function () {
  if (!$("#btn5").prop('checked')) {
    $("#off5").attr('style', 'color:white;font-weight: bold;');
    $("#on5").attr('style', '');
    $("#notificacion5").html("El dispositivo está apagado");
    $("#icomsj5").attr('class', 'material-icons grey-text');
  } else {
    $("#off5").attr('style', '');
    $("#on5").attr('style', 'color:white;font-weight: bold;');
    $("#notificacion5").html("El dispositivo está encendido");
    $("#icomsj5").attr('class', 'material-icons yellow-text');
  }
});