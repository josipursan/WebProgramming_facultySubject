$(document).ready(function(){
    $('[data-toggle="tooltip_circuitQueryOptions"]').tooltip();
    $('[data-toggle="tooltip_teamQueryOptions"]').tooltip();
    $('[data-toggle="tooltip_driverQueryOptions"]').tooltip();


    ////////////////// PROVJERA UNOSA GODINE - VOZAC
    if(!$('#yearInputDriver').val())
    {
      $("#submitButtonDriver").prop("disabled",true);
    }

    $('#yearInputDriver').on('input', function() 
    {
      if(!$('#yearInputDriver').val())
      {
      $("#submitButtonDriver").prop("disabled",true);
      }
      else
      {
        $("#submitButtonDriver").prop("disabled",false);
      }
    });

    ///////////////////////


    ///////////////// PROVJERA UNOSA GODINE - EKIPA
    if(!$('#yearInputTeam').val())
    {
      $("#submitButtonTeam").prop("disabled",true);
    }

    $('#yearInputTeam').on('input', function() 
    {
      if(!$('#yearInputTeam').val())
      {
      $("#submitButtonTeam").prop("disabled",true);
      }
      else
      {
        $("#submitButtonTeam").prop("disabled",false);
      }
    });
    /////////////////////

    if(!$('#yearInputCircuit').val())
    {
      $("#submitButtonCircuit").prop("disabled",true);
    }

    $('#yearInputCircuit').on('input', function() 
    {
      if(!$('#yearInputCircuit').val())
      {
      $("#submitButtonCircuit").prop("disabled",true);
      }
      else
      {
        $("#submitButtonCircuit").prop("disabled",false);
      }
    });


    
    

  });



  // yearInputDriver
  // lastNameDriver

  // yearInputTeam
  // teamInputTeam
  // circuitInputTeam

  // yearInputCircuit
  // circuitInputCircuit


