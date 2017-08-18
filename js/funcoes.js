   $(function(){
         $("#tipoBanco1").hide();
         $("#tipoBanco2").hide();
         $("#pacoteMontar").hide();
         $("#msgBox").hide();
         $(".ini").hide();
         $(".objetosInv").hide();         

         $(".all").change(function(){
            if(this.checked) {
              $(".db_check").attr("checked", "checked");
            } else {
              $(".db_check").removeAttr("checked");
            }
         });

       
            
            $(".tipoMsg").change(function(){

            if($(this).val() == 0) {
              $(".ini").hide();
              $(".obj").show();
            } else {
              $(".ini").show();
              $(".obj").hide();
            }
         });

         $(".obj_name").change(function(){
            if($(this).val() == 2){
              $(".objetosInv").show();         
            }else{
              $(".objetosInv").hide();         
            }
         });        

          var opts = $('.optPacote');

          $("#search_db").keyup(function(){
            var str =  $(this).val();
            var search_db = str.toUpperCase();
            var tamanho = search_db.length;
            var digitado = tamanho - 1;
            var concat = "";
            
            $('.db_check').each(function(){
              var all = $(this).val();
              var res = all.charAt(digitado);

                $(this).attr('checked', 'checked');
              
            });
          });
      

         if(opts.val() == 0){
            $('#mudaBanco').hide();
            $('#linha').hide();
            $("#btnAtualizar").removeClass('col-xs-3').addClass('col-xs-7');
         }

         $('.optPacote').click(function(){
            if($(this).val() == 0){
              $('#mudaBanco').hide();
              $('#linha').hide();
              $('#linhaBanco').show();
              $("#btnAtualizar").removeClass('col-xs-3').addClass('col-xs-7');
            }else{
              $('#mudaBanco').show();
              $('#linha').show();
              $('#linhaBanco').hide();
              $("#btnAtualizar").removeClass('col-xs-7').addClass('col-xs-3');
            }
          
         });
        $('#options li').click(function(){
          $("#codigo").html("");
          $(".js-copytextarea").html("");
        	$('.modal-title').text($(this).text());

        	var position = $(this).index();

	          if(position == 0){
	            $("#pacoteMontar").show();
	            $("#tipoBanco1").hide();
	            $("#tipoBanco2").hide();
	            $("#msgBox").hide();
	         }else if(position == 1){
	            $("#tipoBanco1").show();
	            $("#tipoBanco2").show();
	        	$("#pacoteMontar").hide();
	            $("#msgBox").hide();
	        }else if(position == 2){
	            $("#tipoBanco1").hide();
	            $("#tipoBanco2").hide();
	            $("#pacoteMontar").hide();
	            $("#msgBox").show();
	         }else if(position == 3){
	           $("#tipoBanco1").hide();
	            $("#tipoBanco2").hide();
	        	$("#pacoteMontar").hide();
	            $("#msgBox").hide();
	         }


        	$("#codigo").load("../db_scripts/script.php?position="+position,function(data){

            $('#codigo').html(data);

        		$(".atualizar").click(function(){
        			var valor = $("#mudaBanco").val();
        			var linha = $("#linha").val();
	              var arquivo = $("#arquivo").val();
	              var tipoRelease = $("#tipoRelease").val();
	              var banco = $("#banco").val();
	              var reversao = $("#reversao").val();

        			if(position == 0){
        				$("#codigo").load("../db_scripts/script.php?position="+position+"&tipo="+valor+"&linha="+linha+"&arquivo="+arquivo+"&release="+tipoRelease+"&banco="+banco+"&reversao="+reversao);
        			}else if(position == 1){
                var linhaBanco = $('#linhaBanco');

        			  $("#codigo").load("../db_scripts/script.php?position="+position+"&tipo="+valor+"&linha="+linha+'&linhaBanco='+linhaBanco.val());
        			}else if(position == 2){
                var tipoMsg = 0;
                var responsavel = $('#responsavel').val();
                responsavel = responsavel.replace(" ","_");

                var numRel = $('#numRel').val();
                var obj_name = 0;
                var invalid = $("#invalid").val();
                var inEnd = $("#inEnd").val();
                var bases = "";
                $( ".db_check:checked").each(function( index ) {
                  bases += $( this ).val()+ ",";
                });

                $( ".obj_name:checked").each(function( index ) {
                  obj_name = $( this ).val();
                });
                
                $( ".tipoMsg:checked").each(function( index ) {
                  tipoMsg = $( this ).val();
                });
                $( ".inEnd:checked").each(function( index ) {
                  inEnd = $( this ).val();
                });

                bases = bases.substring(0,(bases.length - 1));

                $("#codigo").load("../db_scripts/script.php?position="+position+"&tipoMsg="+tipoMsg+"&responsavel="+responsavel+"&numRel="+numRel+"&bases="+bases+"&obj_name="+obj_name+"&invalid="+invalid+"&inEnd="+inEnd);
              }
              $('#codigo').html(data);

        		});
        	});
        });
      });

   $(function(){
	    $.typeahead({
	    input: '.js-typeahead-country_v1',
	    order: "desc",
	    source: {
	        data: [
	            "Jean Nascimento",  
	            "Rhuan Felipe", 
	            "João Neto", 
	            "Severino Neto", 
	            "Romero Nascimento", 
	            "André Marcolino", 
	            "Fabio Goncalves", 
	            "Rafael Pereira", 
	            "Hélio Sales", 
	            "Gerência", 
	            "Edilson Souza", 
	            "Bruno Estevan", 
	            "Sérgio Cabral"
	        ]
	    },
	    callback: {
	        onInit: function (node) {
	            console.log('Typeahead Não iniciada' + node.selector);
	        }
	    }
	});
  });


     /*  $('.linha').focusout(function(){
              var valor = $(this).val();
              var length = valor.length;

              if(length == 8){
                var valor = valor.slice(0, 2);
                var str1 = valor;
                var str2 = ".";
                var res1 = str1.concat(str2);
                valor = $(this).val();
                var valor = valor.slice(2, 4);
                var str3 = valor;
                var str4 = ".";
                var res2 = str3.concat(str4);
                var result1 = res1.concat(res2);
                valor = $(this).val();
                var valor = valor.slice(4, 6);
                var str5 = valor;
                var str6 = ".";
                var res3 = str5.concat(str6);
                valor = $(this).val();
                var valor = valor.slice(6, 8);
                var str7 = valor;
                var str8 = ".";
                var res4 = str7.concat(str8);
                var result2 = res3.concat(res4);
                var result = result1.concat(result2);
                result = result.substring(0,(result.length - 1));

              }else if(length == 9){
                var valor = valor.slice(0, 2);
                var str1 = valor;
                var str2 = ".";
                var res1 = str1.concat(str2);
                valor = $(this).val();
                var valor = valor.slice(2, 5);
                var str3 = valor;
                var str4 = ".";
                var res2 = str3.concat(str4);
                var result1 = res1.concat(res2);
                valor = $(this).val();
                var valor = valor.slice(5, 7);
                var str5 = valor;
                var str6 = ".";
                var res3 = str5.concat(str6);
                valor = $(this).val();
                var valor = valor.slice(7, 9);
                var str7 = valor;
                var str8 = ".";
                var res4 = str7.concat(str8);
                var result2 = res3.concat(res4);
                var result = result1.concat(result2);
                result = result.substring(0,(result.length - 1));
              }else if(length == 11){
                var valor = valor.slice(0, 2);
                var str1 = valor;
                var str2 = ".";
                var res1 = str1.concat(str2);
                valor = $(this).val();
                var valor = valor.slice(2, 5);
                var str3 = valor;
                var str4 = ".";
                var res2 = str3.concat(str4);
                var result1 = res1.concat(res2);
                valor = $(this).val();
                var valor = valor.slice(5, 7);
                var str5 = valor;
                var str6 = ".";
                var res3 = str5.concat(str6);
                valor = $(this).val();
                var valor = valor.slice(7, 9);
                var str7 = valor;
                var str8 = ".";
                var res4 = str7.concat(str8);
                var result2 = res3.concat(res4);
                var result3 = result1.concat(result2);
                var result = result1.concat(result2);
                valor = $(this).val();

              }
                console.log(result)
        });   
         $('.linha').focusin(function(){
             $(this).val("");
              var valor = $(this).val();
              var length = valor.length;
         }); */