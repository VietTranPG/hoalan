$(document).ready(function () {
    var currentUrl = window.location.href;
    var currentPage = currentUrl.split('/').pop();
    $('#' + currentPage).addClass('active');
});
function readURL(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}