const openTab = (tabNumber) => {
    const tabContent = document.querySelectorAll('.tab-content');
    const buttonLogin = document.querySelector('.btlog');
    const buttonRegister = document.querySelector('.btreg');
    const logButton = document.getElementById('btnlogin');
    const regButton = document.getElementById('btnregister');
    const btn = document.querySelectorAll('.btnbtn');

    localStorage.setItem('tab', tabNumber);

    tabContent.forEach(tab => {
        if(tab.id === "tab" + tabNumber) {
            tab.classList.add('tabtransform1');
            tab.style.display = 'block';
            tab.classList.remove('tabtransform2');
            tab.style.transition = 'opacity 1s, visibility 1s';
            tab.style.opacity = 1;
            tab.style.visibility = 'visible';
        } else{
            tab.classList.add('tabtransform2');
            tab.style.transition = 'opacity 1s, visibility 1s';
            tab.style.opacity = 0;
            tab.style.visibility = 'hidden';
            setTimeout(() => {
                tab.style.display = 'none'; 
            }, 500);
        }
    });

    btn.forEach(button => {
        setTimeout(() => {
            button.style.background = "#0B666A";
            button.style.boxShadow = "none";
        }, 50);    
        button.style.background = '#97FEED';
        button.style.boxShadow = "0 0 8px #97FEED, 0 0 16px #97FEED, 0 0 32px #97FEED, 0 0 64px #97FEED";
    });
    

    if(tabNumber == "1") {
        buttonLogin.style.display = 'none';
        buttonRegister.style.display = 'flex';
        regButton.classList.add('regbtnkeyframe');
    } else {
        buttonRegister.style.display = 'none';
        buttonLogin.style.display = 'flex';
        logButton.classList.add('logbtnkeyframe');
        logButton.style.transform = 'translateX(240px)';
    }

}


document.addEventListener('DOMContentLoaded', () => {
    const activeTab = localStorage.getItem('tab');
    if(activeTab){
        openTab(activeTab);
    } else{
        openTab(1);
    }
});