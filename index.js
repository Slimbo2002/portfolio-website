const tracker = document.querySelector('#visitor-tracker')

function GetStorage(){
    const storage = localStorage.getItem("visitorNum");

    if (storage == null){
        localStorage.setItem("visitorNum", 0);
        return 0;
    }
    else{
        return Number(storage);
    }
}
function SetStorage(number){
    localStorage.setItem("visitorNum", number);
}
function IncrementTracker(){
    let number = GetStorage();
    number += 1;
    SetStorage(number);
    tracker.innerHTML = number;
}