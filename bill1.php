<?php 
  include_once 'C:/xampp/htdocs/stylistic-master/Controller/livraisonC.php';
  $livraisonC=new livraisonC();
  $listecommandes=$livraisonC->affichercommandes(); 
  $listedets=$livraisonC->afficherlivraisons(); 

?><!DOCTYPE html><link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # 12345</h3>
    		</div>
    		<hr>
			<?php 
			  foreach($listedets as $det){
		   ?>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
					<?php echo $det['firstName']; ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Adresse commandeails:</strong><br>
				
			  
    				</address>
    			</div>
    		</div>
			<?php
					}
					?>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Visa ending **** 4242<br>
    					jsmith@email.com
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					March 7, 2014<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
	
				   </div>
				   <div class="table-responsive">
					   <table class="table text-start align-middle table-bordered table-hover mb-0">
						   <thead>
							   <tr class="text-dark">
								   <th scope="col">Item name</th>
								   <th scope="col">Quantity</th>
								   <th scope="col">Price</th>
								   <th scope="col">Total</th>
								   <th scope="col">ID product</th>
                                   <th scope="col">client ID</th>
								   
							   </tr>
						   </thead>
						   <tbody>
						   <?php 
			  foreach($listecommandes as $commandes){
		   ?>
		   <tr>
		  
			   <td><?php echo $commandes['nameee']; ?></td>
			   <td><?php echo $commandes['Quantity']; ?></td>    
			   <td><?php echo $commandes['Price']; ?></td>
			   <td><?php echo $commandes['Total']; ?></td>
			   <td><?php echo $commandes['idC']; ?></td>
		
			  
                   
			  <?php
			}
			?>
			

			
				
		</table>
		</body>
</html>
		
    			
