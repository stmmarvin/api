function online_documentation_open_tab(evt, cityName) {
    var online_documentation_i, online_documentation_tabcontent, online_documentation_tablinks;
    online_documentation_tabcontent = document.getElementsByClassName("tabcontent");
    for (online_documentation_i = 0; online_documentation_i < online_documentation_tabcontent.length; online_documentation_i++) {
        online_documentation_tabcontent[online_documentation_i].style.display = "none";
    }
    online_documentation_tablinks = document.getElementsByClassName("tablinks");
    for (online_documentation_i = 0; online_documentation_i < online_documentation_tablinks.length; online_documentation_i++) {
        online_documentation_tablinks[online_documentation_i].className = online_documentation_tablinks[online_documentation_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});