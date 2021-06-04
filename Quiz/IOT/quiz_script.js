//Burger Side Bar Animation Function
const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-link, .head-button');
    
    burger.addEventListener('click', () => {
        //Toggle Nav
        nav.classList.toggle('nav-active');

        //Animate Links
        navLinks.forEach((link, index) =>{
            if (link.style.animation)
            {
                link.style.animation = ''
            }
            else
            {
                link.style.animation = link.style.animation = `navLinkFade 0.5s ease forwards ${index / 5 + 0.8}s`;
            }
        })
        //Burger Animation
        burger.classList.toggle('toggle');
    });
}
navSlide();


//Quiz Test 
var rarray; //Global Array to hold JSON Obj

function getWelcome() //Function to parse JSON objs and is run onload  
{ 
    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.onreadystatechange = function()
    {
        if(ajaxRequest.readyState == 4)
        {
            //the request is completed, now check its status
            if(ajaxRequest.status == 200)
            {
                //turn JSON into object
                var jsonObj = JSON.parse(ajaxRequest.responseText);
                //get array
                rarray = jsonObj.questions;

                let runningQuestion = 0;
                let count = 0;
                const questionTime = 10;
                const gaugeWidth = 150;
                const gaugeUnit = gaugeWidth / questionTime;
                let TIMER;
                let score = 0;

                startQuiz = () => {
                    document.getElementById("start").style.display = "none";
                    renderQuestions();
                    document.getElementById("quiz").style.display = "block";
                    renderCounter();
                    TIMER = setInterval(renderCounter,1000);
                }

                renderQuestions = () => {
                    let q = rarray[runningQuestion];
                    document.getElementById("question").innerHTML = q.question;
                    document.getElementById("A").innerHTML = q.choiceA;                
                    document.getElementById("B").innerHTML = q.choiceB;
                    document.getElementById("C").innerHTML = q.choiceC;
                    
                }

                renderCounter = () => {
                    if (count <= questionTime){
                        document.getElementById("counter").innerHTML = count;
                        document.getElementById("timeGauge").style.width = count * gaugeUnit + "px";
                        count++;
                    }else{
                        count=0;
                        runningQuestion++;
                        if (runningQuestion < rarray.length){
                            renderQuestions();
                        }else{
                            clearInterval(TIMER);
                            renderScore();
                        }
                    }
                }
                
                renderScore = () => {
                    document.getElementById("quiz").style.display = "none";
                    document.getElementById("scoreContainer").style.display = "flex";
                    document.getElementById("scoreContainer").style.flexDirection = "column";

                    const scoreDisplay = score +" / "+ rarray.length;
                    document.getElementById("scoreDisplay").innerHTML = scoreDisplay 
                }

                checkAnswer = (answer) => {
                    if (answer == rarray[runningQuestion].correct){
                        score++;
                    }
                    count = 0;
                    runningQuestion++;
                    if (runningQuestion < rarray.length){
                        renderQuestions();
                    }else{
                        clearInterval(TIMER);
                        renderScore();
                    }
                }

                document.getElementById("start").addEventListener("click", startQuiz);  
            }
            else
            {
                console.log("Status error: " + ajaxRequest.status);
            }
        }
        else
        {
            console.log("Ignored readyState: " + ajaxRequest.readyState);
        }
    }
    ajaxRequest.open('GET', 'questions.json'); //Request to open the JSON file 
    ajaxRequest.send(); //Send the requested file 
}
