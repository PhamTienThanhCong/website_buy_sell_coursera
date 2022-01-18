
var loadFile = function(event) {
    var output = document.getElementById('img-preview');
    console.log(event.target.files[0])
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
        var ChangeAuthor = function(event) {
            var output = document.getElementById('author-course');
            output.innerHTML = "<i class='bx bxs-user'></i> Tác giả: "+event.target.value;
        }