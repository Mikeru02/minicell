function clearInput(fieldName){
    const inputField = document.getElementById(fieldName);
    if (inputField.value === fieldName){
        inputField.value = '';
    }
}

function resetInput(fieldName){
    const inputField = document.getElementById(fieldName);

    if (inputField.value === ''){
        inputField.value = fieldName;
    }

}