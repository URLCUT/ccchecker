
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title id="title">PEEYUSH CC CHECKER</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">

    <link rel="stylesheet" href="assets/bootstrap.min.css">

	<script src="assets/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/font-awesome.min.css">

    <link rel="stylesheet" href="assets/fontastic.css">

    <link rel="stylesheet" href="assets/css">

    <link rel="stylesheet" href="assets/style.default.premium.css" id="theme-stylesheet"><link id="new-stylesheet" rel="stylesheet"><link id="new-stylesheet" rel="stylesheet"><link id="new-stylesheet" rel="stylesheet">

    <link rel="stylesheet" href="assets/custom.css">

  
<script>
            var audio = new Audio('blop.mp3');
            $(document).ready(function () {
                $('#testar').attr('disabled', null);
                $('#testar').click(function () {
                    audio.play();
    
                    var line = $('#list').val().split('\n');
                    var total = line.length;
                    var ap = 0;
                    var rp = 0;
                    var st = 'Aguardando...';
                    $('#carregadas').html(total);
                    
                    $('#status').html(st);
                    line.forEach(function (value) {
                        var list = value.split('|');
                        var cc = list[0];
                        var mes = list[1];
						var ano = list[2];
						var cvv = list[3];
                        var ajaxCall = $.ajax({
                            url: 'api.php',
                            type: 'GET',
                            data: 'lista=' + value,
                            beforeSend: function () {
                                $('#stop').attr('disabled', null);
                                $('#testar').attr('disabled', 'disabled');
                                var st = 'Testando...';
                                $('#status').html(st);

                            },
                            
                                        success: function(data){
                if(data.indexOf("Aprovada") >= 0){
                    $("#lives").val(data + "\n" + $("#lives").val());
                    ap = ap + 1;
                    document.getElementById("lives").innerHTML += data + "";
                    audio.play();
                    removelinha();
                    function escondelive() {
    $('#lives').toggle(200, function () {
        if ($(this).is(':visible')) {
            $('#btn_live').html('<i class="fa fa-minus-square"></i>');
        } else {
            $('#btn_live').html('<i class="fa fa-plus-square"></i>');
        }
    });
}
                }else{
                    $("#dies").val(data + "\n" + $("#dies").val());
                     
                    rp = rp + 1;
                    document.getElementById("employe").innerHTML += data + "";
                    removelinha();
                    function esconderdie() {
    $('#dies').toggle(200, function () {
        if ($(this).is(':visible')) {
            $('#escondedie').html('<i class="fa fa-minus-square">');
        } else {
            $('#escondedie').html('<i class="fa fa-plus-square">');
        }
    });
}

                }
                                               var fila = parseInt(ap) + parseInt(rp);

                                $('#cLive').html(ap);

                                $('#cDie').html(rp);
                                $('#total').html(fila);
                                var result = (fila/total)*100;
                                $('#pct').html(result);
                                $('#title').html('[' + fila + '/' + total + '] ');
                                document.getElementById("progreso").style.width = result + "%";
                                if (fila == total) {
                                    $('#testar').attr('disabled', null);
                                    $('#stop').attr('disabled', 'disabled');
                                    audio.play();
                                    var st = 'Finalizado';

                            
                            $('#status').html(st);

                                }

            }
            
                        });
                        $('#stop').click(function () {
                            ajaxCall.abort();
                            $('#testar').attr('disabled', null);
                            $('#stop').attr('disabled', 'disabled');
                            var st = 'Pausado...';
                            $('#status').html(st);
                        });
                    });
                });
            });
   function stopado() {
                var lines = $("#list").val().split('\n');
                lines.splice(0, 1);
                $("#list").val(lines.join("\n"));
            }
            function removelinha() {
                var lines = $("#list").val().split('\n');
                lines.splice(0, 1);
                $("#list").val(lines.join("\n"));
            }
        </script><style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style><style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>
 

  
<style type="text/css">

body{

    background: url('imagem/stayaway.png') no-repeat center center fixed;
    background-size: default;
	  background:
    background-size: 100% 100%;
    background-repeat: repeat;
    background-color: #101110;
 }
</style>
<body>
          <section class="dashboard-header">
            <div class="container-fluid">
              <div class="row">

                <div class="statistics col-lg-3 col-s12">
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i style="padding-top: 25%;" class="fa fa-check"></i></div>
                    <div class="text"><strong id="cLive">0</strong><br><small>Approved</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-red"><i style="padding-top: 25%;" class="fa fa-close"></i></div>
                    <div class="text"><strong id="cDie">0</strong><br><small>Rejected</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-info"><i style="padding-top: 25%;" class="fa fa-battery-full"></i></div>
                    <div class="text"><strong id="carregadas">0</strong><br><small>Loaded</small></div>
                  </div>
                <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-primary"><i style="padding-top: 25%;" class="fa fa-handshake-o "></i></div>
                    <div class="text"><strong id="total">0</strong><br><small>Tested</small></div>
                  </div></div>
      
                 <div class="statistics col-lg-9 col-12">
                  <div class="statistic bg-white has-shadow">
                    <blockquote class="blockquote mb-0 card-body">
                    <center>
                 <textarea rows="7" placeholder="Join My Official Channel and Group: @XN_NETWORK" class="form-control" id="list" style="resize: none; outline: 0; text-align: center; width: 100%;"></textarea>
                 <br><div class="progress">
                        <div role="progressbar" id="progreso" style="height: 100%; border: solid 1px purpul;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-primary"></div>
                      </div><br>
          
                 <button id="testar" style="float: left; width: 48%;" class="btn btn-primary">
                 	<i class="fa fa-play"></i> Start</button>
         
                 <button disabled="" id="stop" style="float: left; width: 48%; margin-left: 3%;" class="btn btn-danger"><i class="fa fa-pause"></i> Pause</button><br>
               </center>
             </blockquote>
                  </div>
                </div>

<div style="margin-top: 10px;" class="statistics col-lg-20 col-12">
                  <div class="articles card">
                    <div class="card-close">
                      <div class="dropdown">
                     
                    <span class="pull-right">
                      <button type="button" class="btn btn-xs btn-danger" onclick="document.getElementById('lives').innerHTML = ''"><i class="fa fa-close"> Clear </i></font></button>
                    </span>
                      </div>
                    </div>

                    <div class="card-header d-flex align-items-center">
                      <h2 class="h3">Approved <i class="fa fa-check"></i></h2>
                      
                    </div>

                    <div class="card-body no-padding bg-white">
                      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Card</th>
      <th scope="col">Information</th>
	  <th scope="col">Gate</th>
      <th scope="col">Result</th>

    </tr>
  </thead>
  <tbody>
    </tr>
                          <tbody id="lives">
                            
  
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div style="margin-top: 10px;" class="statistics col-lg-15 col-15">
                  <div class="articles card">
                    <div class="card-close">
                      <div class="dropdown">
                     
                                                    <span class="pull-right">
                                            <button type="button" class="btn btn-xs btn-danger" onclick="document.getElementById('employe').innerHTML = ''"><i class="fa fa-close"> Clear </i></font></button>
                                        </span>
                      </div>
                    </div>

                    <div class="card-header d-flex align-items-center">
                      <h2 class="h3">Rejected <i class="fa fa-close"></i></h2>
                      
                    </div>
                    <div class="card-body no-padding bg-transparent">
                      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Card</th>
      <th scope="col">Information</th>
	  <th scope="col">Gate</th>	  
      <th scope="col">Result</th>
    </tr>
  </thead>
  <tbody>
    </tr>
                          <tbody id="employe">
  
  
                          </tbody>
                        </table>
                      </div class="bg-white">
                    </div class="bg-white">
                  </div class="bg-white">
                </div class="bg-white">
                
              </div class="bg-white">

            </div class="bg-white">

          </section>


        
      
    
    
    
 
    <script src="assets/jquery.min.js(1)"></script>
    <script src="assets/popper.min.js"> </script>
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/jquery.cookie.js"> </script>
    <script src="assets/Chart.min.js"></script>
    <script src="assets/jquery.validate.min.js"></script>
    <script src="assets/charts-home.js"></script>
   

    <script src="assets/messenger-theme-flat.js">       </script>
    <script src="assets/home-premium.js"> </script>
  
    <script src="assets/front.js"></script>
  