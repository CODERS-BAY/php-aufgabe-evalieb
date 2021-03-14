$(document).ready(function(){
    console.log('los geht`s');

    $('#addNewEmployee').submit(function(event){
        event.preventDefault();

        console.log('MA');

        $.ajax({
            type : 'post',
            data : $(this).serialize(),
            url : 'newEmployee.php',
            success : function(phpArray){
                console.log(JSON.parse(phpArray));

                phpArray = JSON.parse(phpArray);
                confirm(phpArray['1']);
                location.reload();

            },
            error : function(errorMsg){
                console.log(errorMsg);
            }
        });

    });

    $('#newMessage').submit(function(event){
        event.preventDefault();
        console.log('Nachricht speichern');
        /*
        next stepp: formular Daten  holen
        */
        let formData = $(this).serialize();
        newMessage(formData);
    });

    function newMessage(formData){
        $.ajax({
            type : 'post',
            data : formData, 
            url : 'newMessage.php',
            success : function(phpData){
                console.log(phpData);

                if(phpData.trim() == 'true'){
                    location.reload();
                }

            }, 
            error : function(errorMassage){
                console.log(errorMassage);
            }
        });
    }

    $('.delete').click(function(){
        console.log('Eintrag wird gelöscht<br>');
        //um später auf den Eintrag zuzugreifen, in eine Variable speichern!
        //let self = $(this);
        let entry = $(this).parent();
        /* über das Objekt und parent zu meiner Data-ID navigieren*/
        let noteID = $(this).parent().attr('data-id'); //mit einem weiterem .parent könnte man weiter hinauf navigieren
        let myData = {'noteID' : noteID}; //wir bauen uns ein Objekt --> um mit AJAX weg zu schicken //$_POST['noteID]
        console.log(noteID);

        $.ajax({
            type : 'post', 
            data : myData, 
            url : 'deleteMessage.php',
            success : function(phpData){ //Parameter der mitgegeben wird! 
                console.log(phpData);

                if(phpData.trim() == 'true'){
                    entry.remove(); //hier wird unser Eintrag gelöscht
                }
            },
            error : function(errorMsg){ //Parameter errorMsg -> wird automatisch generiert (kann auch anders genannt werden)
                console.log(errorMsg);
            }
        });
    });

    function deleteForSure(user){
        let check = confirm("Wollen Sie " + user + " wirklich löschen?");
            if (check == false) {
            history.back();
        }
    } 

});