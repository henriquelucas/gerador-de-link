<?php
    session_start();
    if (isset($_GET['token'])) {
        $_SESSION['urls'] = $_GET['token'];
    }else{
        $_SESSION['urls'] = '0';
    }

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php' ?>

<body>
    <div class="seguro">
	    <div class="container">
            <div class="row">
                <div class="col-sm">
                    <i class="far fa-arrow-circle-down"></i>
				    <p>Realize agora seu download <b>Grátis</b>
                </div>
				
                <div class="col-sm">
                    <i class="fal fa-disease"></i>
					<p>Site livres de <b>vírus</b>
                </div>
				
				<div class="col-sm">
				    <i class="far fa-lock-alt"></i>
                    <p>Você está em um site 100% <b>Seguro</b>
                </div>
            </div>
	    </div>
   </div>
</div>
	</div>
	<div class="container">
		<div class="conf">
            <div class="anuncios">
			    <div class="row">
				    <div class="col-sm">
                       <!-- cole os codigos dos anuncios aqui! -->
                       <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5006856390948374"crossorigin="anonymous"></script>
                       <!-- Responsivo -->
                        <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-5006856390948374"
                            data-ad-slot="6817854287"
                            data-ad-format="auto"
                            data-full-width-responsive="true">
						</ins>
						
                        <script>
                             adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
					
					<div class="col-sm">
                       <!-- cole os codigos dos anuncios aqui! -->
                       <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5006856390948374"crossorigin="anonymous"></script>
                       <!-- Responsivo -->
                        <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-5006856390948374"
                            data-ad-slot="6817854287"
                            data-ad-format="auto"
                            data-full-width-responsive="true">
						</ins>
						
                        <script>
                             adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <!-- cole os codigos dos anuncios aqui! -->
				</div>

            </div>
            <div class="card-s">
			    <div class="openlink" id="open">
                   <strong class="destak">Seu link será liberado</strong> em <strong> <span id='countdown'></span></strong> segundos			
			    </div>	
            </div>			
		</div>
	</div>
	<script language="javascript" type="text/javascript">
  count=7;
    
    function countdown() 
    {
        if (count > 0)
        {
            count--;
            if(count == 0)
            {
                document.getElementById('downloadlink').style.display = '';
                document.getElementById('Contador').style.display = 'none';
            }else if(count <10){
				count="0"+count;
				
			}
				
            if(count > 0)
            {
                document.getElementById("countdown").innerHTML = count;
                setTimeout('countdown()',1000);
            }
        }
    }
    
    countdown();
</script>

	<?php include 'footer.php' ?>
	
</body>
</html>