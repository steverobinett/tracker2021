// OL7353617M 9780140328721 testing ISBN numbers

window.addEventListener("load", pageSetup, false);


function pageSetup() {
    //adds listeners and hides form details until ISBN success
    var button = document.getElementById("findButton");
    button.addEventListener("click", ISBNValidate, false);
    var form = document.getElementById("textDetailForm");
    form.style.display = "none";
}

function getTxtBook(){
    var field = document.getElementById("isbnField").value;
    // 1 make request object
    const xhr = new XMLHttpRequest();
    var uri = "https://openlibrary.org/isbn/" + field + ".json";
    
    // 2 open the request
    xhr.open("GET",uri,true);

    // 3 look for the response
    xhr.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){

            //TxtData is the JSON object. 
            var TxtData = JSON.parse(this.responseText);
            // parse out array of authors from txt data and save it in authors var
            var authors = TxtData['authors'];

            //parse out json from TxtData and put it into form

            //get all the authors for the book. set inner html with the getAuthor function
            for(x=0; x < authors.length; x++){
                getAuthor(authors[x].key);
            }
            // displays form and data upon success
            processJSON(TxtData);
            showForm();

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

                //change value by adding multiple authors into one string.
                var author = document.getElementById('authorField');
                if (author.value != "") {
                    author.value = author.value + ", " + name;
                }
                else {
                    author.value = name;
                }
                
            }
            
        };
        
        xhr.send();
}

function processJSON(jsonStr) {
    // Sets parse data into fields for submission
    var isbn = document.getElementById("isbnField2");
    var title = document.getElementById("titleField");
    var edition = document.getElementById("editionField");
    var publisher = document.getElementById("publisherField");
    isbn.value = document.getElementById("isbnField").value;
    title.value = jsonStr.title;
    edition.value = jsonStr.type.key;
    publisher.value = jsonStr.publishers[0];
}

function showForm() {
    // Displays the more detailed form after a succesful ISBN uri
    var form = document.getElementById("textDetailForm");
    form.style.display = "block";

}
