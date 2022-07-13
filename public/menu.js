var menu = {
    sc_setup: $('#school_setup'),
    cm: $('#class_management'),
    ec:$('#exam_center'),
    ss:$('#settings'),
    school_center: $('#school_center'),
    main_menu: $('#main-menu')
}

function loadMainMenu(Tohide)
{
    alert('hello-world')
    $('#child-menu').hide()
 menu.main_menu.show(500)
}

function loadChildMenu(child) {
    menu.main_menu.hide()
    $('#'+child).show(1000)
}