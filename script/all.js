// $(document).ready(function(){
    var demo;
    function showResult(){

        let result_search = document.getElementById("project").value;
        result_search = result_search.trim();
        console.log(result_search.length);
        if (result_search.length > 0) {
            document.getElementById("live-search").style.display="block";
            $.ajax({
                type: "POST",
                url: "./processing/live_search_result.php",
                data: {result_search},
                dataType: "json",
                success: function (response) {
                    demo = response
                    document.getElementById("live-search").innerHTML = "";
                    for (let i = 0; i < demo.length ; i++) {
                        document.getElementById("live-search").innerHTML += `
                        <a href="./view_course.php?id=`+ demo[i].id +`" class="live-search-name">
                            <h3>
                                ` + demo[i].name + `
                            </h3>
                            <p>
                                Tác giả: `+ demo[i].author +`
                            </p>
                            <p>
                                Giá: `+ demo[i].price + `
                            </p>
                        </a>
                        `
                    }
                    if (demo.length == 0){
                        document.getElementById("live-search").innerHTML = "";
                        document.getElementById("live-search").style.display="none";
                    }
                }
            });
        }else{
            document.getElementById("live-search").style.display="none";
        }
        
        // console.log(result_search)
    }
    document.addEventListener("click", function(){
        document.getElementById("live-search").innerHTML = "";
        document.getElementById("live-search").style.display="none";
    })
// })
