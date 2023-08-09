<html>
  <head>
    <h1>Welcome to AJAX Quotes!</h1>

</h2>AJAX Quotes is an interactive web application that provides you with a continuous stream of inspiring and thought-provoking quotes. With just a click, you'll receive a new random quote, beautifully displayed with varying font styles to keep things fresh and exciting.

Each quote gracefully fades into view, creating a delightful experience as you explore the wisdom and insights of different authors. The fonts change dynamically, adding a touch of elegance and uniqueness to every quote you encounter.

Immerse yourself in the captivating world of wisdom, and let AJAX Quotes surprise you with new perspectives every 5 seconds. Whether you seek motivation, comfort, or inspiration, AJAX Quotes has the perfect quote for every moment.

Click below to begin your journey of enlightenment with AJAX Quotes!</h2>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Tulpen+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@700&display=swap');

      
      /* CSS to hide the quote container initially and apply fade-in animation */
        #quoteContainer {
            display: none;
            font-size:xx-large;
            text-shadow: 4px 4px 4px #aaa;
        }

        /* CSS for the fade-in animation */
        .fade-in {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

    </style>
  </head>
  <body>
    <h1>AJAX Quotes</h1>
   <p>Click below to return a random quote!</p>
    
    <div id="quoteContainer">Quotes go Here</div>
  <script>

    //helps us loop the array of fonts
    var counter = 0
    
    function getRandomQuote(){

      var fonts = ["Shadows Into Light","Tulpen One","Qwitcher Grypen"];
      //create AJAX oject
      var xhr = new XMLHttpRequest();

      //target the server page
      xhr.open('GET','random_quotes.php',true);

      //if data comes back, show it here
      xhr.onload = function(){
          if(xhr.status >= 200 && xhr.status < 300){//all ok, show data
            //document.querySelector("#quoteContainer").innerText = xhr.responseText;
            var quoteContainer = document.querySelector("#quoteContainer");

            //retrieve text from php page
            quoteContainer.innerText = xhr.responseText;
            

            //add font family
            quoteContainer.style.fontFamily = fonts[counter];
            counter++;
            if(counter >= fonts.length){
              counter = 0;
            }
            //make element visible
            quoteContainer.style.display = "block";

            //add fade in class
            quoteContainer.classList.add("fade-in");

            setTimeout(function(){
              quoteContainer.classList.remove("fade-in")
            },1500);

          }else{//show error
            document.querySelector("#quoteContainer").innerText = "Failed to fetch quote: " + xhr.status;
          }
      };

      //if trouble, investigate here
      xhr.onerror = function(){
        alert("Oh no! We received an XHR error!")
      };
      
      //send data to server
      xhr.send();
      
    }

    function displayRandomQuote(){
      //retrieve quote  
      getRandomQuote();

        //run every 5 seconds
        setInterval(getRandomQuote,5000)
    }
    //run on page load
    displayRandomQuote();
  </script>
  </body>
</html>
