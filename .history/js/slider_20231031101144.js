(function(){
    const sliders = [...document.querySelectorAll('.testimony__body')];
    const buttonNext = document.querySelector('#next');
    const buttonBefore = document.querySelector('#Before');
    let value;

    buttonNext.addEventListener('click', ()=>{
        changePosition(1);
    });
    buttonBefore.addEventListener('click', ()=>{
        
        changePosition(-1);
    });

    const changePosition = (add)=>{
        console.log(add)
    }
    
})(); 