// OL7353617M 9780140328721 testing ISBN numbers

window.addEventListener("load", pageSetup, false);
window.addEventListener('error', function(e) {
    console.log(e);
}, true);


function pageSetup() {
    //adds listeners and hides form details until ISBN success
    var button = document.getElementById("findButton");
    button.addEventListener("click", ISBNValidate, false);
    var form = document.getElementById("textDetailForm");
    form.style.display = "none";
    var prevSubmit = document.getElementById("textSubmitSuccess").value;
    var prevDiv = document.getElementById("prevDiv");
    var prevISBN = document.getElementById("prevISBN").value;
    if(prevSubmit == "1") {
        alert("Textbook submission Successful!");
        prevDiv.innerHTML = "Previous Successful ISBN: " + prevISBN;
        prevDiv.style.color = "Green";
        prevDiv.style.display = "block";
    }
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
            console.log(TxtData);
            // parse out array of authors from txt data and save it in authors var
            authors = TxtData['authors'];

            //parse out json from TxtData and put it into form

            //get all the authors for the book. set value with the getAuthor function
            if (authors != null) {
                for(x=0; x < authors.length; x++){
                    getAuthor(authors[x].key);
                }
            }
            // displays form and data upon success
            processJSON(TxtData);
            showForm();

        }
        else if (this.status == 404) {
            var isbnField = document.getElementById("isbnField");
            var errDiv = document.getElementById("isbnError");
            var form = document.getElementById("textDetailForm");
            form.style.display = "none";
            errDiv.innerHTML = "ISBN not found by API";
            errDiv.style.display = "block";
            errDiv.style.color = "red";
            isbnField.style.border = "solid red 2px";
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
    var form = document.getElementById("textDetailForm");
    form.reset();
    var isbn = document.getElementById("isbnField2");
    var title = document.getElementById("titleField");
    var edition = document.getElementById("editionField");
    var publisher = document.getElementById("publisherField");
    var format = document.getElementById("formatField");
    isbn.value = document.getElementById("isbnField").value;
    title.value = jsonStr.title;
    edition.value = jsonStr.type.key;
    if (edition.value == "/type/edition") {
        edition.value = "";
    }
    if (jsonStr.publishers != undefined) {
        if (jsonStr.publishers == true || jsonStr.publishers == false) {
            publisher.value = "";
        }
        else {
            publisher.value = jsonStr.publishers[0];
        }
    }
    else {
        publisher.value = "";
    }
    if (jsonStr.physical_format != undefined) {
        var formatString = jsonStr.physical_format;
        if (formatString.includes("Paper") || formatString.includes("paper")) {
            format.value = "Paperback";
            }
        else if (formatString.includes("Hard") || formatString.includes("hard")) {
            format.value = "Hardcover";
        }
        else if (formatString.includes("Loose") || formatString.includes("loose")) {
            format.value = "Loose-Leaf";
        }
        else if (formatString.includes("ebook") || formatString.includes("eBook") || formatString.includes("e-Book") || formatString.includes("e-book")) {
            format.value = "eBook";
        }
        else {
            format.value = "";
        }
    }
    else if (jsonStr.physical_format == undefined && jsonStr.edition_name != undefined) {
        var editionName = jsonStr.edition_name;
        if (editionName.includes("Paper") || editionName.includes("paper")) {
            format.value = "Paperback";
            }
        else if (editionName.includes("Hard") || editionName.includes("hard")) {
            format.value = "Hardcover";
        }
        else if (editionName.includes("Loose") || editionName.includes("loose")) {
            format.value = "Loose-Leaf";
        }
        else if (editionName.includes("ebook") || editionName.includes("eBook") || editionName.includes("e-Book") || editionName.includes("e-book")) {
            format.value = "eBook";
        }
        else {
            format.value = "";
        }
    }
}

function showForm() {
    // Displays the more detailed form after a succesful ISBN uri
    var form = document.getElementById("textDetailForm");
    form.style.display = "block";

}
