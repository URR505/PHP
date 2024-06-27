function openTab(tabId) {
    var buttons = document.querySelectorAll('.tab-button');
    buttons.forEach(function (li) {
        li.classList.remove('active');
    });

    var tabPanes = document.querySelectorAll('.tab-pane');
    tabPanes.forEach(function (pane) {
        pane.classList.remove('active');
    });

    // Añadir clase active al li que contiene el enlace clickeado
    var clickedLink = document.querySelector(`a[onclick="openTab('${tabId}')"]`);
    clickedLink.parentElement.classList.add('active');

    document.getElementById(tabId).classList.add('active');
}


function openTab1(tabId) {
    // Remove active class from all buttons and panes
    var buttons = document.querySelectorAll('.tab-button');
    buttons.forEach(function(button) {
        button.classList.remove('active');
    });

    var tabPanes = document.querySelectorAll('.tab-pane');
    tabPanes.forEach(function(pane) {
        pane.classList.remove('active');
    });

    // Add active class to the selected button and pane
    document.querySelector(`.tab-button[onclick="openTab('${tabId}')"]`).classList.add('active');
    document.getElementById(tabId).classList.add('active');

    // Reset all input fields in the selected tab
    var inputs = document.querySelectorAll(`#${tabId} .searchInput`);
    inputs.forEach(function(input) {
        input.value = '';
    });

    // Optionally, you can also trigger input event to reset filtering
    inputs.forEach(function(input) {
        $(input).trigger('input');
    });
}