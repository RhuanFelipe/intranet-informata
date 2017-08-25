 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4><!-- titulo -->
        </div>
        
        <div class="modal-body" >
        <div id="bancoSenha" class="form-group col-xs-12">
            <select class="form-control" id="bancos">
              <option value="...">Selecione o Banco...</option>
         			<option value="BANCO">BANCO</option>
  		        <option value="DBAMDATA">DBAMDATA</option>
         			<option value="DBAWMS">DBAWMS</option>
         			<option value="INFOWMS">INFOWMS</option>
            	<option value="INTEGRA">INTEGRA</option>
         			<option value="MDLOG">MDLOG</option>
      			  <option value="SCRUM">SCRUM</option>
         			<option value="WMS">WMS</option>
     			  </select>
               <button type="button" class="btn btn-primary atualizar">Atualizar</button>
          </div>
          <div id="jobsqueres" class="form-group col-xs-12">
            <select class="form-control" id="progress">
              <option value="...">Selecione os jobs...</option>
              <?php for($i=0;$i<=100;$i++) { ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
              <?php } ?>
            </select>
               <button type="button" class="btn btn-primary atualizar">Atualizar</button>
          </div>
          <div id="tipoBanco1" class="form-group col-xs-12">
            <label class="radio-inline"><input type="radio" name="optradio" class="optPacote" value='0' checked="checked">Linha</label>
            <label class="radio-inline"><input type="radio" name="optradio" class="optPacote" value='1'>Sistema</label>
          </div>
	        <div id="tipoBanco2" class="form-group col-xs-12">
	        	<div class="col-xs-5" class="sistema">
	        		<select class="form-control" id="mudaBanco">
		            	<option value="...">Selecione o produto...</option>
   			        	<option value="0">DBAMDATA</option>
		       			<option value="1">DBAWMS</option>
	       			</select>
	              <select class="form-control" id="linhaBanco" >
	                <option value="...">Selecione o produto...</option>
	                <option value="10">10</option>
	                <option value="11">11</option>
	                <option value="12">12</option>
	                <option value="15">15</option>
	                <option value="16">16</option>
	                <option value="17">17</option>
	                <option value="20">20</option>
	                <option value="21">21</option>
	                <option value="22">22</option>
	                <option value="26">26</option>
	                <option value="30">30</option>
	                <option value="35">35</option>
	                <option value="40">40</option>
	                <option value="60">60</option>
	                <option value="71">71</option>
	                <option value="73">73</option>
	                <option value="90">90</option>
	              </select>
	        	</div>
	        	<div class="col-xs-4">
	        		<input type="text" name="linha" id="linha" class="form-control">
	        	</div>
	        	<div class="col-xs-3" id="btnAtualizar">
					     <button type="button" class="btn btn-primary atualizar">Atualizar</button>
	        	</div>
	        </div>

	        <div id="pacoteMontar" class="form-group col-xs-12">
	        	<div class="form-group">
	        		<input type="text" name="arquivo" id="arquivo" class="form-control" placeholder="Informe o nome do arquivo">
	        	</div>
	        	<div class="col-xs-3">
	        		<select class="form-control" id="tipoRelease">
		       			<option value="0">PRJ</option>
		       			<option value="1">SAC</option>
	       			</select>
	        	</div>
	        	<div class="col-xs-3">
	        		<input type="text" name="banco" id="banco" class="form-control linha" placeholder="11.00.00.00">
	        	</div>
	        	<div class="col-xs-3">
	        		<input type="text" name="reversao" id="reversao" class="form-control linha" placeholder="11.00.00.00">
	        	</div>
	        	<div class="col-xs-3">
					     <button type="button" class="btn btn-primary atualizar">Atualizar</button>
	        	</div>
	        </div>
          
          <div id="msgBox" class="form-group col-xs-12">
          <div class="col-xs-12">
              <label class="radio-inline">
                <input type="radio" value="0"  checked="checked" class="tipoMsg" name="tipoMsg">Release
              </label>
              <label class="radio-inline" style="width: 140px;">
                <input type="radio" value="1" class="tipoMsg" name="tipoMsg">Atualização de Base
              </label>
               <button type="button" class="btn btn-primary atualizar">Atualizar</button>
            </div>
            <br>        
            <hr>        
           <div class="col-xs-12">
               <form class="obj">
                <label class="radio-inline">
                  <input type="radio" value="0" name="obj_name" class="obj_name" checked="checked">sucesso
                </label>
                <label class="radio-inline">
                  <input type="radio" value="1" name="obj_name" class="obj_name">Erro
                </label>
                <label class="radio-inline" style="width:110px;" >
                  <input type="radio" value="2" name="obj_name" class="obj_name">objetos Inválidos
                </label>
                <div class="form-group objetosInv">
                  <label>Objetos
                      <select id="invalid" class="form-control">
                         <option value="">objetos...</option>
                         <?php
                            for($i = 0; $i <= 100; $i++){
                          ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                          <?php
                            }
                         ?>
                      </select>
                  </label> 
                </div>
              </form>
              <form class="ini">
                <label class="radio-inline">
                  <input type="radio" value="0" class="inEnd" name="inEnd" checked="checked">Inicio
                </label>
                <label class="radio-inline">
                  <input type="radio" value="1" class="inEnd" name="inEnd" >Fim
                </label>
              </form>
            </div>
            <br>        
            <hr>    
             <div class="col-xs-12">
              <label class="checkbox-inline" style="width:200px;;">
                  <input type="checkbox" value="all" class="all">Todos | Nenhum
                </label>
            </div>
            <br>        
            <hr> 
            <!--<div class="col-xs-12">
              <label class="checkbox-inline" style="width:300px;margin-bottom: 15px">
                  <input type="text" name="search_db" id="search_db" class="form-control" placeholder="Informe o nome do banco">
                </label>
            </div>  
            <hr> -->
            <div class="col-xs-12">
               <form>
                <label class="checkbox-inline">
                  <input type="checkbox" value="CARREFPD" class="db_check">CARREFPD
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="CARREFPH" class="db_check">CARREFPH
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="FORMPD" class="db_check">FORMPD
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="FORMSH" class="db_check">FORMSH
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="JGBPD" class="db_check">JGBPD
                </label>
                <label class="checkbox-inline" style="margin-left:3px;">
                  <input type="checkbox" value="JMONTPH" class="db_check">JMONTPH
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="MDLWAP" class="db_check">MDLWAP
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="NEGRAOPD" class="db_check">NEGRAOPD
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="NEGRAOPH" class="db_check">NEGRAOPH
                </label>
                 <label class="checkbox-inline">
                  <input type="checkbox" value="NEGRAOSR" class="db_check">NEGRAOSR
                </label> 
                <label class="checkbox-inline" style="margin-left:3px;">
                  <input type="checkbox" value="OSAKAPD" class="db_check">OSAKAPD
                </label>       
                <label class="checkbox-inline">
                  <input type="checkbox" value="PEREREPD" class="db_check">PEREREPD
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="PEREREPH" class="db_check">PEREREPH
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="POTIGPD" class="db_check">POTIGPD
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="POTIGPH" class="db_check">POTIGPH
                </label>
                 <label class="checkbox-inline" style="margin-left:3px;">
                  <input type="checkbox" value="SBPH" class="db_check">SBPH
                </label>
                 <label class="checkbox-inline">
                  <input type="checkbox" value="SERTPD" class="db_check">SERTPD
                </label>
                
                <label class="checkbox-inline">
                  <input type="checkbox" value="TERRAPH" class="db_check">TERRAPH
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="WMPD" class="db_check">WMPD
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="WMPH" class="db_check">WMPH
                </label>
                <label class="checkbox-inline" style="margin-left:3px;">
                  <input type="checkbox" value="WMSPD" class="db_check">WMSPD
                </label>
                  <label class="checkbox-inline">
                  <input type="checkbox" value="WMSPH" class="db_check">WMSPH
                </label>
              </form>
            <br>        
            <hr> 
          </div>            
            <div class="col-xs-12" style="margin-top: 10px">
            <form id="form-country_v1" name="form-country_v1">
                <div class="typeahead__container">
                    <div class="typeahead__field">
                        <span class="typeahead__query">
                            <input class="js-typeahead-country_v1" id="responsavel" name="responsavel" type="search" placeholder="Search" autocomplete="off">
                        </span>
                        <span class="typeahead__button">
                            <button type="submit">
                                <i class="typeahead__search-icon"></i>
                            </button>
                        </span>
             
                    </div>
                </div>
            </form>
              <!--<input type="text"  class="form-control" placeholder="Responsável" > -->
            </div>
            <div class="col-xs-12" style="margin-top: 10px">
              <input type="text" name="numRel" id="numRel" class="form-control" placeholder="Informe o numero do Release">
            </div>
          </div>
	      	<div id="codigo"></div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary copy" id="copy" data-clipboard-target="#exemplo">Copy</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>    
    </div>
  </div>