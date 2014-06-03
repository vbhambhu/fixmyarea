$.fn.exists = function(callback) {
  var args = [].slice.call(arguments, 1);

  if (this.length) {
    callback.call(this, args);
  }
  return this;
};


$('.datepicker').exists(function() {
 $('.datepicker').datepicker({format:'yyyy-mm-dd'});
});

$('#big_table').exists(function() {
  $('#big_table').dataTable();
});


function add_task(){

  var name = $('#task-name').val();
  var start_date = $('#start-date').val();
  var end_date = $('#end-date').val();
  var project_id = $('#project-id').val();
  var periority = $('#periority').val();

  $.post("/project/add_task", { name:name,start_date:start_date,end_date:end_date,project_id:project_id,periority:periority }, function(data) {
              
              console.log(data);
              //alert('done');
              //show_projects();
  },'html');

}






function add_project_show(){

	$('.add_project_box').css('display', 'visible');

}


function delete_project(id){

  if(!confirm('Are you sure you want to delete?')){ return false; }
  $.post("/project/delete_project", { project_id: id}, function(data) {
      show_projects();
  });
}


function add_project(){

	var project_name = $('#project_name').val();

	if(project_name.length > 0){

		$.post("/project/add", { project_name: project_name}, function(data) {
              show_projects();
    });

	}
}

function edit_project(id){

  var project_name = $('#project_name-'+id).val();

  if(project_name.length > 0){

    $.post("/project/edit", { project_id: id, project_name: project_name}, function(data) {
            show_projects();
    });

  }
}

$('#project_name').bind('keyup', function(e) {
    if( e.keyCode === 13 ) { 
      alert(5);
        add_project();
    }
});

show_projects();
function show_projects(){
 
  $.post("/dashboard/projects", function(data) {
              $('#projects').html(data);
  },'html');

}



$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})










