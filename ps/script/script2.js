$(function(){
    let id ;
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
    $(document).on("click","#a",function(){
        xhr=ajaxing();
        let libelle=$("#libelle").val();
        let date=$("#date").val();
        let entite=$("#entite").val();
        let volet=$("#volet").val();
        if($("#a").text()=="Ajouter"){
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tb").html(xhr.responseText);
                $("#libelle").val("");
                $("#date").val("");
                $("#entite").val("");
                $("#volet").val("");
            }
        }
        xhr.open("post","../php/commentaire.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("libelle="+encodeURIComponent(libelle)+"&date="+encodeURIComponent(date)+"&entite="+encodeURIComponent(entite)+"&volet="+encodeURIComponent(volet)+"&a=a");
    }else{
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tb").html(xhr.responseText);
                $("#libelle").val("");
                $("#date").val("");
                $("#entite").val("");
                $("#volet").val("");;
                $("#a").text("Ajouter");
            }
        }
        xhr.open("post","../php/commentaire.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("id="+encodeURIComponent(id)+"&libelle="+encodeURIComponent(libelle)+"&date="+encodeURIComponent(date)+"&entite="+encodeURIComponent(entite)+"&volet="+encodeURIComponent(volet)+"&m=m");
    } 
    });
    $(document).on("click","#s",function(){
        xhr=ajaxing();
        let id = $(this).closest("td").prev().prev().prev().prev().prev().prev().text();
        let c=confirm("Les informations sur le commentaire vont etre supprimer définitivement !");
        if(c==true){
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tb").html(xhr.responseText);
            }
        }
        xhr.open("post","../php/commentaire.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("id="+encodeURIComponent(id)+"&s=s"); 
    }
    });
    $(document).on("click","#m",function(){
        xhr=ajaxing();
        $("#a").text("Modifier");
        id = $(this).closest("td").prev().prev().prev().prev().prev().text();
        let libelle= $(this).closest("td").prev().prev().prev().prev().text();
        let date=$(this).closest("td").prev().prev().prev().text();
        let entite=$(this).closest("td").prev().prev().text();
        let volet=$(this).closest("td").prev().text();
        $("#libelle").val(libelle);
        $("#date").val(date);
        $("#entite").val(entite);
        $("#volet").val(volet);
        /* */
    });
});