    <div id="blog" class="row">                 
        <div class="col-sm-2 paddingTop20">
            <nav class="nav-sidebar nav-right">
                <ul class="nav">
                    <li class="active"><a href="javascript:;"> Categorias</a></li>
                    <li><a href="javascript:;"> Usuarios</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="javascript:;"> Cuentas</a></li>
                </ul>
            </nav>
        </div>
                 <div class="col-md-10 blogShort">
                 <h1><i class='glyphicon glyphicon-time'></i> Recientes</h1>
                    <div class="row">
                    <div class='col-md-8'>
<?php
//////////////////////
$decks = DeckData::getAllRecent(12);
if(count($decks)>0):
?>
<hr>

<?php else: ?>
<div class='jumbotron'>
    <h2>No hay negocios</h2>

</div>
<?php endif;
////////////////////
 ?>
                    </div>

                         
                    </div>
                </div>        
             </div>
<br><br><br><br><br>
