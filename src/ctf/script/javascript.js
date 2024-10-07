var forms = document.querySelectorAll('.questionForms');

forms.forEach(function(form) {
  form.addEventListener('submit', function(event) {
    event.preventDefault();
    
    var flag = this.querySelector('input[name="question"]').value;
    var questId = this.querySelector('input[name="questId"]').value;
    console.log(flag)
    console.log(questId)
    
    // var formData = new FormData();
    // formData.append('flag', flag);
    // formData.append('questionId', questId);

    
    // var xhr = new XMLHttpRequest();
    // xhr.open('POST', 'questPro/osintQuest.php', true);
    // xhr.onreadystatechange = function() {
    //   if (xhr.readyState == 4 && xhr.status == 200) {
    //     let result = xhr.responseText;
    //     console.log(result)
    //     if(result == 1){

    //       let divToRemove = document.querySelector('.flagResponse');
    //       if (divToRemove) {
    //         divToRemove.remove();
    //       }

    //       let inputClassName = ".osintInput"+questId;
    //       let inputOsint = document.querySelector(inputClassName);

    //       inputOsint.disabled = "true";
          
    //       let buttonClassName = ".osintButton"+questId;
    //       let buttonOsint = document.querySelector(buttonClassName);

    //       buttonOsint.style.color = "white"
    //       buttonOsint.style.backgroundColor = "green"
    //       buttonOsint.disabled = true;

    //       let newDiv = document.createElement("div");
    //       newDiv.textContent = "Flag doğru :)";
    //       newDiv.className = "flagResponse"
    //       newDiv.style.color = "white";
    //       newDiv.style.backgroundColor = "green";
    //       newDiv.style.borderRadius = "10px";
    //       newDiv.style.padding = "5px"
    //       newDiv.style.textAlign = "center"
    //       newDiv.style.marginTop = "7px";

    //       let className = ".osint"+questId;
    //       let existingDiv = document.querySelector(className);


    //       existingDiv.appendChild(newDiv);
    //     }else{
    //       let divToRemove = document.querySelector('.flagResponse');
    //       if (divToRemove) {
    //         divToRemove.remove();
    //       }

    //       let newDiv = document.createElement("div");
    //       newDiv.textContent = "Flag yanlış :(";
    //       newDiv.className = "flagResponse"
    //       newDiv.style.color = "white";
    //       newDiv.style.backgroundColor = "red";
    //       newDiv.style.borderRadius = "10px";
    //       newDiv.style.padding = "5px"
    //       newDiv.style.textAlign = "center"
    //       newDiv.style.marginTop = "7px";

    //       let className = ".osint"+questId;
    //       let existingDiv = document.querySelector(className);


    //       existingDiv.appendChild(newDiv);
    //     }

    //   }
    // };
    // xhr.send(formData);
  });
});
