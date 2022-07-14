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
    $('#'+Tohide).hide()
    $('#child-menu').hide()
    menu.main_menu.show()
}

function loadChildMenu(child) {
    menu.main_menu.hide()
    $('#'+child).show()
}