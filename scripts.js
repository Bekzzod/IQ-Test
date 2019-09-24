/*
$(function(){
  $("#depositDate").datepicker();
});
*/


// Input[type=range] sync with Input[type=number]

function updateDepositAmountTextInput(val) {
  document.getElementById('depositAmount').value=val; 
}
function updateDepositAmountSliderInput(val) {
  document.getElementById('depositAmountSlider').value=val; 
}

function updateDepositReplenishmentAmountTextInput(val) {
  document.getElementById('depositReplenishmentAmount').value=val; 
}
function updateDepositReplenishmentAmountSliderInput(val) {
  document.getElementById('depositReplenishmentAmountSlider').value=val; 
}


// Ajax query

$(document).ready(function() {
  $('#submitBut').click(function(e) {
    e.preventDefault();

    if (($('#depositDate').val() != null && $('#depositDate').val() != "")  &&
       ($('#depositAmount').val() != null && $('#depositAmount').val() != "") &&
       ($('#depositReplenishmentAmount').val() != null && $('#depositReplenishmentAmount').val() != "")) {
      $.ajax({
        method: "POST",
        url: "/calc.php",
        dataType: "json",
        data: {
          depositDate: $('#depositDate').val(),
          depositAmount: $('#depositAmount').val(),
          depositTerm: $('#depositTerm').val(),
          depositReplenishmentYes: $("#depositReplenishmentYes").is(":checked"),
          depositReplenishmentNo: $("#depositReplenishmentNo").is(":checked"),
          depositReplenishmentAmount: $("#depositReplenishmentAmount").val(),
        },
        success: function(response){
          console.log(response);
          $('#result').val('Результат: ' + response);
        },
        error: function(err) {
          console.log(err);
        }
      });
    } else {
      alert('Введите правильные данные');
    }
  })
});