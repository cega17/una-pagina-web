(function(){
    const titleQuestions = [...document.querySelectorAll('.questiions__title')];
    console.log(titleQuestions)

    titleQuestions.forEach(question =>{
        question.addEventListener('click', () =>{
            alert('oush, me diste click')

        })
    });
})();