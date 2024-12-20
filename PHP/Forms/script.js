function myDisplayer(something){
    document.getElementById("demo").innerHTML=something;
}

function myCalc(num1, num2, myCallback){
    let sum= num1+num2;
    myCallback(sum);
}

myCalc(5, 5, myDisplayer);