$(document).ready(function(){
    //dropdown

    $('#bot-nav_dropdown').dropdown({
        coverTrigger: false,
        inDuration: 350,
        outDuration: 550,
        onOpenStart(){
            $('#arrow-dropdown').html('arrow_drop_up');
        },
        onCloseStart(){
            $('#arrow-dropdown').html('arrow_drop_down');
        }
    });

    //Modals

    $('.modal').modal();

    $('.tooltipped').tooltip();

    $('.sidenav').sidenav();

});