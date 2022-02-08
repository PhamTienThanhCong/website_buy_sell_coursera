var typeLink = 1;
var sortLink = "1j9xOVoV1JqMSmsIJ6ivRkKVNrv4mEw01";
var typeLinkEdit = 1;
var sortLinkEdit = "1j9xOVoV1JqMS";

var loadFile = function(event) {
    var output = document.getElementById('img-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

var changeTitle = function(event) {
    var output = document.getElementById('title-course');
    output.innerText = event.target.value;
}
var ChangePrice = function(event) {
    var output = document.getElementById('price-course');
    var x = parseInt(event.target.value);
    x = x.toLocaleString('it-IT', {
        style: 'currency',
        currency: 'VND'
    });
    console.log(x);
    output.innerHTML = "<i class='bx bxs-credit-card'></i> Giá thành:" + x;
}

function edit_course() {
    var a = document.getElementById('form-course').innerHTML;
    a = a.replaceAll("readonly=", "");
    a = a.replace('type="file_demo"', 'type="file"');
    a = a.replace('type="button" onclick="edit_course()">Chỉnh sửa khóa học', '>Lưu lại');
    document.getElementById('form-course').innerHTML = a;
}

var ChangeAuthor = function(event) {
    var output = document.getElementById('author-course');
    output.innerHTML = "<i class='bx bxs-user'></i> Tác giả: "+event.target.value;
}

function changeTypeLink() {
    var e = document.getElementById("type-link");
    typeLink = e.value;
    changeSortLink()
}

function changeSortLink(){
    var link = document.getElementById("link_video").value;
    if (typeLink == 1){
        link = link.split("watch?v=")[1];
        sortLink = link.split("&list=")[0];  
    }else if (typeLink == 2){
        link = link.split("/file/d/")[1];
        sortLink = link.split("/view?")[0];  
    }else{
        sortLink = document.getElementById("link_video").value;
    }
    document.getElementById('link_video_sort').value = sortLink;
    changeLinkIframe()
}

function changeLinkIframe(){
    var link = "";
    if (typeLink == 1){
        link = "https://www.youtube.com/embed/" + sortLink;
    }else if (typeLink == 2){
        link = "https://drive.google.com/file/d/" + sortLink + "/preview";
    }else{
        link = sortLink;
    }

    document.getElementById("preview-video-add").innerHTML = `<iframe width="100%" height="250" src="`+link+`" title="YouTube video player" frameborder="0" allowfullscreen></iframe>`;
}

document.getElementById("form-add-lesson").addEventListener('submit', function(event) {
    event.preventDefault();
    changeSortLink();
    document.getElementById("form-add-lesson").submit();
})

function edit_lesson(id, name_lesson, link, type, id_course) {
    var fullLink = "";
    if (type == 1){
        fullLink = "https://www.youtube.com/embed/" + link;
    }else if (type == 2){
        fullLink = "https://drive.google.com/file/d/" + link + "/preview";
    }else{
        fullLink = link;
    }

    var description = document.getElementById('lesson' + id + '').innerHTML;
    document.getElementById('edit-lesson').style.marginTop = '26px';
    document.getElementById('edit-lesson').innerHTML = `<div class="recent-sales box">
    <div class="title" style="text-align: center">Chỉnh sửa khóa học</div>
    <br>
    <div class=add-course>
        <h3 style="font-weight: normal">
            <i class='bx bx-book-add'></i>
            Chỉnh sửa khóa học: ` + name_lesson + `
        </h3>
        <br>
        <form id="form-edit-lesson" method="post" action="./processing/course_edit_lesson.php">
            <input type="hidden" name="id_course" value="`+id_course+`" required="">
            <input type="hidden" name="id_lesson" value="`+id+`" required="">
            <label class="lable-input" for="">Tên bài học:</label>
            <input type="text" name="name_lesson" value="`+name_lesson+`" required="">
            <br>
            <label class="lable-input" for="">Link bài học:</label>
            <input type="text" id="link_video_edit" required="" value="`+fullLink+`" onchange="changeSortLinkEdit()">
            <input type="hidden" id="link_video_sort_edit" name="link" value="`+link+`" required="">
            <label class="lable-input" for="">Thể loại:</label>
            <select id="type-link-edit" name="type_link" onchange="changeTypeLinkEdit()">
                <option value="1">Link video youtube</option>
                <option value="2">link video drive</option>
                <option value="3">link video khác</option>
            </select>
            <br>
            <label class="lable-input" for="">Mô tả về bài học:</label>
            <textarea class="textarea-lesson" name="description_lesson">`+description+`</textarea>
            <button id="btn-lesson" onclick="">Thêm Bài học</button>
        </form>

        <div class="preview-video" id="preview-video-edit">
            <iframe width="100%" height="250" src="`+fullLink+`" frameborder="0" allowfullscreen=""></iframe>
        </div>

        </div>
    </div>`
    document.getElementById('type-link-edit').value = type;
    typeLinkEdit = type;
    sortLinkEdit = link;
}


function changeTypeLinkEdit() {
    var e = document.getElementById("type-link-edit");
    typeLinkEdit = e.value;
    changeSortLinkEdit()
}

function changeSortLinkEdit(){
    var link = document.getElementById("link_video_edit").value;
    if (typeLinkEdit == 1){
        link = link.split("watch?v=")[1];
        sortLinkEdit = link.split("&list=")[0];  
    }else if (typeLinkEdit == 2){
        link = link.split("/file/d/")[1];
        sortLinkEdit = link.split("/view?")[0];  
    }else{
        sortLinkEdit = document.getElementById("link_video_edit").value;
    }
    document.getElementById('link_video_sort_edit').value = sortLinkEdit;
    changeLinkIframeEdit()
}

function changeLinkIframeEdit(){
    var link = "";
    if (typeLinkEdit == 1){
        link = "https://www.youtube.com/embed/" + sortLinkEdit;
    }else if (typeLinkEdit == 2){
        link = "https://drive.google.com/file/d/" + sortLinkEdit + "/preview";
    }else{
        link = sortLinkEdit;
    }

    document.getElementById("preview-video-edit").innerHTML = `<iframe width="100%" height="250" src="`+link+`" title="YouTube video player" frameborder="0" allowfullscreen></iframe>`;
}