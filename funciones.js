
function fecha(){
    
  var actual = Date.now();
  var fecha = new Date(actual);
  
  var dia = fecha.getDate();
  var mes = fecha.getMonth() + 1;
  var anio = fecha.getFullYear();
  return dia + "-" + mes + "-" + anio;
  
  }

