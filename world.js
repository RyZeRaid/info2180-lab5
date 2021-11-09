window.onload = function(){

    let button1 = document.querySelector("#lookup");
    let button2 = document.querySelector("#lookup_cities");

    button1.addEventListener("click", onClick);
    button2.addEventListener("click", onClick);


    function onClick(e){
        let response = document.querySelector("#country").value;

        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("result").innerHTML = this.responseText;
            }
        }
        if(e.target.id === "lookup"){
            xhr.open('GET', 'world.php?country='+response+"&context", true);
        }else if (e.target.id === "lookup_cities"){
            xhr.open('GET', 'world.php?country='+response+"&context=cities", true);
        }
        
        xhr.send();
    }
}