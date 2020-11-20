
    <!-- Card -->
    <div class="card card-cascade narrower">
        <div class="row">&nbsp;</div>
        <!-- Card image -->
        <div class="view view-cascade gradient-card-header blue-gradient">
            <!-- Title -->
            <h1>
                <?= esc($titlePage); ?>
            </h1>
            <!-- <h2 class="card-header-title">Ally Cook</h2> -->
            <!-- Subtitle -->
            <!-- <h6 class="mb-0 pb-3 pt-2">Operaciones</h6> -->
            
           

        </div>
    </div>

    <!-- Zona para breadcrumb (debe ser dinámico) -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Países</li>
        </ol>
    </nav>

    <!--Formulario-->
    <div class="row align-self-center abs-center bg-transparent" id="divForm">

        <div class="card card-cascade narrower">

            <h5 class="card-header info-color white-text text-center py-4 view view-cascade overlay">
                <strong id="strong-title-form card-img-top">Formulario de datos</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0 text-center">

                <form role="form" name="frmRegister" id="frmRegister" class="text-capitalize border border-light p-3 m-3" enctype="multipart/form-data" style="">
                        
                    <input type="text" name="txtId" id="txtId" class="d-none" value="" disabled="disabled"/>
                    
                    <div class="row">
                        <div class="col-12"> 
                            <div class="md-form" id="divCode">
                                <div class="input-group">
                                    <label for="txtCode" class="control-label" id="lblCode">código</label>
                                    <input type="text" name="txtCode" id="txtCode" class="form-control input-lg" maxlength="2" data-toggle="tooltip" data-placement="bottom" data-html="true" data-validate="validate(required, minlength(3))" title="ingrese el <b>código</b> del país" />                        
                                    <span class="input-group-addon">
                                        <img src="<?php echo base_url() ?>/assets/css/glyphicons_free/glyphicons_free/glyphicons/png/glyphicons-371-globe-af.png"/>
                                    </span>
                                </div>                   
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12"> 
                            <div class="md-form" id="divName">
                                <div class="input-group">
                                    <label for="txtName" class="control-label" id="lblName">nombre</label>
                                    <input type="text" name="txtName" id="txtName" class="form-control input-lg" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-html="true" data-validate="validate(required, minlength(3))" title="ingrese <b>nombre</b> del país" />
                                    <span class="input-group-addon">
                                        <img src="<?php echo base_url() ?>/assets/css/glyphicons_free/glyphicons_free/glyphicons/png/glyphicons-372-global.png"/>
                                    </span>
                                </div>                   
                            </div>
                        </div>
                    </div>
                    
                    <div class="row text-left">
                        <div class="col-12">
                            <label for="optActive" class="control-label">activo</label>
                        </div>
                    </div>
                                        
                    <div class="row text-left">
                        <div class="col-6"> 
                            <div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="optActive" id="optActiveYes" value="1" data-toggle="tooltip" data-placement="bottom" title="si" checked="checked" />
                                    <label class="active custom-control-label" id="lblActiveYes" for="optActiveYes" data-toggle="tooltip" data-placement="bottom" title="si">si</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-6"> 
                            <div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="optActive" id="optActiveNo" value="0" data-toggle="tooltip" data-placement="bottom" title="no" />
                                    <label class="custom-control-label" id="lblActiveNo" for="optActiveNo" data-toggle="tooltip" data-placement="bottom" title="no">no</label> 
                                </div>
                            </div>
                        </div>        
                    </div>
                                        
                    <div class="form-group">
                        <!-- <input type="button" value="enviar datos" class="btn btn-primary btn-block my-4" id="btnSave" title="enviar datos" /> -->
                        <input type="button" value="guardar" class="btn btn-info btn-block my-4" id="btnSave" title="guardar" />
                        <input type="reset" value="restablecer" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" id="btnReset" title="restablecer" />
                    </div>

                </form>
                <!--Fin Formulario-->
                
            </div>

        </div>

    </div>

    <div class="row">&nbsp;</div>

    <!--Tabla con información de la base de datos-->
    <table id='table-table-data' class='table table-striped table-hover display'>
        <caption>Total registros: <span id='span-total-records'></span></caption>
        <thead>
            <tr class="success text-capitalize info">
                <th>id</th>
                <th>código</th>
                <th>nombre</th>
                <!-- <th>eliminar</th> -->
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--Fin datos de la base de datos-->



<!-- Scripts personalizados para la página -->
<script>
    $(function(){
        loadCountry();

    });


    function loadCountry()
    {
        var code = 't006';
        var id = 0;
        var objJson = {
            store: {
                list: code
            },
            attributes: {
                identifier: id
            }
        }
        
        var strJson = JSON.stringify(objJson);
            
        $.ajax({
            url: '<?php echo base_url() ?>/registros-web',
            data: {'dataSend': strJson},
            type: 'GET',
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                var table = "";
                $.each(data.content, function(index, value){
                    table += "<tr class='info'>";
                    // table += "<td>";
                    // table += "<a href='#!' class='link-update' title='editar' onclick='updateRecord(" + JSON.stringify(value) + ");'>" + value.name + "</a>";
                    // table += "</td>";
                    table += "<td>" + value.id + "</td>";
                    table += "<td>" + value.code + "</td>";
                    table += "<td>" + value.name + "</td>";
                    // table += "<td>";
                    // table += "<a href='#!' class='link-delete' onclick='deleteRecord(\"" + entity + "\", \"" + folder + "\", " + value.id +")'>";
                    // table += "<img src='assets/images/delete.png' class='img-thumbnail ink-delete' width='30' height='30' title='eliminar' alt='eliminar'>";
                    // table += "</a>";
                    // table += "</td>";
                    table += "</tr>";
                });

                $('#span-total-records').text(data.totalRecordsQuery + " / " + data.totalRecords);

                $('#table-table-data tbody').html(table);
                $('#table-table-data').DataTable({
                    retrieve: true,
                    language:{
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });
            }
        }); 
    }


</script>
