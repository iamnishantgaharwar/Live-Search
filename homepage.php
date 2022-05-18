<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="custom.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Search Books</title>
</head>

<body class="deep-purple card-nishant">
    <div class="row">
    
        <div class="col l6 offset-l3" style="margin-top: 10%;">
            <h1 class="white-text " style="text-align: center;">What are you looking for?</h1>
            <nav class="white">
                <div class="nav-wrapper">
                    <form id="form">
                        <div class="input-field">
                            <input id="search" type="search" required autocomplete="off">
                            <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                            <i class="material-icons " id="close_btn">close</i>
                        </div>
                    </form>
                    <div class="card-panel" id="output" style="display: none;"></div>
                </div>
            </nav>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        close_btn = document.getElementById("close_btn")
        form = document.getElementById("form")
        search_input = document.getElementById("search")
        output = document.getElementById("output")
        form.addEventListener("submit",submitnot)

        function submitnot(e){
            search_input.value='q'
            
        }
        search_input.addEventListener("keydown", (e) => {
            output.style.display = "block"
            output.innerHTML = `<div class="progress">
                        <div class="indeterminate"></div>
                        </div>`
            q = e.target.value
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "search.php?q="+q,true)
            xhr.onload = function() {
                //Status code 200 
                if(xhr.status==200){
                    output.innerHTML=''
                    output.innerHTML=xhr.responseText
                }
            }
            if (q.length >= 2)
                xhr.send();
                if (q.length==0) {
            output.innerHTML = ''
            output.style.display = "none"
        }
      
        })
        close_btn.addEventListener("click",function(e){
            search_input.value=''
            output.style.display = "none"
        })
     
    </script>
</body>

</html>