button = document.getElementById("button");
button.addEventListener("click", getTxtBook);

function getTxtBook(){
    field = document.getElementById("isbnField").value;
    // 1 make request object
    const xhr = new XMLHttpRequest();
    console.log(field);
    var uri = "https://cors-anywhere.herokuapp.com/https://openlibrary.org/isbn/" + field + ".json";
    
    // 2 open the request
    xhr.open("GET",uri,true);

    // 3 look for the response
    xhr.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){

            //TxtData is the JSON object. 
            var TxtData = JSON.parse(this.responseText);
            console.log(TxtData);
            // parse out array of authors from txt data and save it in authors var
            authors = TxtData['authors'];

            //parse out json from TxtData and put it into form

            //get all the authors for the book. set inner html with the getAuthor function
            for(x=0; x < authors.length; x++){
                getAuthor(authors[x].key);
            }

        }
        
    };
    
    
    xhr.send();
    
}

function getAuthor(authors){
        // 1 make request object
        const xhr = new XMLHttpRequest();
        var uri = "https://openlibrary.org" + authors + ".json";
        
        // 2 open the request
        xhr.open("GET",uri,true);
    
        // 3 look for the response
        xhr.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){

                // authorData is JSON object for author
                var authorData = JSON.parse(this.responseText);

                // author name is parsed out from authorData and saved into the name var
                var name = authorData.name;

                //change inner html by adding multiple authors into one string.
                // document.getElementById('output').innerHTML = document.getElementById('output').innerHTML + name + " , ";
            }
            
        };
        
        xhr.send();
}


