// This function will load the products by Hgh Price
function loadContent() {
    var request = new XMLHttpRequest();
    request.onload = function() {
        if (request.status === 200) {
            var responseData = request.responseText;
            document.getElementById("ServerContent").innerHTML = responseData;
        } else
            alert("Error" + request.status);
    };
    request.open("GET", "sort.php");
    request.send();
}

// This function will load the products by Low Price
function loadContent2() {
    var request = new XMLHttpRequest();
    request.onload = function() {
        if (request.status === 200) {
            var responseData = request.responseText;
            document.getElementById("ServerContent").innerHTML = responseData;
        } else
            alert("Error" + request.status);
    };
    request.open("GET", "sort2.php");
    request.send();
}

// This function will load the products by ascending order
function ascSort() {
    var request = new XMLHttpRequest();
    request.onload = function() {
        if (request.status === 200) {
            var responseData = request.responseText;

            document.getElementById("ServerContent").innerHTML = responseData;
        } else
            alert("Error" + request.status);
    };
    request.open("GET", "sortAsc.php");
    request.send();
}

// This function will load the products in descending order
function decSort() {
    var request = new XMLHttpRequest();
    request.onload = function() {
        if (request.status === 200) {
            var responseData = request.responseText;
            document.getElementById("ServerContent").innerHTML = responseData;
        } else
            alert("Error" + request.status);
    };
    request.open("GET", "sortDec.php");
    request.send();
}


//Constructor for the recommender object
function Recommender(){
    this.keywords = {}; //Holds the keywords
    this.timeWindow = (840000 * 10); //Keywords older than this window will be deleted
    this.load();
}


//Adds a keyword to the reommender
Recommender.prototype.addKeyword = function(word){
    //Increase count of keyword
    if(this.keywords[word] === undefined)
        this.keywords[word] = {count: 1, date: new Date().getTime()};
    else{
        this.keywords[word].count++;
        this.keywords[word].date = new Date().getTime();
    }
    
    console.log(JSON.stringify(this.keywords));
    
    //Save state of recommender
    this.save();
};


/* Returns the most popular keyword */
Recommender.prototype.getTopKeyword = function(){
    //Clean up old keywords
    this.deleteOldKeywords();
    
    //Return word with highest count
    var maxCount = 0;
    var maxKeyword = "";
    for(var word in this.keywords){
        if(this.keywords[word].count > maxCount){
            maxCount = this.keywords[word].count;
            maxKeyword = word;
        }
    }
    return maxKeyword;
};


/* Saves state of recommender. Currently this uses local storage, 
    but it could easily be changed to save on the server */
Recommender.prototype.save = function(){
    localStorage.recommenderKeywords = JSON.stringify(this.keywords);
    
};


/* Loads state of recommender */
Recommender.prototype.load = function(){
    if(localStorage.recommenderKeywords === undefined)
        this.keywords = {};
    else
        this.keywords = JSON.parse(localStorage.recommenderKeywords);
    
    //Clean up keywords by deleting old ones
    this.deleteOldKeywords();
};


//Removes keywords that are older than the time window
Recommender.prototype.deleteOldKeywords = function(){
    var currentTimeMillis = new Date().getTime();
    for(var word in this.keywords){
        if(currentTimeMillis - this.keywords[word].date > this.timeWindow){
            delete this.keywords[word];
        }
    }
};



//Create recommender object - it loads its state from local storage
var recommender = new Recommender();

//Display recommendation
window.onload = showRecommendation;

//Searches for products in database
function search() {
    //Extract the search text
    var searchText = document.getElementById("SearchInput").value;
    recommender.addKeyword(searchText);
}

//Display the recommendation in the document
function showRecommendation() {
    var xmlRequest = new XMLHttpRequest();
    xmlRequest.onload = function() {

        if (xmlRequest.status === 200) {
            var prodObject = xmlRequest.responseText;
            var htmlStr = "";
            htmlStr += "<p>" + prodObject + "</p>";
            document.getElementById("rec").innerHTML = htmlStr;
        }
    };
    xmlRequest.open("POST", "get_recommended_products.php", false);
    xmlRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlRequest.send("keyword=" + recommender.getTopKeyword());
}
