$("#myAlert").fadeOut(4000);
var href = window.location.href;
function toModal(id){
     $(".modal-body #fav_id").val( id );
}

//******************Delete confirmation modals******************//
$(document).ready(function(){
  $('[href=#favoritoDelete_modal]').click(function(){
        var del_id = null;
        var del_id = $(this).attr('id');
        $('button#confirm').click(function(id){
            $.ajax({
                type: 'POST',//metodo pass POST or GET
                url: href+'delete_favorito/'+del_id,// page in that go put your post
                cache: false,
                success:function(){
                        $("#favoritoDelete_modal").modal('hide');// hide the modal identifie id
                        location.reload(); //reload the page on the success
                },
                error:function(){
                    alert('Ocorreu um erro!!!');
                }
            });
        });
    });
});