<?php


// clase Widget
// sirve para automatizar aquella informacion que es repetitiva como ventanas y lista de decks o productos
class Widget {
  public static function renderDeck($deck){
    print "<div class='card2'>";
    print "<div class='sidebar'>";
    print "<div class='image'>";
    if($deck->image!=null){
        $url="uploads/".$deck->user->id."/deck/".$deck->id."/logo/".$deck->image;
        print "<br><center><img src='$url' class='img-circle'></center>";
    }

    print "</div>";

    print "</div>";

    print "<div class='content'>";

    print "<div class='header'>";
    print "<div class='name'>";
    print "<a href='view.php?module=deck&id=".$deck->id."' style='color:black;text-decoration:none;'>";
    print $deck->title;
    print "</a>";
    print "</div>";
    print "<div class='title'>";
    print $deck->biografy;
    print "</div>";
    print "</div>";
    print "<div class='biografy'>";
    print $deck->phone;
    print "</div>";
    print "<ul type='none' class='views pull-right'>";
    print "<li>";
    echo DeckViewData::countByProfileId($deck->id);
    print " <i class='icon-eye-open belize-hole'></i>";
    print "</li>";

    print "<li>";
    echo DeckFollowerData::countByDeckId($deck->id);
    print " <i class='icon-heart alizarin'></i>";
    print "</li>";
    print "</ul>";


    print "<ul type='none' class='views'>";
    print "<li>";
    print $deck->area->name;
    print "</li>";
    print "</ul>";


    print "<div class='clearfix'></div>";
    print "</div>";

    print "<hr class='hr2'>";
    print "</div>";

  }






  public static function renderUser($user){
    print "<div class='card2'>";
    print "<div class='sidebar'>";
    print "<div class='image'>";
    if($user->image!=null){
        $url="uploads/".$user->user->id."/deck/".$user->id."/logo/".$user->image;
        print "<br><center><img src='$url' class='img-circle'></center>";
    }

    print "</div>";

    print "</div>";

    print "<div class='content'>";

    print "<div class='header'>";
    print "<div class='name'>";
    if($user->id!=Session::getUID()){
        if(!ContactData::isContact($user->id)){
            print "<form method='get' id='addfrm-$user->id'>";
            print "<input type='hidden' name='reference' value='addcontact'>";
            print "<input type='hidden' name='contact_id' value='".$user->id."'>";
            print "<button type='button' onclick='like($user->id)' id='add-$user->id' class='btn pull-right tip' title='Agregar a contactos'><i class='icon-thumbs-up'></i></button>";
            print "</form>";
        }else{
            print "<form method='get' id='addfrm-$user->id'>";
            print "<button type='button' class='btn pull-right btn-primary tip' title='Agregado a contactos'><i class='icon-thumbs-up'></i></button>";
            print "</form>";

        }
    }

    print "<a href='home.php?module=view&action=user&id=".$user->id."' style='color:black;text-decoration:none;'>";
    print $user->name;
    print "</a>";
    print "</div>";
    print "</div>";
    print "<div class='clearfix'></div>";
    print "</div>";

    print "<hr class='hr2'>";
    print "</div>";

  }


	public function renderFollowDeckDialog($pd){
print <<<AAA
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Seguir a $pd->title</h3>
  </div>
  <div class="modal-body">
    <p>Al seguir a <b>$pd->title</b> recibiras sus actualizaciones y ofertas de trabajo en tu linea de noticias.</p>
  </div>
  <div class="modal-footer">
  	<form method='post' action="add.php">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button type='submit' class="btn btn-primary">Seguir a $pd->title</b></button>
    <input type='hidden' name='reference' value='addfollower'>
    <input type='hidden' name='id' value="$pd->id" >
</form>
  </div>
</div>
AAA;
	}
	public function renderUnfollowDeckDialog($pd){
print <<<EEE
<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">$pd->title esta en Favoritos</h3>
  </div>
  <div class="modal-body">
    <p>Ya tienes a <b>$pd->title</b> en tu lista de favoritos recibiras sus actualizaciones y ofertas de trabajo en tu linea de noticias.</p>
  </div>
  <div class="modal-footer">
  	<form method='post'>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-danger">Eliminar a $pd->title</b></button>
    <input type='hidden' name='reference' value='addfollower'>
    <input type='hidden' name='id' value="$pd->id" >
</form>
  </div>
</div>
EEE;

	}
}


?>