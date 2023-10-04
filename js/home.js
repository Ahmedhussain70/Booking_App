let other = document.getElementById('other');
let managment = document.getElementById('manage');
let department = document.getElementById('department');
let otherr = document.getElementById('otherd');
let input = document.getElementById('input-disabled');
let input2 = document.getElementById('input-disabledd');


other.onclick = function(){
    if(other.value== "other"){
        managment.style.display="block";
        input.removeAttribute("disabled");
    }else{
        managment.style.display="none";
        // input.setAttribute("disabled");
    }
}

otherr.onclick = function(){
    if(otherr.value== "other"){
        department.style.display="block";
        input2.removeAttribute("disabled");
    }else{
        department.style.display="none";
        // input.setAttribute("disabled");
    }
}

//------------to print report---------------

// let printWindow = document.getElementById('btn-print');

// printWindow.onclick = function(){
//     printWindow = window.open('print.php');
//     printWindow.print();

//     printWindow.onafterprint = function(){
//         printWindow.close()
//     }
// }