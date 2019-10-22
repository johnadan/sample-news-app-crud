// id, content
// function openDeleteModal(id){
//     $("#delNews").attr("action", "/deleteNew/"+id) ;
//     // "action", "/deleteNews/"+id
//     $("#Newsdel").html('Do you want to remove this news? This cannot be undone');
//     $("#deleteModal").modal("show");
// }

// function openEditModal(id, title, author, date, content){
// 	//image
//    $("#editedtitle").val(title);
//    $("#editedauthor").val(author);
//     $("#editedcontent").val(content);
//     $("#editeddate").val(date);
//     $("#editNew").attr("action", "/editNew/" + id);
//     $("#editModal").modal("show");
// }

// $('#search').on('keyup',function(){
//     $value = $(this).val();
//     $.ajax({
//     type : 'get',
//     url : '{{URL::to('search')}}',
//     data:{'search':$value},
//     success:function(data){
//     $('tbody').html(data);
//         }
//     });
// })

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });