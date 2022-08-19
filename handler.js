
$(document).ready(function(){
    

    $(document).on('click', '.delete', function(){

        var id = $(this).data('id');
        //console.log("id é :" +id);
        $.ajax({
            url:"script.php",
            method:"POST",
            data:{action:'delete', id:id},
            dataType:"text",
            success:function(data)
            {
                window.location.reload();
                //console.log(data);
            }
        });
        

    });

    $(document).on('click', '.del-filho', function(){

        var id_filho = $(this).data('id');
        var id_pai = $(this).data('pai');

        console.log("id pai é: "+id_pai+" e id filho é :" +id_filho);

        $.ajax({
            url:"script.php",
            method:"POST",
            data:{action:'del-filho', id_pai:id_pai,id_filho:id_filho},
            dataType:"text",
            success:function(data){

                //console.log(data);
                window.location.reload();
            }
        });
        

    });

    $(document).on('click', '.novo-filho', function(){

        var id_pai = $(this).data('pai');
        var nome = prompt("Informe o nome:");
        console.log("id pai é: "+id_pai+" nome: " +nome);
        if(nome != null){
            $.ajax({
                url:"script.php",
                method:"POST",
                data:{action:'novo-filho', id_pai:id_pai, nome:nome},
                dataType:"text",
                success:function(data){

                    //console.log(data);
                    window.location.reload();
                }
            });
        }

    });

    $(document).on('click', '.gravar-bd', function(){
        
        $.ajax({
            url:"script.php",
            method:"POST",
            data:{action:'gravar-bd'}, 
            dataType:"text",
            success:function(data){
                //console.log(data);
                window.location.reload();
                alert("sucesso");
            }
        })

    });

    $(document).on('click', '.ler-bd', function(){

        //console.log('top aqui1');
        
        $.ajax({
            url:"script.php",
            method:"POST",
            data:{action:'ler-bd'}, 
            dataType:"text",
            success:function(data){
                //console.log(data);
                window.location.reload();
            }
        })

    });

    $(document).on('click', '.pessoa-adicionada', function(){ 

        var input = document.querySelector("#entrada").value;


        if(input != null && input !=""){
            $.ajax({
                url:"script.php",
                method:"POST",
                data:{action:'pessoa-adicionada', input:input}, 
                dataType:"text",
                success:function(data){
                    //console.log(data);
                    window.location.reload();
                }
            })
        }

    });

});

$(window).on("load", function(){

/*
    $.ajax({
        url:"script.php",
        method:"POST",
        data:{action:'reloadtxt'},
        dataType:"text",
        success:function(data)
        {
            console.log(data);
        }
    });
*/

    
});
