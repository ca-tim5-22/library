$(document).ready(function(){
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
});
