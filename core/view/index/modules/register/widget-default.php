<br><br><br><br>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form role="form" id='register'  method="post" action="add.php">
      <h2>Registrate <small>Es gratis y siempre lo ser&aacute;.</small></h2>
      <br><hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nombre" tabindex="1">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="lastname" id="lastname" class="form-control input-lg" placeholder="Apellidos" tabindex="2">
          </div>
        </div>
      </div>

      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Correo Electronico" tabindex="4">
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contrase&ntilde;a" tabindex="5">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password_confirmation" id="confirm" class="form-control input-lg" placeholder="Confirmar Contrase&ntilde;a" tabindex="6">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 col-sm-3 col-md-3">
          <span class="button-checkbox">
            <button type="button" class="btn" data-color="info" tabindex="7">Acepto</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
          </span>
        </div>
        <div class="col-xs-8 col-sm-9 col-md-9">
           Al dar click en el boton <strong class="label label-primary">Registrarme</strong>, aceptas los <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terminos y condiciones</a> de MineDeck, Incluyendo el uso de Cookies.
           <input type='hidden' name='reference' value='register'>
        </div>
      </div>
      
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-6"><input type="submit" value="Registrarme" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
        <div class="col-xs-12 col-md-6"><input type="reset" value="Reestablecer campos" class="btn btn-default   btn-block btn-lg" tabindex="7"></div>
      </div>
    </form>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Terminos y Condiciones</h4>
      </div>
      <div class="modal-body">
      <p>Estamos trabajando en la redaccion de los terminos y condiciones de nuestro servicio. Pero Adelantamos: </p>
      <p><em>El servicio <b>MineDeck</b> es un sistema libre en el que puedes agregar cualquier informacion sobre tu negocio, la cuenta MineDeck es de caracter privado y en ningun momento le proporcionaremos a nadie informacion de ningun tipo sobre ninguno de nuestros usuarios.</em></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Acepto</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<br><br><br><br><br>
<script>
     $("form#register").submit(function(e){
        var $widget = $(this);
            $checkbox = $widget.find('input:checkbox');

            if($("#name").val()=="" || $("#name").val()==""||$("#email").val()==""||$("#password").val()==""){
              alert("No puedes dejar campos vacios !!")
              e.preventDefault();
            }else{
            if($("#password").val()==$("#confirm").val()){
                if($checkbox.val()==1){

                }else{
              alert("No has aceptado los Terminos y Condiciones !!");
              e.preventDefault();
                }
             }else{
              alert("Las contraseñas no coinciden !!");
              e.preventDefault();
             }
            }


  });
</script>
<script>
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
                $checkbox.val(1);
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
                $checkbox.val(0);
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>
