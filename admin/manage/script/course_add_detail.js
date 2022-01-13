function edit_lesson(id, name_lesson, ytb, id_course) {
    var description = document.getElementById('lesson' + id + '').innerHTML;
    document.getElementById('edit-lesson').style.marginTop = '26px';
    document.getElementById('edit-lesson').innerHTML = `<div class="recent-sales box">
    <div class="title" style="text-align: center">Chỉnh sửa khóa học</div>
    <br>
    <div class=add-course>
        <h3 style="font-weight: normal">
            <i class='bx bx-book-add'></i>
            Chỉnh sửa khóa học ` + name_lesson + `
        </h3>
        <br>
        <form method='post' action='./processing/course_edit_lesson.php'>
            <input type="hidden" name="id_lesson" value="` + id + `"required>
            <input type="hidden" name="id_course" value="` + id_course + `"required>
            <label class="lable-input" for="">Tên bài học:</label>
            <input type="text" name="name_lesson" value="` + name_lesson + `" required>    
            <br>
            <label class="lable-input" for="">Link youtube bài học:</label>
            <input type="text" name="link_ytb_lesson" value="https://www.youtube.com/watch?v=` + ytb + `" required>
            <br>
            <label class="lable-input" for="">Mô tả về bài học:</label>
            <textarea class="textarea-lesson" name="description_lesson">` + description + `</textarea>
            <button id="btn-lesson2">Lưu thay đổi</button>
        </form>

        </div>
    </div>`

}

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