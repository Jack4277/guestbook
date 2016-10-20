// // $.ajaxSetup({
// //    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
// // });
//
//
//     $.get('/api/authors', function (res) {
//         console.log(res);
//         var ul = $('.authorsList');
//         $('.authorsList > li').remove();
//         $.each(res,function (i,e) {
//             ul.append('<li>'+ e.name + "</li>");
//         });
//     });
//
//
// $('.addAuthor').click(function () {
//    $.post('/api/authors/new', {
//        name: $('#newAuthor').val(),
//        '_token': $('meta[name="_token"]').attr('content')
//    }, function (res) {
//        console.log(res);
//        if (res.status == 'success') {
//            var ul = $('.authorsList');
//            ul.append('<li>'+ $('#newAuthor').val() + "</li>");
//        }
//    });
// });