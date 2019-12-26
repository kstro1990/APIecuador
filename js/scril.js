function mpi(){
  $.ajax(
  {
    url: 'mpi.php',
    data: {action: 'lookup'},
    type: 'post',
    success: function(output) {
    alert(output);
                    }
  });
}
