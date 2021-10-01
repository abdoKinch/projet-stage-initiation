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
    $(document).on("click","#bb",function(){
        xhr=ajaxing();
        let bm=$("#bm").val();
        let ba=$("#ba").val();
        let da=$("#da").val();
        let p=$("#p").val();
        let e=$("#e").val();
        if($("#bb").text()=="Ajouter"){
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tbb").html(xhr.responseText);
                $("#bm").val("");
                $("#ba").val("");
                $("#da").val("");
                $("#p").val("");
                $("#e").val("");
            }
        }
        xhr.open("post","../php/budget.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("bm="+encodeURIComponent(bm)+"&ba="+encodeURIComponent(ba)+"&da="+encodeURIComponent(da)+"&p="+encodeURIComponent(p)+"&e="+encodeURIComponent(e)+"&a=a");
    }else{
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tbb").html(xhr.responseText);
                $("#bm").val("");
                $("#ba").val("");
                $("#da").val("");
                $("#p").val("");
                $("#e").val("");
                $("#bb").text("Ajouter");
            }
        }
        xhr.open("post","../php/budget.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("id="+encodeURIComponent(id)+"&bm="+encodeURIComponent(bm)+"&ba="+encodeURIComponent(ba)+"&da="+encodeURIComponent(da)+"&p="+encodeURIComponent(p)+"&e="+encodeURIComponent(e)+"&m=m");
    } 
    });
    $(document).on("click","#sb",function(){
        xhr=ajaxing();
        let id = $(this).closest("td").prev().prev().prev().prev().prev().prev().prev().text();
        let c=confirm("Les informations sur le budget vont etre supprimer définitivement !");
        if(c==true){
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                $("#tbb").html(xhr.responseText);
            }
        }
        xhr.open("post","../php/budget.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("id="+encodeURIComponent(id)+"&s=s"); 
    }
    });
    $(document).on("click","#mb",function(){
        xhr=ajaxing();
        $("#bb").text("Modifier");
        id = $(this).closest("td").prev().prev().prev().prev().prev().prev().text();
        let mois= $(this).closest("td").prev().prev().prev().prev().prev().text();
        let annee=$(this).closest("td").prev().prev().prev().prev().text();
        let date=$(this).closest("td").prev().prev().prev().text();
        let produit=$(this).closest("td").prev().prev().text();
        let entite=$(this).closest("td").prev().text();
        $("#bm").val(mois);
        $("#ba").val(annee);
        $("#da").val(date);
        $("#p").val(produit);
        $("#e").val(entite);
        /* */
    });
});