(function () {
    var menu = document.getElementById('menu'); // colocar em cache
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) menu.classList.add('menuScroll'); // > 0 ou outro valor desejado
        else menu.classList.remove('menuScroll');
    });
})();