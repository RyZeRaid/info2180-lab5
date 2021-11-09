window.onload = function(){

    let button = document.querySelector("#lookup");

    button.addEventListener("click", onClick);


    function onClick(e){
        let response = document.querySelector("#country").value;
        console.log(response);

        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("result").innerHTML = this.responseText;
            }
        }

        xhr.open('GET', 'world.php?country='+response, true);
        xhr.send();
    }
}