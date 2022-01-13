
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