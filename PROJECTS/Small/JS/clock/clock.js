/**
 * script that give us the current time in the format HH:MM:SS AM/PM every second
 */


// USING HTML FILE
// function to get the current time every second and inner into the html file in the id="time"
// more legible function
function getTime() {
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    var time = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
    document.getElementById("time").innerHTML = time;
    document.getElementById("date").innerHTML = (`${date.getDate()}/${date.getMonth()}/${date.getFullYear()}`);

}


function getCurrentDateTime() {
    var date = new Date();
    document.getElementById("date").innerHTML = (`${date.getDate()}/${date.getMonth()}/${date.getFullYear()}`);
    document.getElementById("time").innerHTML = (`${date.getHours()}:${date.getMinutes()}:${date.getSeconds()} ${date.getHours() >= 12 ? 'PM' : 'AM'}`);
}

// ===========================================================================================

// USING CONSOLE LOG
// Functions that give us the current time every second in console.log
// create a function that will be called every second
var currentTime = () => {
    var date = new Date();
    // show the current time in the console
    console.log(`${date.getHours()}:${date.getMinutes()}:${date.getSeconds()} ${date.getHours() >= 12 ? 'PM' : 'AM'}`);
    // show the current date in the console
    console.log(`${date.getDate()}/${date.getMonth()}/${date.getFullYear()}`);
}

// call the function every second
// setInterval(currentTime, 1000);
// getTime();