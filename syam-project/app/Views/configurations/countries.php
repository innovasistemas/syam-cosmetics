


<br>
<img src="<?php echo base_url() ?>/assets/images/logo.png" />
<br>
<strong>Open source development</strong>
<input type="button" value="Enviar" id="btnSend" />
<<<<<<< HEAD
=======
<input type="button" value="Consumir Webservice" id="btnApi" />
>>>>>>> develop
<div id="div-content"></div>


<script>
    $(function(){
        $('strong').css("color", "blue");

        $('#btnSend').click(function(){
<<<<<<< HEAD
            loadCountry|();
=======
            loadCountry();
        });

        $('#btnApi').click(function(){
            webservice();
>>>>>>> develop
        });
    });


<<<<<<< HEAD
    function loadCountry|()
    {
        var entity = 't006';
        var objJson = {
            'db': {
                'table': entity
            },
            fields: {
                '0': 'id',
                '1': 'description',
                '2': 'active'
            }
            // ,
            // clauses: {
            //     'active': 1
            // }                   
=======
    function loadCountry()
    {
        var code = 't006';
        var id = 20;
        var objJson = {
            store: {
                list: code
            },
            attributes: {
                identifier: id
            }
>>>>>>> develop
        }
        
        var strJson = JSON.stringify(objJson);
            
        $.ajax({
<<<<<<< HEAD
            url: '<?php echo base_url() ?>/registros',
            data: {'dataSend': strJson},
            type: 'GET',
            // type: 'POST',
=======
            url: '<?php echo base_url() ?>/registros-web',
            data: {'dataSend': strJson},
            // type: 'GET',
            type: 'POST',
>>>>>>> develop
            dataType: 'json',
            success: function(data) {
                var content = "";
                console.log(data);
                // $.each(data, function(index, value){
                //     if(index == 0){
                //         content += "<div class='item active item-slider'>";
                //     }else{
                //         content += "<div class='item item-slider'>";
                //     }
                //     content += "<div class='fill text-center image-item-slider'>";
                //     content += "</div>";
                //     content += "<div class='carousel-caption margin-description-advertisement'>";
                //     content += "<p class='description-advertisement'><br>" 
                //     content += "<a href='" + value.link + "' class='link-advertisement' target='_blank'>" + value.description + "</a>";
                //     content += "</p>";
                //     content += "</div>";
                //     content += "</div>";
                // });
                $('#div-content').html(content);
            }
        }); 
<<<<<<< HEAD
=======


         
    }


    function webservice()
    {
        $.ajax({
            url: 'http://localhost/desarrollo-prueba/webservice-prueba.json',
            //data: {'dataSend': strJson},
            type: 'GET',
            // type: 'POST',
            dataType: 'json',
            success: function(data) {
                var content = "";
                console.log(data);
                
                $('#div-content').html(content);
            }
        });
>>>>>>> develop
    }

</script>
