$(function(){
    let id;
	prompt();
    function ajaxing(){
        try{
            xhr=new XMLHttpRequest();
        }catch(e1){
            try{
                xhr=new ActiveXObject("Microsoft.XMLHTTP");
            }catch(e2){
                alert("Erreur");
            }
        }
        return xhr;
    }
    /////////////////////////////////////////////////////
    function donnee(){
        xhr=ajaxing();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tb").html(xhr.responseText);
            }
        }
        xhr.open("get","../php/affichage.php",true);
        xhr.send(null);
    }
    /////////////-----------PRODUIT--------------/////////////////////////
    $(document).on("click","#bp",function(){
        xhr=ajaxing();
        let np=$("#np").val();
        let up=$("#up").val();
        let qp=$("#qp").val();
        if($("#bp").text()=="Ajouter"){
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tbp").html(xhr.responseText);
            }
        }
        xhr.open("post","../php/produit.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("np="+encodeURIComponent(np)+"&up="+encodeURIComponent(up)+"&qp="+encodeURIComponent(qp));
    }else{
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tbp").html(xhr.responseText);
                $("#np").val("");
                $("#up").val("");
                $("#qp").val("");
                $("#bp").text("Ajouter");
            }
        }
        xhr.open("post","../php/produit.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("id="+encodeURIComponent(id)+"&nom="+encodeURIComponent(np)+"&unite="+encodeURIComponent(up)+"&qualite="+encodeURIComponent(qp)+"&m=m");
    } 
    });
    $(document).on("click","#sp",function(){
        xhr=ajaxing();
        let id = $(this).closest("td").prev().prev().prev().prev().prev().text();
        let c=confirm("Les informations sur le produit vont etre supprimer définitivement !");
        if(c==true){
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tbp").html(xhr.responseText);
            }
        }
        xhr.open("post","../php/produit.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("id="+encodeURIComponent(id)+"&s=s"); 
    }
    });
    $(document).on("click","#mp",function(){
        xhr=ajaxing();
        $("#bp").text("Modifier");
        id = $(this).closest("td").prev().prev().prev().prev().text();
        let nom= $(this).closest("td").prev().prev().prev().text();
        let unite=$(this).closest("td").prev().prev().text();
        let qualite=$(this).closest("td").prev().text();
        $("#np").val(nom);
        $("#up").val(unite);
        $("#qp").val(qualite);
        /* */
    });
    /////////////////////////////////////////////////////
    $(document).on("click","#b",function(){
        xhr=ajaxing();
        let id = $(this).closest("td").prev().prev().prev().prev().prev().text();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                donnee();
            }
        }
        xhr.open("post","../php/suppression.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("id="+encodeURIComponent(id)); 
    });
    //////////////////////////////////////////////////////
    $(document).on("change","#s",function(){
        xhr=ajaxing();
        let y = $("#s").val().slice(0,4);
        let m = $("#s").val().slice(5);
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tbh").html(xhr.responseText);
            }
        }
        xhr.open("post","../php/affichage-historique.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("m="+encodeURIComponent(m)+"&y="+encodeURIComponent(y)); 
    });
});