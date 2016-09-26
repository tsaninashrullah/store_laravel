 $('.games-list').click(function(e){
    e.preventDefault();
    $.ajax({
      url:'/games',
      type:"GET",
      dataType: "json",
      success: function (data)
      {
        $('.panel-body').html(data);
      },
      error: function (xhr, status)
      {
        console.log(xhr.error);
      }
    });
  });