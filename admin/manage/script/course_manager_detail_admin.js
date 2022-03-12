let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if (sidebar.classList.contains("active")) {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    document.getElementById('ytb').style.marginLeft = "100px";
  } else{
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    document.getElementById('ytb').style.marginLeft = "0px";
  }
}

function edit_lesson(name_course,name_lesson, ytb) {
    var conten = document.getElementById('lesson'+ytb+'').innerHTML;
    document.getElementById('edit-lesson').innerHTML = `
        <div class="recent-sales box">
        <div class="title" id="trang-trang" style="text-align: center">Xem thử bài học</div>
        <div class="title">`+name_course+`</div>
        <br>
        <iframe id="ytb" width="1000" height="500" src="https://www.youtube.com/embed/`+ytb+`" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br><br>
        <div class="title">`+name_lesson+`</div>
        <br>
        <p>`+conten+`</p>
        </div>`
    document.getElementById('edit-lesson').style.marginTop = '26px';
}

function convertLink(sortLink,typeLink){
  var link = "";
  if (typeLink == 1){
      link = "https://www.youtube.com/embed/" + sortLink;
  }else if (typeLink == 2){
      link = "https://drive.google.com/file/d/" + sortLink + "/preview";
  }else{
      link = sortLink;
  }
  return link;
}

function showVideo(link,typeLink,number){
  var fullLink = convertLink(link,typeLink);
  if (number == "0"){
      window.open(fullLink, '_blank').focus();
  }else{
      var idLink = "video"+number;
      document.getElementById(idLink).innerHTML = `<iframe width="330" height="190" src="`+fullLink+`" title="YouTube video player" frameborder="0" allowfullscreen></iframe>`
  }
}

$(document).ready(function () {
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  $(".btn-update").click(function(){
    var id_lesson_update = this.value
    var deleteThis = $(this).parent().parent();
    $.ajax({
      type: "POST",
      url: "./processing/accept_change.php",
      data: {id_lesson_update},
      dataType: "html",
      success: function (response) {
        toastr["success"]("Cập nhập bài học thành công", "Thành công");
        deleteThis.remove();
      }
    });
  })
  $(".btn-delete").click(function(){
    var id_lesson_update = this.value
    var deleteThis = $(this).parent().parent();
    $.ajax({
      type: "GET",
      url: "./processing/course_update_delete_lesson.php",
      data: {id_lesson_update},
      dataType: "html",
      success: function (response) {
        toastr["success"]("Xóa bài học thành công", "Thành công");
        deleteThis.remove();
      }
    });
  })
});