$(document).ready(function(){
    if(!$(location).attr("href").includes("dashboardaktivnost")){
        localStorage.removeItem("ime");
    }
    $("#filter").keyup(function(){
        
        // Retrieve the input field text and reset the count to zero
        var filter = $("#filter").val();
   
        // Loop through the comment list

        $(".trazi").each(function(){

            console.log($(this).text());
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {

                $(this).fadeOut();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                
            } 
        });
 
        // Update the count
       
    });
    
  $(".akch, .aktime").change(function(){
        var ucenici = $("input#ucenik:checked");
        var bibliotekari = $("input#bibliotekar:checked");
        var knjige = $("input#knjiga:checked");
        var transakcije = $("input#trans:checked");
        var periodod = $("input#periodod").val();
        var perioddo = $("input#perioddo").val();
        if($(".akch:checked").length > 0 && periodod == "" && perioddo == ""){
            if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0){
                var array1 = [];
                var array2 = [];
                var array3 = [];
                var array4 = [];
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });

                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });

                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });

                var a = $(array2).not($(array2).not(array1));

                var b = $(array4).not($(array4).not(array3));
                var c = $(b).not($(b).not(a));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0){
                var array1 = [];
                var array2 = [];
                var array3 = [];
                var array4 = [];
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });

                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });

                var a = $(array2).not($(array2).not(array1));

                var c= $(array3).not($(array3).not(a));
                
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0){
                var array1 = [];
                var array2 = [];
                var array3 = [];
                var array4 = [];
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });

                var c= $(array2).not($(array2).not(array1));
                
                console.log(c);
                
                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
                  c.show();
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0){
                var array1 = [];
                var array2 = [];
                var array3 = [];
                var array4 = [];
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });

                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array4.push(parent);
                            
                        }
                    });
                });

                var c = $(array2).not($(array2).not(array1));

                var c= $(array3).not($(array3).not(c));
                
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0){
                var array1 = [];
                var array2 = [];
                var array3 = [];
                var array4 = [];
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){

                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array4.push(parent);
                        }
                    });
                });

                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });

                var c = $(array4).not($(array4).not(array1));

                var c= $(array3).not($(array3).not(c));
                
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0){
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array4.push(parent);
                            
                        }
                    });
                });

                var c = $(array3).not($(array3).not(array2));
                var c = $(array4).not($(array4).not(c));
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0){
                var array1 = [];
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var c = $(array3).not($(array3).not(array1));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0){
                var array1 = [];
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            
                            array1.push(parent);
                        }
                    });
                });

                var array4 = [];
               
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    
                    transakcije.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            
                            array4.push(parent);
                        }
                    });
                });

                var c= $(array4).not($(array4).not(array1));
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0){
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            
                            array3.push(parent);
                            
                        }
                    });
                });
                var c = $(array3).not($(array3).not(array2));
             
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0){

                console.log("OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO");
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                           
                            array2.push(parent);
                        }
                    });
                });

                var array4 = [];
                
                $("span#trans_ime").each(function(){
                    $this = $(this);
                  
                    transakcije.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            
                            array4.push(parent);
                        }
                    });
                });

                var c = $(array4).not($(array4).not(array2));
                
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length == 0){
                var array1 = [];
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            
                            array1.push(parent);
                        }
                    });
                });

                for (let i = 0; i < $(".trazi").length; i++)
                {   let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array1.length; j++)
        
                        if (a[i] == array1[j])
                            break;
           
                    if (j == array1.length)
                        a[i].style.display = "none";  
                }
                array1.forEach(element => {
                    element.style.display = "flex";
                });
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0){
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                           
                            array2.push(parent);
                        }
                    });
                });

                for (let i = 0; i < $(".trazi").length; i++)
                {   let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array2.length; j++)
        
                        if (a[i] == array2[j])
                            break;
           
                    if (j == array2.length)
                        a[i].style.display = "none";  
                }
                array2.forEach(element => {
                    element.style.display = "flex";
                });
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0){
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array3.length; j++)
        
                        if (a[i] == array3[j])
                            break;
           
                    if (j == array3.length)
                        a[i].style.display = "none";  
                }
                array3.forEach(element => {
                    element.style.display = "flex";
                });
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0){
                var array4 = [];
                console.log("OOOOOOO");
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    console.log($this.text().trim());
                    transakcije.each(function(){
                        console.log($(this).val());
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            
                            array4.push(parent);
                        }
                    });
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array4.length; j++)
        
                        if (a[i] == array4[j])
                            break;
           
                    if (j == array4.length)
                        a[i].style.display = "none";  
                }
                array4.forEach(element => {
                    element.style.display = "flex";
                });
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0){
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            
                            array3.push(parent);
                            
                        }
                    });
                });

                var array4 = [];
                console.log("OOOOOOO");
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    console.log($this.text().trim());
                    transakcije.each(function(){
                        console.log($(this).val());
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            
                            array4.push(parent);
                        }
                    });
                });

                var c = $(array4).not($(array4).not(array3));
                
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }

        }else if($(".akch:checked").length == 0 && (periodod != "" || perioddo != "")){
            if(periodod != "" && perioddo != ""){
                var array = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }else if(periodod != "" && perioddo == ""){
               /*  $("#perioddo").attr("min",izdavanjeod); */
                var array = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }else if(periodod == "" && perioddo != ""){
                
               /*  $("#periodod").attr("max",izdavanjedo); */
                var array = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
                    
                    if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }
        }else if($(".akch:checked").length == 0 && periodod == "" && perioddo == ""){
            $(".trazi").show();
        }else if($(".akch:checked").length > 0  && (periodod != "" || perioddo != "")){
            if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var b = $(array4).not($(array4).not(array3));

                var t = $(b).not($(b).not(a));

                var c = $(t).not($(t).not(array5));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var b = $(array4).not($(array4).not(array3));

                var t = $(b).not($(b).not(a));

                var c = $(t).not($(t).not(array5));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var b = $(array5).not($(array5).not(array3));

                var c = $(b).not($(b).not(a));

                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var b = $(array5).not($(array5).not(array4));

                var c = $(b).not($(b).not(a));

                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
               
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array1));

                var b = $(array5).not($(array5).not(array4));

                var c = $(b).not($(b).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array2));

                var b = $(array5).not($(array5).not(array4));

                var c = $(b).not($(b).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                  
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
               
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array1));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array4).not($(array4).not(array1));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array2));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }   
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
               
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array4).not($(array4).not(array2));

                var c = $(array5).not($(array5).not(a));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array4).not($(array4).not(array3));

                var c = $(array5).not($(array5).not(a));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });

                var c = $(array5).not($(array5).not(array1));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }

            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){

                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });

                var c = $(array5).not($(array5).not(array2));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){

                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });

                var c = $(array5).not($(array5).not(array3));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }  
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    
                    if(datum_izdavanja >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var c = $(array5).not($(array5).not(array4));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }  
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var b = $(array4).not($(array4).not(array3));

                var t = $(b).not($(b).not(a));

                var c = $(t).not($(t).not(array5));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var b = $(array5).not($(array5).not(array3));

                var c = $(b).not($(b).not(a));

                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var b = $(array5).not($(array5).not(array4));

                var c = $(b).not($(b).not(a));

                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
               
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array1));

                var b = $(array5).not($(array5).not(array4));

                var c = $(b).not($(b).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array2));

                var b = $(array5).not($(array5).not(array4));

                var c = $(b).not($(b).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
               
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array1));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array4).not($(array4).not(array1));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array2));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }   
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
               
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array4).not($(array4).not(array2));

                var c = $(array5).not($(array5).not(a));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array4).not($(array4).not(array3));

                var c = $(array5).not($(array5).not(a));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });

                var c = $(array5).not($(array5).not(array1));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }

            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){

                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });

                var c = $(array5).not($(array5).not(array2));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){

                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
                    if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });

                var c = $(array5).not($(array5).not(array3));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }  
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(perioddo);
		                if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var c = $(array5).not($(array5).not(array4));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }  
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var b = $(array5).not($(array5).not(array3));

                var c = $(b).not($(b).not(a));

                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var b = $(array5).not($(array5).not(array4));

                var c = $(b).not($(b).not(a));

                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
               
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array1));

                var b = $(array5).not($(array5).not(array4));

                var c = $(b).not($(b).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array2));

                var b = $(array5).not($(array5).not(array4));

                var c = $(b).not($(b).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array2).not($(array2).not(array1));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
               
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array1));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });
                
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array4).not($(array4).not(array1));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array3).not($(array3).not(array2));

                var c = $(array5).not($(array5).not(a));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }   
            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                
                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
               
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array4).not($(array4).not(array2));

                var c = $(array5).not($(array5).not(a));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                
                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var a = $(array4).not($(array4).not(array3));

                var c = $(array5).not($(array5).not(a));
                console.log(c);
                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                var array1 = [];
                
                $("a#ucenik_ime").each(function(){
                    $this = $(this);
                    ucenici.each(function(){
                        
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array1.push(parent);
                        }
                    });
                });

                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });

                var c = $(array5).not($(array5).not(array1));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }

            }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){

                var array2 = [];
                $("a#bibliotekar_ime").each(function(){
                    $this = $(this);
                    bibliotekari.each(function(){

                        console.log("BIBLI");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array2.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });

                var c = $(array5).not($(array5).not(array2));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){

                var array3 = [];
                $("span#knjiga_ime").each(function(){
                    $this = $(this);
                    knjige.each(function(){
                        console.log("knjiga");
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent);
                            array3.push(parent);
                            
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });

                var c = $(array5).not($(array5).not(array3));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }  
            }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                var array4 = [];
                $("span#trans_ime").each(function(){
                    $this = $(this);
                    transakcije.each(function(){
                       
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var parent = parents[3];
                            console.log(parent)
                            array4.push(parent);
                        }
                    });
                });
                var array5 = [];
                $("span#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(periodod);
                    var krajnji = new Date(perioddo);
		
                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[3];
                        array5.push(parent);

                    }
                });
                var c = $(array5).not($(array5).not(array4));

                c.show();

                for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }  
            }
        }
  });
$("a[data-book-name]").click(function(){
    localStorage.setItem("ime",$(this).data("bookName"));
})

  document.getElementById("resetallfilters").addEventListener("click",()=>{
            document.querySelectorAll("input").forEach(e=>{
                e.value = e.defaultValue;
            });
            document.querySelectorAll("input:checked").forEach(e=>{
                e.click();
            });

            var ucenici = $("input#ucenik:checked");
            var bibliotekari = $("input#bibliotekar:checked");
            var knjige = $("input#knjiga:checked");
            var transakcije = $("input#trans:checked");
            var periodod = $("input#periodod").val();
            var perioddo = $("input#perioddo").val();
            if($(".akch:checked").length > 0 && periodod == "" && perioddo == ""){
                if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0){
                    var array1 = [];
                    var array2 = [];
                    var array3 = [];
                    var array4 = [];
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
    
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
    
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
    
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array4).not($(array4).not(array3));
                    var c = $(b).not($(b).not(a));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0){
                    var array1 = [];
                    var array2 = [];
                    var array3 = [];
                    var array4 = [];
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
    
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
    
                    var a = $(array2).not($(array2).not(array1));
    
                    var c= $(array3).not($(array3).not(a));
                    
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0){
                    var array1 = [];
                    var array2 = [];
                    var array3 = [];
                    var array4 = [];
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
    
                    var c= $(array2).not($(array2).not(array1));
                    
                    console.log(c);
                    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                      c.show();
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0){
                    var array1 = [];
                    var array2 = [];
                    var array3 = [];
                    var array4 = [];
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
    
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array4.push(parent);
                                
                            }
                        });
                    });
    
                    var c = $(array2).not($(array2).not(array1));
    
                    var c= $(array3).not($(array3).not(c));
                    
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0){
                    var array1 = [];
                    var array2 = [];
                    var array3 = [];
                    var array4 = [];
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
    
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array4.push(parent);
                            }
                        });
                    });
    
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
    
                    var c = $(array4).not($(array4).not(array1));
    
                    var c= $(array3).not($(array3).not(c));
                    
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0){
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array4.push(parent);
                                
                            }
                        });
                    });
    
                    var c = $(array3).not($(array3).not(array2));
                    var c = $(array4).not($(array4).not(c));
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0){
                    var array1 = [];
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var c = $(array3).not($(array3).not(array1));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0){
                    var array1 = [];
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                
                                array1.push(parent);
                            }
                        });
                    });
    
                    var array4 = [];
                   
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        
                        transakcije.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                
                                array4.push(parent);
                            }
                        });
                    });
    
                    var c= $(array4).not($(array4).not(array1));
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0){
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var c = $(array3).not($(array3).not(array2));
                 
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0){
    
                    console.log("OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO");
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                               
                                array2.push(parent);
                            }
                        });
                    });
    
                    var array4 = [];
                    
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                      
                        transakcije.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                
                                array4.push(parent);
                            }
                        });
                    });
    
                    var c = $(array4).not($(array4).not(array2));
                    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length == 0){
                    var array1 = [];
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                
                                array1.push(parent);
                            }
                        });
                    });
    
                    for (let i = 0; i < $(".trazi").length; i++)
                    {   let a = $(".trazi");
                        let j;
                           
                        for (j = 0; j < array1.length; j++)
            
                            if (a[i] == array1[j])
                                break;
               
                        if (j == array1.length)
                            a[i].style.display = "none";  
                    }
                    array1.forEach(element => {
                        element.style.display = "flex";
                    });
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0){
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                               
                                array2.push(parent);
                            }
                        });
                    });
    
                    for (let i = 0; i < $(".trazi").length; i++)
                    {   let a = $(".trazi");
                        let j;
                           
                        for (j = 0; j < array2.length; j++)
            
                            if (a[i] == array2[j])
                                break;
               
                        if (j == array2.length)
                            a[i].style.display = "none";  
                    }
                    array2.forEach(element => {
                        element.style.display = "flex";
                    });
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0){
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    for (let i = 0; i < $(".trazi").length; i++)
                    {   let a = $(".trazi");
                        let j;
                           
                        for (j = 0; j < array3.length; j++)
            
                            if (a[i] == array3[j])
                                break;
               
                        if (j == array3.length)
                            a[i].style.display = "none";  
                    }
                    array3.forEach(element => {
                        element.style.display = "flex";
                    });
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0){
                    var array4 = [];
                    console.log("OOOOOOO");
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        console.log($this.text().trim());
                        transakcije.each(function(){
                            console.log($(this).val());
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                
                                array4.push(parent);
                            }
                        });
                    });
                    for (let i = 0; i < $(".trazi").length; i++)
                    {   let a = $(".trazi");
                        let j;
                           
                        for (j = 0; j < array4.length; j++)
            
                            if (a[i] == array4[j])
                                break;
               
                        if (j == array4.length)
                            a[i].style.display = "none";  
                    }
                    array4.forEach(element => {
                        element.style.display = "flex";
                    });
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0){
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                
                                array3.push(parent);
                                
                            }
                        });
                    });
    
                    var array4 = [];
                    console.log("OOOOOOO");
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        console.log($this.text().trim());
                        transakcije.each(function(){
                            console.log($(this).val());
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                
                                array4.push(parent);
                            }
                        });
                    });
    
                    var c = $(array4).not($(array4).not(array3));
                    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }
    
            }else if($(".akch:checked").length == 0 && (periodod != "" || perioddo != "")){
                if(periodod != "" && perioddo != ""){
                    var array = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
    
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array.push(parent);
    
                        }
                    });
                    for (let i = 0; i < $(".trazi").length; i++)
                    {   
                        let a = $(".trazi");
                        let j;
                           
                        for (j = 0; j < array.length; j++)
            
                            if (a[i] == array[j])
                                break;
               
                        if (j == array.length)
                            a[i].style.display = "none";
                    }
                    array.forEach(element => {
                        element.style.display = "";
                    });
                }else if(periodod != "" && perioddo == ""){
                   /*  $("#perioddo").attr("min",izdavanjeod); */
                    var array = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array.push(parent);
    
                        }
                    });
                    for (let i = 0; i < $(".trazi").length; i++)
                    {   
                        let a = $(".trazi");
                        let j;
                           
                        for (j = 0; j < array.length; j++)
            
                            if (a[i] == array[j])
                                break;
               
                        if (j == array.length)
                            a[i].style.display = "none";
                    }
                    array.forEach(element => {
                        element.style.display = "";
                    });
                }else if(periodod == "" && perioddo != ""){
                    
                   /*  $("#periodod").attr("max",izdavanjedo); */
                    var array = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                        
                        if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array.push(parent);
    
                        }
                    });
                    for (let i = 0; i < $(".trazi").length; i++)
                    {   
                        let a = $(".trazi");
                        let j;
                           
                        for (j = 0; j < array.length; j++)
            
                            if (a[i] == array[j])
                                break;
               
                        if (j == array.length)
                            a[i].style.display = "none";
                    }
                    array.forEach(element => {
                        element.style.display = "";
                    });
                }
            }else if($(".akch:checked").length == 0 && periodod == "" && perioddo == ""){
                $(".trazi").show();
            }else if($(".akch:checked").length > 0  && (periodod != "" || perioddo != "")){
                if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
    
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array4).not($(array4).not(array3));
    
                    var t = $(b).not($(b).not(a));
    
                    var c = $(t).not($(t).not(array5));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array4).not($(array4).not(array3));
    
                    var t = $(b).not($(b).not(a));
    
                    var c = $(t).not($(t).not(array5));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array5).not($(array5).not(array3));
    
                    var c = $(b).not($(b).not(a));
    
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array5).not($(array5).not(array4));
    
                    var c = $(b).not($(b).not(a));
    
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                   
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array1));
    
                    var b = $(array5).not($(array5).not(array4));
    
                    var c = $(b).not($(b).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array2));
    
                    var b = $(array5).not($(array5).not(array4));
    
                    var c = $(b).not($(b).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                      
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                   
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array1));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array4).not($(array4).not(array1));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array2));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }   
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                   
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array4).not($(array4).not(array2));
    
                    var c = $(array5).not($(array5).not(a));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array4).not($(array4).not(array3));
    
                    var c = $(array5).not($(array5).not(a));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
    
                    var c = $(array5).not($(array5).not(array1));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
    
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
    
                    var c = $(array5).not($(array5).not(array2));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo == ""){
    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni ){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
    
                    var c = $(array5).not($(array5).not(array3));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }  
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo == ""){
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        
                        if(datum_izdavanja >= pocetni){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var c = $(array5).not($(array5).not(array4));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }  
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array4).not($(array4).not(array3));
    
                    var t = $(b).not($(b).not(a));
    
                    var c = $(t).not($(t).not(array5));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array5).not($(array5).not(array3));
    
                    var c = $(b).not($(b).not(a));
    
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array5).not($(array5).not(array4));
    
                    var c = $(b).not($(b).not(a));
    
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                   
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array1));
    
                    var b = $(array5).not($(array5).not(array4));
    
                    var c = $(b).not($(b).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array2));
    
                    var b = $(array5).not($(array5).not(array4));
    
                    var c = $(b).not($(b).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                   
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array1));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array4).not($(array4).not(array1));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array2));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }   
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                   
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array4).not($(array4).not(array2));
    
                    var c = $(array5).not($(array5).not(a));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array4).not($(array4).not(array3));
    
                    var c = $(array5).not($(array5).not(a));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
    
                    var c = $(array5).not($(array5).not(array1));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
    
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
    
                    var c = $(array5).not($(array5).not(array2));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod == "" && perioddo != ""){
    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                        if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
    
                    var c = $(array5).not($(array5).not(array3));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }  
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod == "" && perioddo != ""){
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var krajnji = new Date(perioddo);
                            if(datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var c = $(array5).not($(array5).not(array4));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }  
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array5).not($(array5).not(array3));
    
                    var c = $(b).not($(b).not(a));
    
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var b = $(array5).not($(array5).not(array4));
    
                    var c = $(b).not($(b).not(a));
    
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                   
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array1));
    
                    var b = $(array5).not($(array5).not(array4));
    
                    var c = $(b).not($(b).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array2));
    
                    var b = $(array5).not($(array5).not(array4));
    
                    var c = $(b).not($(b).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array2).not($(array2).not(array1));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                   
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array1));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
                    
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array4).not($(array4).not(array1));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array3).not($(array3).not(array2));
    
                    var c = $(array5).not($(array5).not(a));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }   
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                   
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array4).not($(array4).not(array2));
    
                    var c = $(array5).not($(array5).not(a));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var a = $(array4).not($(array4).not(array3));
    
                    var c = $(array5).not($(array5).not(a));
                    console.log(c);
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length > 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
                    var array1 = [];
                    
                    $("a#ucenik_ime").each(function(){
                        $this = $(this);
                        ucenici.each(function(){
                            
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array1.push(parent);
                            }
                        });
                    });
    
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
    
                    var c = $(array5).not($(array5).not(array1));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
    
                }else if(ucenici.length == 0 && bibliotekari.length > 0 && knjige.length == 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
    
                    var array2 = [];
                    $("a#bibliotekar_ime").each(function(){
                        $this = $(this);
                        bibliotekari.each(function(){
    
                            console.log("BIBLI");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array2.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
    
                    var c = $(array5).not($(array5).not(array2));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length > 0 && transakcije.length == 0 && periodod != "" && perioddo != ""){
    
                    var array3 = [];
                    $("span#knjiga_ime").each(function(){
                        $this = $(this);
                        knjige.each(function(){
                            console.log("knjiga");
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent);
                                array3.push(parent);
                                
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
    
                    var c = $(array5).not($(array5).not(array3));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }  
                }else if(ucenici.length == 0 && bibliotekari.length == 0 && knjige.length == 0 && transakcije.length > 0 && periodod != "" && perioddo != ""){
                    var array4 = [];
                    $("span#trans_ime").each(function(){
                        $this = $(this);
                        transakcije.each(function(){
                           
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[3];
                                console.log(parent)
                                array4.push(parent);
                            }
                        });
                    });
                    var array5 = [];
                    $("span#datum_izdavanja").each(function(){
                        
                        var datum_izdavanja = new Date($(this).text().trim());
                        var pocetni = new Date(periodod);
                        var krajnji = new Date(perioddo);
            
                        if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                            var parents = $(this).parents();
                            var parent = parents[3];
                            array5.push(parent);
    
                        }
                    });
                    var c = $(array5).not($(array5).not(array4));
    
                    c.show();
    
                    for (let i = 0; i < $(".trazi").length; i++)
                      {   let a = $(".trazi");
                          let j;
                             
                          for (j = 0; j < c.length; j++)
              
                              if (a[i] == c[j])
                                  break;
                 
                          if (j == c.length)
                              a[i].style.display = "none";  
                      }  
                }
            }
  });
  
    $("#searchAutori").keyup(function(){
        
        // Retrieve the input field text and reset the count to zero
        var filter = $("#searchAutori").val();
   
        // Loop through the comment list

        $(".a_trazi").each(function(){

            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {

                $(this).fadeOut();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                
            } 
        });
 
        // Update the count
       
    });

    $(".a_name").click(function(){
        
        // Retrieve the input field text and reset the count to zero
        var filter = $($this).val();
   
        // Loop through the comment list

        $(".a_trazi").each(function(){

            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {

                $(this).fadeOut();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                
            } 
        });
 
        // Update the count
       
    });

    $(".filter_name").change(function () {

        if($("input#autor:checked").length > 0 && $("input#kategorija:checked").length > 0){
            var array = [];
            $(".autor_ime").each(function(){
                $this = $(this);
                $("input#autor:checked").each(function(){
                    if($this.text().trim() == $(this).val()){
                       var parents = $this.parents();
                       var tr = parents[1];
                        $this.text().trim();
                        array.push(tr);
                    }
                });
               
            });

                var array2 = [];
             $(".kategorija_ime").each(function(){
                    $this = $(this);
                $("input#kategorija:checked").each(function(){
                    if($this.text().trim() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[1];
                       
                        array2.push(tr);
                    }
                });
             });
             
             var c = $(array2).not($(array2).not(array));
           
             c.show();
             for (let i = 0; i < $(".trazi").length; i++)
        {   let a = $(".trazi");
            let j;
               
            for (j = 0; j < c.length; j++)

                if (a[i] == c[j])
                    break;
   
            if (j == c.length)
                a[i].style.display = "none";
        }
        }else if($("input#autor:checked").length > 0 && $("input#kategorija:checked").length == 0){
            console.log("ooooooo");
            var array = [];
            $(".autor_ime").each(function(){
                $this = $(this);
                $("input#autor:checked").each(function(){
                    if($this.text() == $(this).val()){
                       var parents = $this.parents();
                       var tr = parents[1];
                    
                        array.push(tr);
                    }
                });
               
            });
            console.log(array);
            for (let i = 0; i < $(".trazi").length; i++)
        {   
            let a = $(".trazi");
            let j;
               
            for (j = 0; j < array.length; j++)

                if (a[i] == array[j])
                    break;
   
            if (j == array.length)
                a[i].style.display = "none";
        }
            array.forEach(element => {
                element.style.display = "";
            });
        }else if($("input#autor:checked").length == 0 && $("input#kategorija:checked").length > 0){
            var array = [];
             $(".kategorija_ime").each(function(){
                    $this = $(this);
                $("input#kategorija:checked").each(function(){
                    if($this.text() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[1];
                       
                        array.push(tr);
                    }
                });
             });

             for (let i = 0; i < $(".trazi").length; i++)
        {   
            let a = $(".trazi");
            let j;
               
            for (j = 0; j < array.length; j++)

                if (a[i] == array[j])
                    break;
   
            if (j == array.length)
                a[i].style.display = "none";
        }
        array.forEach(element => {
            element.style.display = "";
        });
        }else if($("input#autor:checked").length == 0 && $("input#kategorija:checked").length == 0){
            $(".trazi").each(function(){
                $(this).show();
            });
        }
        
    });

    $("#searchKategorije").keyup(function(){
        
        // Retrieve the input field text and reset the count to zero
        var filter = $("#searchKategorije").val();
   
        // Loop through the comment list

        $(".k_trazi").each(function(){

            console.log($(this).text());
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {

                $(this).fadeOut();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                
            } 
        });
 
        // Update the count
       
    });

    $("#searchUcenika").keyup(function(){
        
        // Retrieve the input field text and reset the count to zero
        var filter = $("#searchUcenika").val();
   
        // Loop through the comment list

        $(".u_trazi").each(function(){

            console.log($(this).text());
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {

                $(this).fadeOut();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                
            } 
        });
 
        // Update the count
       
    });
    $("#searchStatus").keyup(function(){
        
        // Retrieve the input field text and reset the count to zero
        var filter = $("#searchStatus").val();
   
        // Loop through the comment list

        $(".s_trazi").each(function(){

            console.log($(this).text());
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {

                $(this).fadeOut();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                
            } 
        });
 
        // Update the count
       
    });
    searchTransakcije

    $("#searchTransakcije").keyup(function(){
        
        // Retrieve the input field text and reset the count to zero
        var filter = $("#searchTransakcije").val();
   
        // Loop through the comment list

        $(".t_trazi").each(function(){

            console.log($(this).text());
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {

                $(this).fadeOut();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                
            } 
        });
 
        // Update the count
       
    });
    $("#searchKnjigu").keyup(function(){
        
        // Retrieve the input field text and reset the count to zero
        var filter = $("#searchKnjigu").val();
   
        // Loop through the comment list

        $(".k_trazi").each(function(){

            console.log($(this).text());
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {

                $(this).fadeOut();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                
            } 
        });
 
        // Update the count
       
    });
    $("#searchBibliotekara").keyup(function(){
        
        // Retrieve the input field text and reset the count to zero
        var filter = $("#searchBibliotekara").val();
   
        // Loop through the comment list

        $(".b_trazi").each(function(){

            console.log($(this).text());
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {

                $(this).fadeOut();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                
            } 
        });
 
        // Update the count
       
    });
    
    $(".ch , .periodi").change(function(){
        let izdavanjeod = $("#periodod").val();
        let izdavanjedo = $("#perioddo").val();
        let istekod = $("#istekod").val();
        let istekdo = $("#istekdo").val();
        var zaucenika = $("input#poucenik:checked");
                var status = $("input#status:checked");
        console.log($("input#status:checked"));
        if((izdavanjeod != "" || izdavanjedo != "") && istekdo == "" && istekdo == "" && $(".ch:checked").length == 0){
            
            if(izdavanjeod != "" && izdavanjedo != ""){
                var array = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }else if(izdavanjeod != "" && izdavanjedo == ""){
               /*  $("#perioddo").attr("min",izdavanjeod); */
                var array = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    
                    if(datum_izdavanja >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }else if(izdavanjeod == "" && izdavanjedo != ""){
                
               /*  $("#periodod").attr("max",izdavanjedo); */
                var array = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(izdavanjedo);
                    
                    if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }

        }else if((izdavanjeod == "" && izdavanjedo == "") && istekod == "" && istekdo == "" && $(".ch:checked").length == 0){
            $(".trazi").each(function(){
                $(this).show();
            })
        }
        else if((izdavanjeod == "" && izdavanjedo == "") && $(".ch:checked").length > 0 && istekod == "" && istekdo == ""){
               console.log("OOOO");
                var zaucenika = $("input#poucenik:checked");
                var status = $("input#status:checked");
                if(zaucenika.length > 0 && status.length == 0){
                    var array = [];
                    $("td#ucenik_ime").each(function(){
                        $this = $(this);
                        zaucenika.each(function(){
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[0];
                                array.push(parent);
                            }
                        })
                    });

                    for (let i = 0; i < $(".trazi").length; i++)
        {   
            let a = $(".trazi");
            let j;
               
            for (j = 0; j < array.length; j++)

                if (a[i] == array[j])
                    break;
   
            if (j == array.length)
                a[i].style.display = "none";
        }
            array.forEach(element => {
                element.style.display = "";
            });
                }else if(zaucenika.length == 0 && status.length > 0){
                    console.log("OOOOOOOOOOOOOOOOO");
                    var array = [];
                    $("td#status_ime").each(function(){
                        $this = $(this);
                        status.each(function(){
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[0];
                                array.push(parent);
                            }
                        })
                    });

                    for (let i = 0; i < $(".trazi").length; i++)
        {   
            let a = $(".trazi");
            let j;
               
            for (j = 0; j < array.length; j++)

                if (a[i] == array[j])
                    break;
   
            if (j == array.length)
                a[i].style.display = "none";
        }
            array.forEach(element => {
                element.style.display = "";
            });
        }else if(zaucenika.length > 0 && status.length > 0){
                    console.log("Usli smo");
                    var array = [];
                    $("td#ucenik_ime").each(function(){
                        $this = $(this);
                        zaucenika.each(function(){
                            if($this.text().trim() == $(this).val()){
                               var parents = $this.parents();
                               var tr = parents[0];
                                
                                array.push(tr);
                            }
                        });
                       
                    });
        
                        var array2 = [];
                     $("td#status_ime").each(function(){
                            $this = $(this);
                            status.each(function(){
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var tr = parents[0];
                               
                                array2.push(tr);
                            }
                        });
                     });
                     
                     var c = $(array2).not($(array2).not(array));
                   
                     c.show();
                     for (let i = 0; i < $(".trazi").length; i++)
                {   let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < c.length; j++)
        
                        if (a[i] == c[j])
                            break;
           
                    if (j == c.length)
                        a[i].style.display = "none";  
                }
                }
        }else if ((izdavanjeod == "" || izdavanjedo == "") && $(".ch:checked").length == 0 && (istekod != "" || istekdo != "")){
            if(istekod != "" && istekdo != ""){
                var array = [];
                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    var krajnji = new Date(istekdo);

                    if(datum_isteka >= pocetni && datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }else if(istekod != "" && istekdo == ""){
               /*  $("#perioddo").attr("min",izdavanjeod); */
               console.log("MMMMM");
                var array = [];
                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    
                    if(datum_isteka >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        array.push(parent);

                    }
                });

                console.log(array + "OVO JE ARRAY");
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }else if(istekod == "" && istekdo != ""){
                
               /*  $("#periodod").attr("max",izdavanjedo); */
                var array = [];
                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    var krajnji = new Date(istekdo);
                    
                    if(datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }
        }else if((izdavanjeod != "" || izdavanjedo != "") && $(".ch:checked").length > 0 && istekod == "" && istekdo == ""){
            let izdavanjeod = $("#periodod").val();
            let izdavanjedo = $("#perioddo").val();
            var zaucenika = $("input#poucenik:checked");
            var status = $("input#status:checked");

            if(izdavanjeod != "" && izdavanjedo != "" && zaucenika.length > 0 && status.length > 0){
                console.log("ODJE SAM");
                var zadatum = [];
                var zaucenikime = [];
                var zastatus = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });
    
                 $("td#status_ime").each(function(){
                        $this = $(this);
                        status.each(function(){
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var tr = parents[0];
                           
                            zastatus.push(tr);
                        }
                    });
                 });
                 var c = $(zadatum).not($(zadatum).not(zaucenikime));
                 var c = $(c).not($(c).not(zastatus));  
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod != "" && izdavanjedo != "" && zaucenika.length > 0 && status.length == 0){
                var zadatum = [];
                var zaucenikime = [];
          
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });

                var c = $(zadatum).not($(zadatum).not(zaucenikime));
                
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
               
            }else if(izdavanjeod != "" && izdavanjedo != "" && zaucenika.length == 0 && status.length > 0){
                var zadatum = [];
                var zastatus = [];
          
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#status_ime").each(function(){
                    $this = $(this);
                    status.each(function(){
                    if($this.text().trim() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[0];
                       
                        zastatus.push(tr);
                    }
                });
             });

                var c = $(zadatum).not($(zadatum).not(zastatus));
                
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
               
            }else if(izdavanjeod != "" && izdavanjedo == "" && zaucenika.length > 0 && status.length > 0){
                var zadatum = [];
                var zaucenikime = [];
                var zastatus = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });
    
                 $("td#status_ime").each(function(){
                        $this = $(this);
                        status.each(function(){
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var tr = parents[0];
                           
                            zastatus.push(tr);
                        }
                    });
                 });
                 var c = $(zadatum).not($(zadatum).not(zaucenikime));
                 var c = $(c).not($(c).not(zastatus));  
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod == "" && izdavanjedo != "" && zaucenika.length > 0 && status.length > 0){
                var zadatum = [];
                var zaucenikime = [];
                var zastatus = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);
                    if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });
    
                 $("td#stats_ime").each(function(){
                        $this = $(this);
                        status.each(function(){
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var tr = parents[0];
                           
                            zastatus.push(tr);
                        }
                    });
                 });
                 var c = $(zadatum).not($(zadatum).not(zaucenikime));
                 var c = $(c).not($(c).not(zastatus));  
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod != "" && izdavanjedo == "" && zaucenika.length > 0 && status.length == 0){
               var zadatum = [];
               var zaucenikime = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });

                var c = $(zadatum).not($(zadatum).not(zaucenikime));
                
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod == "" && izdavanjedo != "" && zaucenika.length == 0 && status.length > 0){
                var zadatum = [];
                var zastatus = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var krajnji = new Date(izdavanjedo);
                     
                     if(datum_izdavanja <= krajnji ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#status_ime").each(function(){
                    $this = $(this);
                    status.each(function(){
                    if($this.text().trim() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[0];
                       
                        zastatus.push(tr);
                    }
                });
             });
 
                 var c = $(zadatum).not($(zadatum).not(zastatus));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }else if(izdavanjeod != "" && izdavanjedo == "" && zaucenika.length == 0 && status.length > 0){
                var zadatum = [];
                var zastatus = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var pocetni = new Date(izdavanjeod);
                     
                     if(datum_izdavanja >= pocetni ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#status_ime").each(function(){
                    $this = $(this);
                    status.each(function(){
                    if($this.text().trim() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[0];
                       
                        zastatus.push(tr);
                    }
                });
             });
 
                 var c = $(zadatum).not($(zadatum).not(zastatus));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }else if(izdavanjeod == "" && izdavanjedo != "" && zaucenika.length > 0 && status.length == 0){
                var zadatum = [];
                var zaucenikime = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var krajnji = new Date(izdavanjedo);
                     
                     if(datum_izdavanja <= krajnji ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#ucenik_ime").each(function(){
                    $this = $(this);
                zaucenika.each(function(){
                    if($this.text().trim() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[0];
                       
                        zaucenikime.push(tr);
                    }
                });
             });
 
                 var c = $(zadatum).not($(zadatum).not(zaucenikime));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }else if(izdavanjeod == "" && izdavanjedo != "" && zaucenika.length == 0 && status.length  > 0){
                var zadatum = [];
                var zastatus = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var krajnji = new Date(izdavanjeodo);
                     
                     if(datum_izdavanja >= pocetni ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#status_ime").each(function(){
                    $this = $(this);
                    status.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zastatus.push(tr);
                        }
                    });
                   
                });
 
                 var c = $(zadatum).not($(zadatum).not(zastatus));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }

        }else if ((izdavanjeod != "" || izdavanjedo != "") && $(".ch:checked").length == 0 && (istekod != "" || istekdo != "")){
            let izdavanjeod = $("#periodod").val();
            let izdavanjedo = $("#perioddo").val();
            let istekod = $("#istekod").val();
            let istekdo = $("#istekdo").val();
            if(izdavanjeod != "" && izdavanjedo != "" && istekod != "" && istekdo != ""){
                
                var zadatum = [];
                var zaistek= [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    var krajnji = new Date(istekdo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                });
                
                 var c = $(zadatum).not($(zadatum).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod != "" && izdavanjedo != "" && istekod != "" && istekdo == ""){
                var zadatum = [];
                var zaistek = [];
          
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    
                    if(datum_isteka >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });

                var c = $(zadatum).not($(zadatum).not(zaistek));
                
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
               
            }else if(izdavanjeod != "" && izdavanjedo != "" && istekod == "" && istekdo != ""){
                var zadatum = [];
                var zaistek = [];
          
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                    
                    var krajnji = new Date(istekdo);

                    if(datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });

                var c = $(zadatum).not($(zadatum).not(zaistek));
                
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
               
            }else if(izdavanjeod != "" && izdavanjedo == "" && istekod != "" && istekdo != ""){
                var zadatum = [];
                var zaistek = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });
                $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    var krajnji = new Date(istekdo);

                    if(datum_isteka >= pocetni && datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });
                 var c = $(zadatum).not($(zadatum).not(zaistek));
                  
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod == "" && izdavanjedo != "" && istekod != "" && istekdo != ""){
                var zadatum = [];
                var zaistek = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    
                    var krajnji = new Date(izdavanjedo);
                    if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });
                $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    var krajnji = new Date(istekdo);

                    if(datum_isteka >= pocetni && datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });
                 var c = $(zadatum).not($(zadatum).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod != "" && izdavanjedo == "" && istekod != "" && istekdo == ""){
               var zadatum = [];
               var zaistek = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    
                    if(datum_isteka >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });

                var c = $(zadatum).not($(zadatum).not(zaistek));
                
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod == "" && izdavanjedo != "" && istekod == "" && istekdo != ""){
                var zadatum = [];
                var zaistek = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var krajnji = new Date(izdavanjedo);
                     
                     if(datum_izdavanja <= krajnji ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                   
                    var krajnji = new Date(istekdo);

                    if( datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });

                var c = $(zadatum).not($(zadatum).not(zaistek));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }

             }else if(izdavanjeod != "" && izdavanjedo == "" && istekod == "" && istekdo != ""){
                var zadatum = [];
                var zaistek = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var pocetni = new Date(izdavanjeod);
                     
                     if(datum_izdavanja >= pocetni ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                   
                    var krajnji = new Date(istekdo);

                    if( datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });var c = $(zadatum).not($(zadatum).not(zaistek));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }
 
             else if(izdavanjeod == "" && izdavanjedo != "" && istekod != "" && istekdo == ""){
                var zadatum = [];
                var zaistek = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var krajnji = new Date(izdavanjedo);
                     
                     if(datum_izdavanja <= krajnji ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    
                    if(datum_isteka >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });
 
                 var c = $(zadatum).not($(zadatum).not(zaistek));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }
        }else if((izdavanjeod == "" && izdavanjedo == "") && $(".ch:checked").length > 0 && (istekod != "" || istekdo != "")){
            let izdavanjeod = $("#periodod").val();
            let izdavanjedo = $("#perioddo").val();
            let istekod = $("#istekod").val();
            let istekdo = $("#istekdo").val();
            if(zaucenika.length > 0 && status.length > 0 && istekod != "" && istekdo != ""){
                var zaucenika = $("input#poucenik:checked");
                var status = $("input#status:checked");
                var array = [];
                var array2 = [];
                var zaistek= [];
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            array.push(tr);
                        }
                    });
                   
                });
    
                    var array2 = [];
                 $("td#status_ime").each(function(){
                        $this = $(this);
                        status.each(function(){
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var tr = parents[0];
                           
                            array2.push(tr);
                        }
                    });
                 });
                 
                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    var krajnji = new Date(istekdo);

                    if(datum_isteka >= pocetni && datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                });
                var c = $(array2).not($(array2).not(array));
                var c = $(c).not($(c).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(zaucenika > 0 && status.length > 0 && istekod != "" && istekdo == ""){
                var zaucenika = $("input#poucenik:checked");
                var status = $("input#status:checked");
                var array = [];
                var array2 = [];
                var zaistek= [];
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            array.push(tr);
                        }
                    });
                   
                });
    
                    var array2 = [];
                 $("td#status_ime").each(function(){
                        $this = $(this);
                        status.each(function(){
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var tr = parents[0];
                           
                            array2.push(tr);
                        }
                    });
                 });
                 
                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    
                    if(datum_isteka >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                });
                var c = $(array2).not($(array2).not(array));
                var c = $(c).not($(c).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(zaucenika.length > 0 && status.length > 0 && istekod == "" && istekdo != ""){
                var zaucenika = $("input#poucenik:checked");
                var status = $("input#status:checked");
                var array = [];
                var array2 = [];
                var zaistek= [];
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            array.push(tr);
                        }
                    });
                   
                });
    
                    var array2 = [];
                 $("td#status_ime").each(function(){
                        $this = $(this);
                        status.each(function(){
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var tr = parents[0];
                           
                            array2.push(tr);
                        }
                    });
                 });
                 
                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    
                    var krajnji = new Date(istekdo);
                    if(datum_isteka <= krajnji ){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                });
                var c = $(array2).not($(array2).not(array));
                var c = $(c).not($(c).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(zaucenika.length > 0 && status.length == 0 && istekod != "" && istekdo != ""){
                var zaucenika = $("input#poucenik:checked");
                var status = $("input#status:checked");
                var array = [];
                var array2 = [];
                var zaistek= [];
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            array.push(tr);
                        }
                    });
                   
                });
    
                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    var krajnji = new Date(istekdo);

                    if(datum_isteka >= pocetni && datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                });
                
                var c = $(array).not($(array).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(zaucenika.length == 0 && status.length > 0 && istekod != "" && istekdo != ""){
                
                var zaistek = [];
                
                var array2 = [];
                $("td#status_ime").each(function(){
                       $this = $(this);
                       status.each(function(){
                       if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                          
                           array2.push(tr);
                       }
                   });
                });

                $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    var krajnji = new Date(istekdo);

                    if(datum_isteka >= pocetni && datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });
                 var c = $(array2).not($(array2).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(zaucenika.length > 0 && status.length == 0 && istekod != "" && istekdo == ""){
                var zaucenika = $("input#poucenik:checked");
                var status = $("input#status:checked");
                var array = [];
                var array2 = [];
                var zaistek= [];
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            array.push(tr);
                        }
                    });
                   
                });
    
                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    var pocetni = new Date(istekod);
                    
                    if(datum_isteka >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                });
                
                var c = $(array).not($(array).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(zaucenika.length == 0 && status.length > 0 && istekod == "" && istekdo != ""){
                var zaistek = [];
                
                var array2 = [];
                $("td#status_ime").each(function(){
                       $this = $(this);
                       status.each(function(){
                       if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                          
                           array2.push(tr);
                       }
                   });
                });

                $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                    
                    var krajnji = new Date(istekdo);

                    if(datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });
                 var c = $(array2).not($(array2).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
             }else if(zaucenika.length > 0 && status.length == 0 && istekod == "" && istekdo != ""){
                var zaucenika = $("input#poucenik:checked");
                var status = $("input#status:checked");
                var array = [];
                
                var zaistek= [];
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            array.push(tr);
                        }
                    });
                   
                });
    
                $("td#datum_isteka").each(function(){
                    
                    var datum_isteka = new Date($(this).text().trim());
                    var krajnji = new Date(istekdo);
                    
                    if(datum_isteka <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                });
                
                var c = $(array).not($(array).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
                }
             else if(zaucenika.length == 0 && status.length > 0 && istekod != "" && istekdo == ""){
                var zaistek = [];
                
                var array2 = [];
                $("td#status_ime").each(function(){
                       $this = $(this);
                       status.each(function(){
                       if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                          
                           array2.push(tr);
                       }
                   });
                });

                $("td#datum_isteka").each(function(){
                    var datum_isteka = new Date($(this).text().trim());
                    
                    var pocetni = new Date(istekod);

                    if(datum_isteka >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zaistek.push(parent);

                    }
                   
                });
                 var c = $(array2).not($(array2).not(zaistek));
                 
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
             }
        }
    });

    $(".izdato , .period").change(function(){
        let izdavanjeod = $("#periodod").val();
        let izdavanjedo = $("#perioddo").val();
        
        if((izdavanjeod != "" || izdavanjedo != "") && $(".izdato:checked").length == 0){
            
            if(izdavanjeod != "" && izdavanjedo != ""){
                var array = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }else if(izdavanjeod != "" && izdavanjedo == ""){
               /*  $("#perioddo").attr("min",izdavanjeod); */
                var array = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    
                    if(datum_izdavanja >= pocetni){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }else if(izdavanjeod == "" && izdavanjedo != ""){
                
               /*  $("#periodod").attr("max",izdavanjedo); */
                var array = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var krajnji = new Date(izdavanjedo);
                    
                    if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        array.push(parent);

                    }
                });
                for (let i = 0; i < $(".trazi").length; i++)
                {   
                    let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < array.length; j++)
        
                        if (a[i] == array[j])
                            break;
           
                    if (j == array.length)
                        a[i].style.display = "none";
                }
                array.forEach(element => {
                    element.style.display = "";
                });
            }

        }else if((izdavanjeod == "" && izdavanjedo == "") && $(".izdato:checked").length == 0){
            $(".trazi").each(function(){
                $(this).show();
            })
        }
        else if((izdavanjeod == "" && izdavanjedo == "") && $(".izdato:checked").length > 0){
               
                var zaucenika = $("input#zaucenika:checked");
                var odbibliotekara = $("input#odbibliotekara:checked");
                if(zaucenika.length > 0 && odbibliotekara.length == 0){
                    var array = [];
                    $("td#ucenik_ime").each(function(){
                        $this = $(this);
                        zaucenika.each(function(){
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[0];
                                array.push(parent);
                            }
                        })
                    });

                    for (let i = 0; i < $(".trazi").length; i++)
        {   
            let a = $(".trazi");
            let j;
               
            for (j = 0; j < array.length; j++)

                if (a[i] == array[j])
                    break;
   
            if (j == array.length)
                a[i].style.display = "none";
        }
            array.forEach(element => {
                element.style.display = "";
            });
                }else if(zaucenika.length == 0 && odbibliotekara.length > 0){
                    var array = [];
                    $("td#bibliotekar_ime").each(function(){
                        $this = $(this);
                        odbibliotekara.each(function(){
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var parent = parents[0];
                                array.push(parent);
                            }
                        })
                    });

                    for (let i = 0; i < $(".trazi").length; i++)
        {   
            let a = $(".trazi");
            let j;
               
            for (j = 0; j < array.length; j++)

                if (a[i] == array[j])
                    break;
   
            if (j == array.length)
                a[i].style.display = "none";
        }
            array.forEach(element => {
                element.style.display = "";
            });
        }else if(zaucenika.length > 0 && odbibliotekara.length > 0){
                    console.log("Usli smo");
                    var array = [];
                    $("td#ucenik_ime").each(function(){
                        $this = $(this);
                        zaucenika.each(function(){
                            if($this.text().trim() == $(this).val()){
                               var parents = $this.parents();
                               var tr = parents[0];
                                
                                array.push(tr);
                            }
                        });
                       
                    });
        
                        var array2 = [];
                     $("td#bibliotekar_ime").each(function(){
                            $this = $(this);
                        odbibliotekara.each(function(){
                            if($this.text().trim() == $(this).val()){
                                var parents = $this.parents();
                                var tr = parents[0];
                               
                                array2.push(tr);
                            }
                        });
                     });
                     
                     var c = $(array2).not($(array2).not(array));
                   
                     c.show();
                     for (let i = 0; i < $(".trazi").length; i++)
                {   let a = $(".trazi");
                    let j;
                       
                    for (j = 0; j < c.length; j++)
        
                        if (a[i] == c[j])
                            break;
           
                    if (j == c.length)
                        a[i].style.display = "none";  
                }
                }
        }else if((izdavanjeod != "" || izdavanjedo != "") && $(".izdato:checked").length > 0){
            let izdavanjeod = $("#periodod").val();
            let izdavanjedo = $("#perioddo").val();
            var zaucenika = $("input#zaucenika:checked");
            var odbibliotekara = $("input#odbibliotekara:checked");

            if(izdavanjeod != "" && izdavanjedo != "" && zaucenika.length > 0 && odbibliotekara.length > 0){
                console.log("ODJE SAM");
                var zadatum = [];
                var zaucenikime = [];
                var zabibliotekarime = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });
    
                 $("td#bibliotekar_ime").each(function(){
                        $this = $(this);
                    odbibliotekara.each(function(){
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var tr = parents[0];
                           
                            zabibliotekarime.push(tr);
                        }
                    });
                 });
                 var c = $(zadatum).not($(zadatum).not(zaucenikime));
                 var c = $(c).not($(c).not(zabibliotekarime));  
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod != "" && izdavanjedo != "" && zaucenika.length > 0 && odbibliotekara.length == 0){
                var zadatum = [];
                var zaucenikime = [];
          
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });

                var c = $(zadatum).not($(zadatum).not(zaucenikime));
                
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
               
            }else if(izdavanjeod != "" && izdavanjedo != "" && zaucenika.length == 0 && odbibliotekara.length > 0){
                var zadatum = [];
                var zabibliotekarime = [];
          
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);

                    if(datum_izdavanja >= pocetni && datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#bibliotekar_ime").each(function(){
                    $this = $(this);
                odbibliotekara.each(function(){
                    if($this.text().trim() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[0];
                       
                        zabibliotekarime.push(tr);
                    }
                });
             });

                var c = $(zadatum).not($(zadatum).not(zabibliotekarime));
                
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
               
            }else if(izdavanjeod != "" && izdavanjedo == "" && zaucenika.length > 0 && odbibliotekara.length > 0){
                var zadatum = [];
                var zaucenikime = [];
                var zabibliotekarime = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });
    
                 $("td#bibliotekar_ime").each(function(){
                        $this = $(this);
                    odbibliotekara.each(function(){
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var tr = parents[0];
                           
                            zabibliotekarime.push(tr);
                        }
                    });
                 });
                 var c = $(zadatum).not($(zadatum).not(zaucenikime));
                 var c = $(c).not($(c).not(zabibliotekarime));  
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod == "" && izdavanjedo != "" && zaucenika.length > 0 && odbibliotekara.length > 0){
                var zadatum = [];
                var zaucenikime = [];
                var zabibliotekarime = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    var krajnji = new Date(izdavanjedo);
                    if(datum_izdavanja <= krajnji){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });
                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });
    
                 $("td#bibliotekar_ime").each(function(){
                        $this = $(this);
                    odbibliotekara.each(function(){
                        if($this.text().trim() == $(this).val()){
                            var parents = $this.parents();
                            var tr = parents[0];
                           
                            zabibliotekarime.push(tr);
                        }
                    });
                 });
                 var c = $(zadatum).not($(zadatum).not(zaucenikime));
                 var c = $(c).not($(c).not(zabibliotekarime));  
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod != "" && izdavanjedo == "" && zaucenika.length > 0 && odbibliotekara.length == 0){
               var zadatum = [];
               var zaucenikime = [];
                $("td#datum_izdavanja").each(function(){
                    
                    var datum_izdavanja = new Date($(this).text().trim());
                    var pocetni = new Date(izdavanjeod);
                    
                    if(datum_izdavanja >= pocetni ){
                        var parents = $(this).parents();
                        var parent = parents[0];
                        zadatum.push(parent);

                    }
                });

                $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });

                var c = $(zadatum).not($(zadatum).not(zaucenikime));
                
                 c.show();
                 for (let i = 0; i < $(".trazi").length; i++)
                 {   let a = $(".trazi");
                     let j;
                        
                     for (j = 0; j < c.length; j++)
         
                         if (a[i] == c[j])
                             break;
            
                     if (j == c.length)
                         a[i].style.display = "none";  
                 }
            }else if(izdavanjeod == "" && izdavanjedo != "" && zaucenika.length == 0 && odbibliotekara.length > 0){
                var zadatum = [];
                var zabibliotekarime = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var krajnji = new Date(izdavanjedo);
                     
                     if(datum_izdavanja <= krajnji ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#bibliotekar_ime").each(function(){
                    $this = $(this);
                odbibliotekara.each(function(){
                    if($this.text().trim() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[0];
                       
                        zabibliotekarime.push(tr);
                    }
                });
             });
 
                 var c = $(zadatum).not($(zadatum).not(zabibliotekarime));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }else if(izdavanjeod != "" && izdavanjedo == "" && zaucenika.length == 0 && odbibliotekara.length > 0){
                var zadatum = [];
                var zabibliotekarime = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var pocetni = new Date(izdavanjeod);
                     
                     if(datum_izdavanja >= pocetni ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#bibliotekar_ime").each(function(){
                    $this = $(this);
                odbibliotekara.each(function(){
                    if($this.text().trim() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[0];
                       
                        zabibliotekarime.push(tr);
                    }
                });
             });
 
                 var c = $(zadatum).not($(zadatum).not(zabibliotekarime));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }else if(izdavanjeod == "" && izdavanjedo != "" && zaucenika.length == 0 && odbibliotekara.length > 0){
                var zadatum = [];
                var zabibliotekarime = [];
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var krajnji = new Date(izdavanjedo);
                     
                     if(datum_izdavanja <= krajnji ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#bibliotekar_ime").each(function(){
                    $this = $(this);
                odbibliotekara.each(function(){
                    if($this.text().trim() == $(this).val()){
                        var parents = $this.parents();
                        var tr = parents[0];
                       
                        zabibliotekarime.push(tr);
                    }
                });
             });
 
                 var c = $(zadatum).not($(zadatum).not(zabibliotekarime));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }else if(izdavanjeod == "" && izdavanjedo != "" && zaucenika.length > 0 && odbibliotekara.length == 0){
                var zadatum = [];
                var zaucenikime = [];
                console.log("oOOOOOOOOOOOOOOOOOOOOOOVDJEEE");
                 $("td#datum_izdavanja").each(function(){
                     
                     var datum_izdavanja = new Date($(this).text().trim());
                     var krajnji = new Date(izdavanjedo);
                     
                     if(datum_izdavanja <= krajnji ){
                         var parents = $(this).parents();
                         var parent = parents[0];
                         zadatum.push(parent);
 
                     }
                 });
 
                 $("td#ucenik_ime").each(function(){
                    $this = $(this);
                    zaucenika.each(function(){
                        if($this.text().trim() == $(this).val()){
                           var parents = $this.parents();
                           var tr = parents[0];
                            
                            zaucenikime.push(tr);
                        }
                    });
                   
                });
 
                 var c = $(zadatum).not($(zadatum).not(zaucenikime));
                 
                  c.show();
                  for (let i = 0; i < $(".trazi").length; i++)
                  {   let a = $(".trazi");
                      let j;
                         
                      for (j = 0; j < c.length; j++)
          
                          if (a[i] == c[j])
                              break;
             
                      if (j == c.length)
                          a[i].style.display = "none";  
                  }
             }

        }
    });
});
