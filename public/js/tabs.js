$(document).ready(function(){

    $('#ginasio, #informacoes').hide();

    $('#btnSobre').click(function(){

        $('#ginasio, #informacoes').hide();
        $('#btnGinasio, #btnInfo').removeClass('active');
        $('#btnSobre').addClass('active');
        $('#sobre').show();
    });

    $('#btnGinasio').click(function(){

        $('#sobre, #informacoes').hide();
        $('#btnSobre, #btnInfo').removeClass('active');
        $('#btnGinasio').addClass('active');
        $('#ginasio').show();
    });

    $('#btnInfo').click(function(){

        $('#sobre, #ginasio').hide();
        $('#btnSobre, #btnGinasio').removeClass('active');
        $('#btnInfo').addClass('active');
        $('#informacoes').show();
    });   
  
  }); 