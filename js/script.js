$(document).ready(function(){
    console.log('los geht`s');

    // $('#addNewEmployee').submit(function(event){
    //     event.preventDefault();
    //     console.log('Mitarbeiter anlegen');
    //     /*
    //     next stepp: formular Daten  holen
    //     */
    //     let formData = $(this).serialize();
    //     addNewEmployee(formData);
    // });

    // function addNewEmployee(formData){
    //     $.ajax({
    //         type : 'post',
    //         data : formData, 
    //         url : 'newEmployee.php',
    //         success : function(phpData){
    //             console.log(phpData);

    //             if(phpData.trim() == 'true'){
    //                 location.reload();
    //             }

    //         }, 
    //         error : function(errorMassage){
    //             console.log(errorMassage);
    //         }
    //     });
    // }


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


});